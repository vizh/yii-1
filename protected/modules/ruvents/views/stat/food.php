<?php
/**
 * @var StatController $this
 * @var array $allStat
 * @var array $dataProviders
 */

use ruvents\models\Visit;

$this->pageTitle = 'Статистика питания';

$map = [];
foreach ($allStat as $item) {
    $group = $item['group'];
    $map[$group] = Inflector::transliterate(strtr(Inflector::transliterate($group), [
        ' ' => '_',
        '/' => '_',
        '.' => ''
    ]));
}

?>

<div class="container">

    <h2 class="text-center"><?=CHtml::encode($this->pageTitle)?></h2>

    <h4 style="margin-top: 50px;">Общая статистика</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Наименование услуги</th>
                <th>Количество человек, получивших услугу</th>
                <th>Количество прикладываний</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allStat as $item): ?>
                <tr>
                    <td><?=CHtml::link($item['group'], '#'.$map[$item['group']])?></td>
                    <td><?=$item['users']?></td>
                    <td><?=$item['count']?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php foreach ($dataProviders as $group => $dataProvider): ?>
        <a name="<?=$map[$group]?>"></a>
        <h4 style="margin-top: 50px;"><?=CHtml::encode($group)?></h4>
        <?php $this->widget('zii.widgets.grid.CGridView', [
            'dataProvider'=> $dataProvider,
            'itemsCssClass' => 'table table-bordered',
            'summaryText' => 'Всего {count} человек(а)',
            'columns' => [
                [
                    'name' => 'Name',
                    'header' => 'RUNET-ID',
                    'value' => function (Visit $visit) {
                        return $visit->User->RunetId;
                    }
                ],
                [
                    'name' => 'Name',
                    'header' => 'Ф.И.О.',
                    'value' => function (Visit $visit) {
                        return $visit->User->getFullName();
                    }
                ],
                [
                    'name' => 'CreationTime',
                    'header' => 'Дата / время',
                    'value' => function (Visit $visit) {
                        return \Yii::app()->getDateFormatter()->format('dd.MM.yyyy HH:mm:ss', $visit->CreationTime);
                    },
                    'sortable' => false
                ]
            ]
        ]) ?>
    <?php endforeach ?>
</div>
