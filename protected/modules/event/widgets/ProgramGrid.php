<?php
namespace event\widgets;
use event\models\section\Section;

/**
 * Class ProgramGrid
 * @package event\widgets
 *
 * @property string $PdfUrl
 */
class ProgramGrid extends \event\components\Widget
{
    /**
     * @return \string[]
     */
    public function getAttributeNames()
    {
        return ['PdfUrl'];
    }


    public function run()
    {
        $this->render('program-grid', ['grid' => $this->getGrid()]);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return \Yii::t('app', 'Программа');
    }

    public function getIsHasDefaultResources()
    {
        return true;
    }


    /**
     * @return string
     */
    public function getPosition()
    {
        return \event\components\WidgetPosition::Tabs;
    }

    /**
     * Возвращает критерию для программной сетки
     * @return \CDbCriteria
     */
    protected function getGridCriteria()
    {
        $criteria = new \CDbCriteria();
        $criteria->order = '"t"."StartTime" ASC';
        $criteria->with = [
            'Type',
            'LinkHalls' => [
                'with' => ['Hall'],
                'together' => true,
                'order' => '"Hall"."Order" ASC, "Hall"."Title" ASC'
            ],
            'LinkUsers' => [
                'together' => false,
                'with' => [
                    'User' => [
                        'with' => ['Settings', 'Employments']
                    ],
                    'Role'
                ],
                'order' => '"Role"."Priority" DESC'
            ]
        ];
        return $criteria;
    }

    /**
     * Возвращает программную сетку
     * @return array
     */
    protected function getGrid()
    {
        $grid = [];
        $sections = Section::model()->byEventId($this->getEvent()->Id)->byDeleted(false)->findAll($this->getGridCriteria());
        foreach ($sections as $section) {
            $datetime = new \DateTime($section->StartTime);
            $date = $datetime->format('Y-m-d');
            $time = $datetime->format('H:i');

            if (!isset($grid[$date])) {
                $grid[$date] = new \stdClass();
                $grid[$date]->Halls = [];
                $grid[$date]->Intervals = [];
                $grid[$date]->Sections = [];
                $grid[$date]->Roles = [];
            }

            if (!isset($grid[$date]->Intervals[$time])) {
                $grid[$date]->Intervals[$time] = $time . ' &mdash; ' . date('H:i', strtotime($section->EndTime));
            }

            $item = new \stdClass();
            $item->Section = $section;
            $item->Links = [];
            foreach ($section->LinkUsers as $link) {
                if (!isset($item->Links[$link->RoleId])) {
                    $item->Links[$link->RoleId] = [];
                }
                $item->Links[$link->RoleId][] = $link;
            }

            $colSpan = 0;
            foreach ($section->LinkHalls as $link) {
                if (!isset($grid[$date]->Halls[$link->HallId])) {
                    $grid[$date]->Halls[$link->HallId] = $link->Hall;
                }
                if ($colSpan == 0) {
                    $grid[$date]->Sections[$link->HallId][$time] = $item;
                }
                $colSpan++;
            }
            $item->ColSpan = $colSpan;
        }
        return $grid;
    }
}
