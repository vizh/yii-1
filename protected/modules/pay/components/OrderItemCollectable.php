<?php
namespace pay\components;

class OrderItemCollectable
{
  /**
   * @var \pay\models\OrderItem
   */
  private $orderItem;

  /**
   * @var OrderItemCollection
   */
  private $collection;

  function __construct(\pay\models\OrderItem $orderItem, OrderItemCollection $collection)
  {
    $this->orderItem = $orderItem;
    $this->collection = $collection;
  }

  public function getOrderItem()
  {
    return $this->orderItem;
  }

  /**
   * Итоговое значение цены товара, с учетом скидки, если она есть
   * @throws \pay\components\Exception
   * @return int|null
   */
  public function getPriceDiscount()
  {
    $price = $this->orderItem->getPrice();
    if ($price === null)
    {
      throw new \pay\components\Exception('Не удалось определить цену продукта!');
    }

    $price = $price * (1 - $this->getDiscount());
    return (int)round($price);
  }

  private $discount = null;

  public function getDiscount()
  {
    if ($this->discount === null)
    {
      if ($this->orderItem->Product->EnableCoupon)
      {
        $activation = $this->orderItem->getCouponActivation();
        $this->discount = $activation !== null ? $activation->Coupon->Discount : 0;
        $this->discount = $this->discount > $this->collection->getDiscount() ? $this->discount : $this->collection->getDiscount();
      }
      else
      {
        $this->discount = 0;
      }
    }
    return $this->discount;
  }

  private $isGroupDiscount = null;

  public function getIsGroupDiscount()
  {
    if ($this->isGroupDiscount === null)
    {
      if ($this->orderItem->Product->EnableCoupon && $this->collection->getDiscount() > 0)
      {
        $activation = $this->orderItem->getCouponActivation();
        $this->isGroupDiscount = $activation == null || !($activation->Coupon->Discount > $this->collection->getDiscount());
      }
      else
      {
        $this->isGroupDiscount = false;
      }
    }

    return $this->isGroupDiscount;
  }
}