<?php
/**
 * @var partner\components\Controller $this
 * @var partner\controllers\main\PayStatistics $statistics
 * @var partner\controllers\main\PayStatistics $oldStatistics
 * @var array $productStatistics
 */

$this->setPageTitle(\Yii::t('app', 'Статистика платежей'));
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <span class="panel-title"><i class="fa fa-bar-chart"></i> <?=\Yii::t('app', 'Всего зарегистрировано')?>
            : <strong><?=$statistics->countParticipants?></strong></span>
    </div>
    <!-- / .panel-heading -->
    <div class="panel-body">
        <div class="table-info">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td class="span2">&nbsp;</td>
                    <td class="span3">
                        <h4>Юридические лица (счета)</h4>
                    </td>
                    <td class="span2">
                        <h4>Физические лица (квитанции)</h4>
                    </td>
                    <td class="span2">
                        <h4>Физические лица (онлайн)</h4>
                    </td>
                    <td class="span2">
                        <h4>Физические лица (PayPal)</h4>
                    </td>
                    <td class="span1"><h4>Итого</h4></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Выставлено:</td>
                    <td><?=$statistics->countJuridicalOrders?></td>
                    <td><?=$statistics->countReceiptOrders?></td>
                    <td><?=$statistics->countPaySystemOrders?></td>
                    <td><?=$statistics->countPaypalOrders?></td>
                    <td><?=$statistics->getTotalOrders()?></td>
                </tr>
                <tr>
                    <td>Не оплачено:</td>
                    <td>
                        <span class="text-warning">
                            <?=$statistics->countJuridicalOrders - $statistics->countPaidJuridicalOrders?>
                        </span>
                    </td>
                    <td>
                        <span class="text-warning">
                            <?=$statistics->countReceiptOrders - $statistics->countPaidReceiptOrders?>
                        </span>
                    </td>
                    <td>
                        <span class="text-warning">
                            <?=$statistics->countPaySystemOrders - $statistics->countPaidPaySystemOrders?>
                        </span>
                    </td>
                    <td>
                        <span class="text-warning">
                            <?=$statistics->countPaypalOrders - $statistics->countPaidPaypalOrders?>
                        </span>
                    </td>
                    <td>
                        <span class="text-warning">
                            <?=$statistics->getTotalOrders() - $statistics->getTotalPaidOrders()?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>Оплачено:</td>
                    <td><strong class="text-success"><?=$statistics->countPaidJuridicalOrders?></strong></td>
                    <td><strong class="text-success"><?=$statistics->countPaidReceiptOrders?></strong></td>
                    <td><strong class="text-success"><?=$statistics->countPaidPaySystemOrders?></strong></td>
                    <td><strong class="text-success"><?=$statistics->countPaidPaypalOrders?></strong></td>
                    <td><strong class="text-success"><?=$statistics->getTotalPaidOrders()?></strong></td>
                </tr>
                <tr>
                    <td>Людей включено:</td>
                    <td><?=$statistics->countJuridicalUsers?></td>
                    <td><?=$statistics->countReceiptUsers?></td>
                    <td><?=$statistics->countPaySystemUsers?></td>
                    <td><?=$statistics->countPaypalUsers?></td>
                    <td><?=$statistics->totalUsers?></td>
                </tr>
                <tr>
                    <td>Людей оплачено:</td>
                    <td><strong class="text-success"><?=$statistics->countPaidJuridicalUsers?></strong></td>
                    <td><strong class="text-success"><?=$statistics->countPaidReceiptUsers?></strong></td>
                    <td><strong class="text-success"><?=$statistics->countPaidPaySystemUsers?></strong></td>
                    <td><strong class="text-success"><?=$statistics->countPaidPaypalUsers?></strong></td>
                    <td><strong class="text-success"><?=$statistics->totalPaidUsers?></strong></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-left">Активировано 100% промо-кодов:</td>
                    <td><?=$statistics->totalPromoUsers?></td>
                </tr>
                <tr>
                    <td>Сумма оплат:</td>
                    <td>
                        <span class="text-success lead">
                            <?=number_format($statistics->totalPaidJuridical, 0, ',', ' ')?>
                            руб.
                        </span>
                    </td>
                    <td>
                        <span class="text-success lead">
                            <?=number_format($statistics->totalPaidReceipt, 0, ',', ' ')?>
                            руб.
                        </span>
                    </td>
                    <td>
                        <span class="text-success lead">
                            <?=number_format($statistics->totalPaidPaySystem, 0, ',', ' ')?>
                            руб.
                        </span>
                    </td>
                    <td>
                        <span class="text-success lead">
                            <?=number_format($statistics->totalPaidPaypal, 0, ',', ' ')?>
                            руб.
                        </span>
                    </td>
                    <td>
                        <span class="text-success lead">
                            <?=number_format($statistics->getTotalPaid(), 0, ',', ' ')?>
                            руб.
                        </span>
                    </td>
                </tr>
                </tbody>
            </table>
            <hr/>
            <strong>Количество запросивших счет/квитанцию:</strong>
            <span class="label label-success">
                <?=$statistics->countJuridicalUsers + $statistics->countReceiptUsers - $statistics->countPaidJuridicalUsers - $statistics->countPaidReceiptUsers?>
            </span>
            <br>
            <strong>На сумму:</strong>
            <span class="label label-success">
                <?= number_format($statistics->totalJuridical + $statistics->totalReceipt - $statistics->totalPaidJuridical - $statistics->totalPaidReceipt, 0, ',', ' ') ?>
            </span>
        </div>
    </div>
</div>

<div class="panel panel-warning">
    <div class="panel-heading">
        <span class="panel-title"><i class="fa fa-bar-chart"></i> Статистика проданных товаров</span>
    </div>
    <div class="panel-body">
        <div class="table-warning">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Оплачено</th>
                    <th>100% промо-код</th>
                    <th>Сумма оплат</th>
                </tr>
                </thead>
                <tbody>
                <?foreach($productStatistics as $row):?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><?=$row['title']?></td>
                        <td><?=$row['paid']?></td>
                        <td><?=$row['coupon']?></td>
                        <td><?=number_format($row['total'], 0, ',', ' ')?> руб.</td>
                    </tr>
                <?endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</div>