<?php
namespace api\controllers\pay;
class ItemsAction extends \api\components\Action
{
  public function run()
  {
    $ownerRunetId = \Yii::app()->request->getParam('OwnerRocId');
    $owner = \user\models\User::model()->byRunetId($ownerRunetId)->find();
    if ($owner == null)
    {
      throw new ApiException(202, array($ownerRunetId));
    }
    else if ($this->getAccount()->Event == null)
    {
      throw new ApiException(301);
    }
    
    $result = new \stdClass();
    $orderItems = \pay\models\OrderItem::model()
      ->byOwnerId($owner->Id)->byEventId($this->getAccount()->EventId)->findAll();
    $result->Items = array();
    foreach ($orderItems as $orderItem)
    {
      $result->Items[] = $this->getAccount()->getDataBuilder()->createOrderItem($orderItem);
    }
    $this->getController()->setResult($result);
  }
}
