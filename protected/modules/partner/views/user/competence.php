<?php
/**
 * @var \application\modules\partner\models\search\Competence $search
 * @var Event $event
 * @var \competence\models\Test $test
 * @var \partner\components\Controller $this
 */

use user\models\User;
use event\models\Event;
use competence\models\Result;
use application\modules\competence\components\EventCode;

$controller = $this;
$this->setPageTitle(\Yii::t('app', 'Опрос участников'));
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <span class="panel-title"><i class="fa fa-question-circle"></i> <?=\Yii::t('app', 'Опрос участников');?></span>
    </div> <!-- / .panel-heading -->
    <div class="panel-body">
        <div class="table-info">
            <?$this->widget('\application\widgets\grid\GridView', [
                'dataProvider'=> $search->getDataProvider(),
                'filter' => $search,
                'summaryText' => 'Участники {start}-{end} из {count}.',
                'columns' => [
                    [
                        'header' => $search->getAttributeLabel('Name'),
                        'name'  => 'Name',
                        'type'  => 'raw',
                        'value' => '\CHtml::link(\CHtml::tag("span", ["class" => "lead"], $data->RunetId), ["edit", "id" => $data->RunetId], ["target" => "_blank"]);',
                        'filterHtmlOptions' => [
                            'colspan' => 2
                        ],
                        'headerHtmlOptions' => [
                            'colspan' => 2
                        ]
                    ],
                    [
                        'type' => 'raw',
                        'value' => function (User $user) {
                            $result = \CHtml::tag('strong', [], $user->getFullName());
                            if (($employment = $user->getEmploymentPrimary()) !== null) {
                                $result .= '<br/>' . $employment;
                            }
                            return $result;
                        },
                        'htmlOptions' => ['class' => 'text-left']
                    ],
                    [
                        'header' => $search->getAttributeLabel('Status'),
                        'type'  => 'raw',
                        'value' => function (User $user) use ($event) {
                            if (empty($event->Parts)) {
                                return $user->Participants[0]->Role->Title;
                            } else {
                                $roles = [];
                                foreach ($user->Participants as $participant) {
                                    $roles[] = $participant->Part->Title . '&mdash;' . $participant->Role->Title;
                                }
                                return implode('<br/>', $roles);
                            }
                        }
                    ],
                    [
                        'type' => 'html',
                        'header' => $search->getAttributeLabel('Finished'),
                        'value' => function (User $user) use ($test) {
                            $result = Result::model()->byUserId($user->Id)->byFinished(true)->byTestId($test->Id)->find();
                            if (!empty($result)) {
                                return \CHtml::tag('span', ['class' => 'label label-success'], \Yii::t('app', 'Да, {time}', ['{time}' => \Yii::app()->getDateFormatter()->format('dd MMMM HH:mm', $result->UpdateTime)]));
                            } else {
                                return \CHtml::tag('span', ['class' => 'label label-warning'], \Yii::t('app', 'Нет'));
                            }
                        }
                    ],
                    [
                        'type'  => 'raw',
                        'value' => function (User $user) use ($controller, $test) {
                            $controller->beginWidget('\application\widgets\bootstrap\Modal', [
                                'id' => 'definitions_' . $user->RunetId,
                                'header' => \Yii::t('app', 'Код участника'),
                                'htmlOptions' => ['class' => 'modal-blur'],
                                'toggleButton' => [
                                    'class' => 'btn btn-info',
                                    'label' => \Yii::t('app', 'Код участника')
                                ]
                            ]);
                            echo \CHtml::tag('h2', ['class' => 'text-center'], EventCode::generate($user, $test));
                            $controller->endWidget();
                        }
                    ]
                ]
            ]);?>
        </div>
    </div> <!-- / .panel-body -->
</div>