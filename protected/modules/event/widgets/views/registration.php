<?php
/**
 * @var $this \event\widgets\Registration
 * @var $products \pay\models\Product[]
 */
if (empty($products))
{
  return;
}
?>
<form method="post" action="<?=\Yii::app()->createUrl('/pay/cabinet/register', array('eventIdName' => $this->event->IdName));?>" class="registration">
  <h5 class="title"><?=Yii::t('pay', 'Регистрация');?></h5>
  <table class="table table-condensed">
    <thead>
    <tr>
      <th><?=Yii::t('pay', 'Тип билета');?></th>
      <th class="t-right col-width"><?=Yii::t('pay', 'Цена');?></th>
      <th class="t-center col-width"><?=Yii::t('pay', 'Кол-во');?></th>
      <th class="t-right col-width"><?=Yii::t('pay', 'Сумма');?></th>
    </tr>
    </thead>
    <tbody>
    <?foreach ($products as $product):?>
      <tr>
        <td style="padding-top: 25px;"><strong><?=$product->Title;?></strong></td>
        <td colspan="3"></td>
      </tr>
      <?foreach ($product->Prices as $price):?>
        <?
        $curTime = date('Y-m-d H:i:s');
        $isMuted = $curTime < $price->StartTime || ($price->EndTime != null && $curTime > $price->EndTime);
        $mutedClass = $isMuted ? 'muted' : '';
        ?>
        <tr data-price="<?=$price->Price;?>">
          <td class="<?=$mutedClass?>">
            <?if ($price->EndTime !== null):?>
              При регистрации до <?=\Yii::app()->dateFormatter->format('d MMMM', $price->EndTime);?>
            <?else:?>
              При регистрации с <?=\Yii::app()->dateFormatter->format('d MMMM', $price->StartTime);?> и на входе
            <?endif;?>
          </td>
          <td class="t-right <?=$mutedClass?>"><span class="number"><?=$price->Price;?></span> Р</td>
          <td class="t-center <?=$mutedClass?>">
            <select <?if($isMuted):?>disabled="disabled"<?endif;?> name="count[<?=$product->Id;?>]" class="input-mini form-element_select">
              <option value="0" selected>0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
            </select>
          </td>
          <td class="t-right <?=$mutedClass?>"><b class="number mediate-price">0</b> Р</td>
        </tr>
      <?endforeach;?>
    <?endforeach;?>
    <tr>
      <td colspan="4" class="t-right total">
        <span><?=Yii::t('pay', 'Итого');?>:</span> <b id="total-price" class="number">0</b> Р
      </td>
    </tr>
    </tbody>
  </table>
  <div class="clearfix">
    <button type="submit" class="btn btn-small btn-info pull-right"><?=Yii::t('pay', 'Зарегистрироваться');?></button>
  </div>
</form>