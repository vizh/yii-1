<?php
namespace partner\components;


use event\models\Event;

class Controller extends \application\components\controllers\BaseController
{
    const PAGE_HEADER_CLIP_ID = 'page-header';

    public $layout = '/layouts/public';
    public $bodyClass = '';

    public $showSidebar = true;
    public $showPageHeader = true;

    public function filters()
    {
        $filters = parent::filters();
        return array_merge(
            $filters,
            array(
                'accessControl'
            )
        );
    }

    /** @var AccessControlFilter */
    private $accessFilter;
    public function getAccessFilter()
    {
        if (empty($this->accessFilter))
        {
            $this->accessFilter = new AccessControlFilter();
            $this->accessFilter->setRules($this->accessRules());
        }
        return $this->accessFilter;
    }

    public function filterAccessControl($filterChain)
    {
        $this->getAccessFilter()->filter($filterChain);
    }

    public function accessRules()
    {
        $rules = \Yii::getPathOfAlias('partner.rules').'.php';
        return require($rules);
    }

    public function initResources()
    {
        \Yii::app()->getClientScript()->registerPackage('partner');
        parent::initResources();
    }

    protected function beforeAction($action)
    {
        if (\Yii::app()->partner->getAccount() !==null && $this->getId() !== 'auth')
        {
            if (\Yii::app()->user->getIsGuest())
            {
                \Yii::app()->getClientScript()->registerPackage('runetid.auth');
                $this->render('partner.views.system.need-user-auth');
                return false;
            }
            elseif (\Yii::app()->partner->getEvent() === null)
            {
                $success = $this->parseExtendedAccountRequest();
                if ($success)
                {
                    $this->refresh();
                }
                else
                {
                    $this->render('partner.views.system.select-event', array(
                        'events' => $this->getExtendedAccountEventData()
                    ));
                    return false;
                }
            }
        }

        return parent::beforeAction($action);
    }

    private function parseExtendedAccountRequest()
    {
        $request = \Yii::app()->getRequest();
        if ($request->getIsPostRequest()) {
            $id = $request->getParam('id');
            if ($id !== null) {
                /** @var \event\models\Event $event */
                $event = Event::model()->findByPk($id);
                if ($event !== null) {
                    \Yii::app()->getSession()->add('PartnerAccountEventId', $event->Id);
                    return true;
                }
            }
        }
        return false;
    }

    private function getExtendedAccountEventData()
    {
        /** @var \event\models\Event[] $events */
        $events = Event::model()->byDeleted(false)->orderBy(['"t"."Id"' => SORT_DESC])->findAll();
        $data = [];
        foreach ($events as $event) {
            $item = new \stdClass();
            $item->value = $event->Id . ', ' . $event->IdName . ', ' . \application\components\utility\Texts::cropText($event->Title, 200);
            $item->id = $event->Id;
            $data[] = $item;
        }
        return $data;
    }
}