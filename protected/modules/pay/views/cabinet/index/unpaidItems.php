<?php
/**
 * @var $unpaidItems array
 * @var $hasRecentPaidItems bool
 * @var $this CabinetController
 * @var $account \pay\models\Account
 * @var $formAdditionalAttributes \pay\models\forms\AddtionalAttributes
 */

$total = 0;
?>

<?if(sizeof($unpaidItems->all) > 0 || sizeof($unpaidItems->tickets) > 0 || sizeof($unpaidItems->callbacks) > 0):?>

    <table class="table thead-actual">
        <thead>
        <tr>
            <th><?=\Yii::t('app', 'Тип билета')?></th>
            <th class="col-width t-right"><?=\Yii::t('app', 'Цена')?></th>
            <th class="col-width t-right"><?=\Yii::t('app', 'Кол-во')?></th>
            <th class="col-width t-right last-child"><?=\Yii::t('app', 'Сумма')?></th>
        </tr>
        </thead>
    </table>

    <?foreach($unpaidItems->all as $items):?>
        <?
        /** @var $items \pay\components\OrderItemCollectable[] */
        $product = $items[0]->getOrderItem()->Product;
       ?>
        <table class="table">
            <thead>
            <tr>
                <th colspan="2"><h4 class="title"><?=$product->Title?> <i class="icon-chevron-up"></i></h4></th>
                <th class="col-width t-right"><span class="number"><?=$product->getPrice()?></span> <?=Yii::t('app', 'руб.')?></th>
                <th class="col-width t-right"><b class="number"><?=sizeof($items)?></b></th>
                <th class="col-width t-right last-child"><b class="number"><?=$product->getPrice()*sizeof($items)?></b> <?=Yii::t('app', 'руб.')?></th>
            </tr>
            </thead>
            <tbody>
            <?foreach($items as $item):?>
                <?$total += $item->getPriceDiscount()?>
                <tr>
                    <td style="padding-left: 10px; width: 15px;">
                        <?=\CHtml::beginForm(array('/pay/cabinet/deleteitem', 'orderItemId' => $item->getOrderItem()->Id), 'post', array('class' => 'button-only'))?>
                        <?=\CHtml::htmlButton('<i class="icon-trash"></i>', array('type' => 'submit'))?>
                        <?=\CHtml::endForm()?>
                    </td>
                    <td>
                        <?=$item->getOrderItem()->Owner->getFullName()?>
                    </td>
                    <td colspan="3" class="t-right muted last-child">
                        <?if($item->getPriceDiscount() < $item->getOrderItem()->getPrice()):?>
                            <?if(!$item->getIsGroupDiscount()):?>
                                <?if($item->getOrderItem()->getCouponActivation() !== null):?>
                                    <?=\Yii::t('app', 'Промо код')?> <?=$item->getOrderItem()->getCouponActivation()->Coupon->Code?>
                                <?else:?>
                                    <?=\Yii::t('app', 'Скидка')?>
                                <?endif?>
                            <?else:?>
                                <?=\Yii::t('app', 'Групповая скидка')?>:
                            <?endif?>
                            <b class="number">-<?=$item->getOrderItem()->getPrice() - $item->getPriceDiscount()?></b> <?=Yii::t('app', 'руб.')?>
                        <?elseif ($item->getOrderItem()->Product->ManagerName == 'RoomProductManager'):?>
                            <?$dateFormatter = Yii::app()->getLocale()->getDateFormatter()?>
                            с <?=$dateFormatter->format('dd MMMM' , strtotime($item->getOrderItem()->getItemAttribute('DateIn')))?> по <?=$dateFormatter->format('dd MMMM' , strtotime($item->getOrderItem()->getItemAttribute('DateOut')))?> за  <b class="number"><?=$item->getPriceDiscount()?></b> <?=Yii::t('app', 'руб.')?>
                        <?endif?>
                    </td>
                </tr>
            <?endforeach?>
            </tbody>
        </table>
    <?endforeach?>

    <?foreach($unpaidItems->callbacks as $items):?>
        <?
        /** @var $items \pay\components\OrderItemCollectable[] */
        $product = $items[0]->getOrderItem()->Product;
       ?>
        <table class="table">
            <thead>
            <tr>
                <th colspan="5"><h4 class="title"><?=$product->Title?> <i class="icon-chevron-up"></i></h4></th>
            </tr>
            </thead>
            <tbody>
            <?foreach($items as $item):?>
                <?$total += $item->getPriceDiscount()?>
                <tr>
                    <td style="padding-left: 10px; width: 15px;">
                        <?=\CHtml::beginForm(array('/pay/cabinet/deleteitem', 'orderItemId' => $item->getOrderItem()->Id), 'post', array('class' => 'button-only'))?>
                        <?=\CHtml::htmlButton('<i class="icon-trash"></i>', array('type' => 'submit'))?>
                        <?=\CHtml::endForm()?>
                    </td>
                    <td><?=$item->getOrderItem()->Product->getManager()->getTitle($item->getOrderItem())?></td>
                    <td class="col-width t-right"><?=$item->getOrderItem()->getPrice()?> <?=Yii::t('app', 'руб.')?></td>
                    <td class="col-width t-right"><?=$item->getOrderItem()->Product->getManager()->getCount($item->getOrderItem())?></td>
                    <td class="col-width t-right last-child"><b class="number"><?=$item->getOrderItem()->getPrice()?>  <?=Yii::t('app', 'руб.')?></b></td>
                </tr>
            <?endforeach?>
            </tbody>
        </table>
    <?endforeach?>

    <?foreach($unpaidItems->tickets as $items):?>
        <table class="table">
            <thead>
            <tr>
                <th colspan="5"><h4 class="title"><?=\Yii::t('app', 'Билеты')?> <i class="icon-chevron-up"></i></h4></th>
            </tr>
            </thead>
            <tbody>
            <?foreach($items as $item):?>
                <?$total += $item->getPriceDiscount()?>
                <tr>
                    <td style="padding-left: 10px; width: 15px;">
                        <?=\CHtml::beginForm(array('/pay/cabinet/deleteitem', 'orderItemId' => $item->getOrderItem()->Id), 'post', array('class' => 'button-only'))?>
                        <?=\CHtml::htmlButton('<i class="icon-trash"></i>', array('type' => 'submit'))?>
                        <?=\CHtml::endForm()?>
                    </td>
                    <td><?=$item->getOrderItem()->Product->getManager()->getTitle($item->getOrderItem())?></td>
                    <td class="col-width t-right"><?=$item->getOrderItem()->Product->getPrice()?> <?=Yii::t('app', 'руб.')?></td>
                    <td class="col-width t-right"><?=$item->getOrderItem()->getItemAttribute('Count')?></td>
                    <td class="col-width t-right last-child"><b class="number"><?=$item->getOrderItem()->getPrice()?>  <?=Yii::t('app', 'руб.')?></b></td>
                </tr>
            <?endforeach?>
            </tbody>
        </table>
    <?endforeach?>

    <div class="total">
        <span><?=\Yii::t('app', 'Итого')?>:</span> <b class="number"><?=\Yii::app()->numberFormatter->format('#,##0.00', $total)?></b> <?=Yii::t('app', 'руб.')?>
    </div>

    <div style="width: 500px; margin: 0 auto; margin-bottom: 40px;">
        <?if(!$formAdditionalAttributes->getIsEmpty()):?>
            <div class="well m-bottom_30">
                <h4><?=\Yii::t('app', 'Дополнительные данные')?></h4>
                <?=\CHtml::errorSummary($formAdditionalAttributes, '<div class="alert alert-error">', '</div>')?>
                <?=\CHtml::form('', 'POST', ['class' => 'additional-attributes', 'data-valid' => $formAdditionalAttributes->getIsValid()])?>
                <?foreach($formAdditionalAttributes->attributeNames() as $attr):?>
                    <?=$formAdditionalAttributes->getControlGroupHtml($attr)?>
                <?endforeach?>
                <?=\CHtml::endForm()?>
            </div>
        <?endif?>
        <?if(\Yii::app()->getLanguage() == 'en'):?>
            <h4 class="text-center">Mark the checkbox and select the appropriate payment method</h4>
        <?endif?>
        <label class="checkbox text-error">
            <input type="checkbox" name="agreeOffer" value="1"/><?=\Yii::t('app', 'Я согласен с условиями <a target="_blank" href="{url}">договора-оферты</a> и готов перейти к оплате', array('{url}' => $this->createUrl('/pay/cabinet/offer')))?>
        </label>

        <?if($account->Event->IdName === 'devcon16'):?>
            <p class="text-center"><?=\CHtml::link('Скачать прайс-лист','/upload/docs/devcon16-pricelist.pdf')?></p>
        <?endif?>
    </div>

    <div class="pay-buttons clearfix actions">
        <div class="pull-left">
            <h5><?=\Yii::t('app', 'Для юридических лиц')?></h5>
            <?$this->widget('\pay\widgets\JuridicalButton', ['account' => $account, 'htmlOptions' => ['class' => 'btn btn-large juridical']])?>
        </div>
        <div class="pull-right">
            <?$this->widget('\pay\widgets\PayButtons', ['account' => $account, 'htmlOptions' => ['class' => 'btn btn-large']])?>
        </div>
    </div>
    <div class="nav-buttons">
        <?$this->renderPartial('index/buttons/back', ['account' => $account])?>
    </div>
<?else:?>

    <style type="text/css">
        .event-register .alert {
            margin: 0 40px 40px;
        }
    </style>
    <?if(!$hasRecentPaidItems):?>
        <div class="alert alert-error"><?=\Yii::t('app', 'У вас нет товаров для оплаты.')?></div>
    <?else:?>
        <div class="alert alert-success" style="font-size: 120%;">
            <i class="icon-white icon-ok-sign"></i>
            <?if(!empty($account->CabinetHasRecentPaidItemsMessage)):?>
                <?=$account->CabinetHasRecentPaidItemsMessage?>
            <?php else:?>
                <?=\Yii::t('app', 'Вы недавно оплатили участие или активировали промо-код. Вам выслано письмо на '.Yii::app()->user->currentUser->Email.' с подробной информацией.')?>
            <?endif?>
        </div>
    <?endif?>

    <div class="nav-buttons">
        <?$this->renderPartial('index/buttons/back', ['account' => $account])?>
    </div>

<?endif?>