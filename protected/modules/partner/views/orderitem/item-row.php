<?php
/**
 * @var $orderItem \pay\models\OrderItem
 * @var $this \partner\components\Controller
 */
?>
<tr>
  <td><?=$orderItem->Id;?></td>
  <td><small><?=$orderItem->CreationTime?></small></td>
  <td>
    <?=$orderItem->Product->Title;?>

    <?if ($orderItem->Product->ManagerName == 'RoomProductManager'):?>
      <?
      /** @var $manager \pay\components\managers\RoomProductManager */
      $manager = $orderItem->Product->getManager();
      ?>
      <strong>Пансионат: <?=$manager->Hotel;?></strong><br>
      <strong>Номер: <?=$manager->Number;?></strong> <span class="muted">(Id: <?=$orderItem->Product->Id;?>)</span><br>
      <?=$manager->Housing;?>, <?=$manager->Category;?><br>
      Всего мест: <?=$manager->PlaceTotal;?> (основных - <?=$manager->PlaceBasic;?>, доп. - <?=$manager->PlaceMore;?>)<br>
      <em><?=$manager->DescriptionBasic;?>, <?=$manager->DescriptionMore;?></em>
    <?endif;?>
  </td>
  <td>
    <?=$orderItem->getPriceDiscount();?>&nbsp;руб.<br/>
    <?if ($orderItem->Paid):?>
      <span class="label label-success">Оплачен</span>
    <?else:?>
      <span class="label">Не оплачен</span>
    <?endif;?>

    <?if ($orderItem->Deleted):?>
      <span class="label label-warning">Удален</span>
    <?endif;?>
  </td>
  <td>
    <?$order = $orderItem->getPaidOrder();?>
    <?if ($order !== null):?>
      <?$type = $order->getPayType();?>
      <?if ($type == \pay\models\Order::PayTypeJuridical):?>
        <span class="text-info">Юр. счет</span>
      <?elseif (strpos($type, 'pay\components\systems\\') !== false):?>
        <span class="text-warning"><?=str_replace('pay\components\systems\\', '', $type);?></span>
      <?else:?>
        <span class="muted">Не задан</span>
      <?endif;?>
      <br/><a href="<?=$this->createUrl('/partner/order/view', ['orderId' => $order->Id]);?>" class="small">(<?=\Yii::t('app', 'счет');?>)</a>
    <?else:?>
      <?if ($orderItem->CouponActivationLink !== null && $orderItem->CouponActivationLink->CouponActivation->Coupon->Discount == 1):?>
        <span class="label label-warning"><?=\Yii::t('app', 'Промо-код 100%');?></span>
      <?else:?>
        <span class="muted">Не задан</span>
      <?endif;?>
    <?endif;?>
  </td>
  <td>
    <?=$orderItem->Payer->RunetId;?>, <strong><?=$orderItem->Payer->getFullName();?></strong>
    <p><em><?=$orderItem->Payer->Email;?></em></p>
  </td>
  <td>
    <?=$orderItem->Owner->RunetId;?>, <strong><?=$orderItem->Owner->getFullName();?></strong>
    <p><em><?=$orderItem->Owner->Email;?></em></p>

    <?if ($orderItem->ChangedOwner !== null):?>
      <p class="text-success"><strong>Перенесено на пользователя</strong></p>
      <?=$orderItem->ChangedOwner->RunetId;?>, <strong><?=$orderItem->ChangedOwner->getFullName();?></strong>
      <p><em><?=$orderItem->ChangedOwner->Email; ?></em></p>
    <?endif;?>
  </td>
  <td>
    <?if ($orderItem->Paid):?>
      <a href="<?=Yii::app()->createUrl('/partner/orderitem/redirect', array('orderItemId' => $orderItem->Id));?>" class="btn btn-mini">Перенести</a>
    <?endif;?>
  </td>
</tr>