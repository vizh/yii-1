<?php
/**
 * @var \application\components\controllers\AdminMainController $this
 * @var \mail\models\Template[] $templates
 */
$this->setPageTitle('Рассылки');
$formatter = \Yii::app()->getDateFormatter();
?>

<div class="btn-toolbar">
    <a href="<?= $this->createUrl('/mail/admin/template/edit', []); ?>"
       class="btn btn-success"><?= \Yii::t('app', 'Создать рассылку'); ?></a>
</div>
<div class="well">
    <table class="table">
        <thead>
        <th><?= \Yii::t('app', 'Название'); ?></th>
        <th><?= \Yii::t('app', 'Дата создания'); ?></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        </thead>
        <tbody>
        <?php foreach ($templates as $template): ?>
            <tr>
                <td>
                    <?=\CHtml::link($template->Title, ['edit', 'id' => $template->Id]);?>
                </td>
                <td><?=$formatter->format('dd MMMM yyyy HH:mm', $template->CreationTime); ?></td>
                <td>
                    <?php if ($template->Active): ?>
                        <span class="label label-success"><?= \Yii::t('app', 'Запущена'); ?> <?=$formatter->format('dd MMMM yyyy HH:mm', $template->ActivateTime); ?></span>
                    <?php else: ?>
                        <span class="label">В ожидании запуска</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($template->Success): ?>
                        <span class="label label-success">Выполнена <?=$formatter->format('dd MMMM yyyy HH:mm', $template->SuccessTime); ?></span>
                    <?php else: ?>
                        <span class="label">Не выполнена</span>
                    <?php endif; ?>
                </td>
                <td><?=\CHtml::link('Редактировать', ['edit', 'id' => $template->Id], ['class' => 'btn']);?></td>
            </tr>
        <?php endforeach; ?>
        <tbody>
    </table>
    <?php $this->widget('\application\widgets\Paginator', ['paginator' => $paginator]); ?>
</div>