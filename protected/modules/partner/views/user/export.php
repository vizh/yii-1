<?php
/**
 * @var \partner\components\Controller $this
 * @var \partner\models\forms\user\Export $form
 * @var \application\widgets\ActiveForm $activeForm
 * @var \partner\models\Export[] $exports
 * @var \event\models\Event $event
 */

$formatter = \Yii::app()->getDateFormatter();
$this->setPageTitle(\Yii::t('app', 'Экспорт участников в Excel'));
?>
<?php if (!empty($exports)):?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <span class="panel-title"><i class="fa fa-history"></i> <?=\Yii::t('app', 'Ранее экспортировано');?></span>
        </div> <!-- / .panel-heading -->
        <div class="panel-body">
            <div class="table-info">
                <table class="table table-bordered">
                    <thead>
                        <th><?=\Yii::t('app', 'Дата запуска');?></th>
                        <th><?=\Yii::t('app', 'Количество участников');?></th>
                        <th><?=\Yii::t('app', 'Статус');?></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach($exports as $export):?>
                            <tr>
                                <td><?=$formatter->format('dd MMMM yyyy HH:mm', $export->CreationTime);?></td>
                                <td><?=!empty($export->TotalRow) ? $export->TotalRow : '&mdash;';?></td>
                                <td>
                                    <?php if ($export->Success):?>
                                        <span class="label label-success"><?=\Yii::t('app', 'Экспорт завершен');?></span>
                                    <?php else:?>
                                        <span class="label label-default">
                                            <?=\Yii::t('app', 'Выполнено на {percent}%', ['{percent}' => $export->getExportedPercent()]);?>
                                        </span>
                                    <?php endif;?>
                                </td>
                                <td>
                                    <?php if ($export->Success):?>
                                        <?=\CHtml::link('<span class="btn-label icon fa fa-file-excel-o"></span>' . \Yii::t('app', 'Скачать '), ['exportdownload', 'id' => $export->Id], ['class' => 'btn btn-success btn-labeled btn-xs']);?>
                                    <?php else:?>
                                        <?=\CHtml::link('<span class="fa fa-refresh"></span>', ['export'], ['class' => 'btn btn-default btn-xs']);?>
                                    <?php endif;?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endif;?>


<?php $activeForm = $this->beginWidget('\application\widgets\ActiveForm');?>
<div class="panel panel-warning">
    <div class="panel-heading">
        <span class="panel-title"><i class="fa fa-cogs"></i> <?=\Yii::t('app', 'Новый экспорт');?></span>
    </div> <!-- / .panel-heading -->
    <div class="panel-body">
        <?=$activeForm->errorSummary($form);?>
        <div class="form-group">
            <?=$activeForm->label($form, 'Roles');?>
            <?=$activeForm->dropDownList($form, 'Roles', \CHtml::listData($event->getRoles(), 'Id', 'Title'), ['multiple' => 'multiple', 'class' => 'form-control']);?>
        </div>
        <div class="form-group">
            <?=$activeForm->label($form, 'Language');?>
            <?php foreach($form->getLanguageData() as $lang => $label):?>
                <div class="radio">
                    <label>
                        <?=$activeForm->radioButton($form, 'Language', ['value' => $lang, 'uncheckValue' => null]);?> <?=$label;?>
                    </label>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <div class="panel-footer">
        <?=\CHtml::submitButton(\Yii::t('app', 'Получить список'), ['class' => 'btn btn-primary']);?>
        <?=\CHtml::hiddenField('run', true);?>
    </div>
</div>
<?php $this->endWidget();?>