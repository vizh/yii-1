<?php
/**
 * @var \partner\components\Controller $this
 * @var \partner\models\forms\user\Edit $form
 * @var \CActiveForm $activeForm
 */

$this->setPageTitle('Добавление/редактирование участника мероприятия');
?>
<?php $activeForm = $this->beginWidget('CActiveForm');?>
<div class="panel panel-info">
    <div class="panel-heading">
        <span class="panel-title"><i class="fa fa-pencil"></i> <?=\Yii::t('app', 'Редактирование участника');?></span>
    </div> <!-- / .panel-heading -->
    <div class="panel-body">
        <?=$activeForm->errorSummary($form, '<div class="alert alert-danger">', '</div>');?>
        <div class="form-group">
            <?$this->widget('zii.widgets.jui.CJuiAutoComplete', [
                'model' => $form,
                'attribute' => 'Label',
                'source' => '/ajax/users',
                'options'=> [
                    'minLength' => '2',
                    'select' => 'js:function (event, ui) {
                        window.location.href = "/user/edit/?id=" + ui.item.value;
                    }'
                ],
                'htmlOptions' => [
                    'id' => 'Edit_Label',
                    'class' => 'form-control',
                    'placeholder' => $form->getAttributeLabel('Label')
                ],
                'scriptFile' => false,
                'cssFile' => false
            ]);?>
        </div>
    </div>
    <div class="panel-footer">
        <?=\CHtml::submitButton(\Yii::t('app', 'Продолжить'), ['class' => 'btn btn-primary']);?>
    </div>
</div>
<?php $this->endWidget();?>