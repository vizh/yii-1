<?php
namespace event\models;

/**
 * @property int $Id
 * @property int $EventId
 * @property string $Name
 * @property int $Order
 */
class PartnerType extends \CActiveRecord
{
  /**
   * @param string $className
   * @return PartnerType
   */
  public static function model($className=__CLASS__)
  {
    return parent::model($className);
  }

  public function tableName()
  {
    return 'EventPartnerType';
  }

  public function primaryKey()
  {
    return 'Id';
  }

  public function relations()
  {
    return array(
      'Event' => array(self::BELONGS_TO, '\event\models\Event', 'EventId'),
    );
  }
}