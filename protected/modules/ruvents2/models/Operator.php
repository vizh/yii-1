<?php
namespace ruvents2\models;

/**
 * @property int $Id
 * @property int $EventId
 * @property string $Login
 * @property string $Password
 * @property string $Role
 * @property string $LastLoginTime
 *
 * @method Operator find($condition='',$params=array())
 * @method Operator findByPk($pk,$condition='',$params=array())
 * @method Operator[] findAll($condition='',$params=array())
 */
class Operator extends \CActiveRecord
{
  const RoleOperator = 'Operator';
  const RoleAdmin = 'Admin';

  /**
   * @static
   * @param string $className
   * @return Operator
   */
  public static function model($className=__CLASS__)
  {
    return parent::model($className);
  }

  public function tableName()
  {
    return 'RuventsOperator';
  }

  public function primaryKey()
  {
    return 'Id';
  }

  /**
   * @param int $eventId
   * @param bool $useAnd
   * @return $this
   */
  public function byEventId($eventId, $useAnd = true)
  {
    $criteria = new \CDbCriteria();
    $criteria->condition = '"t"."EventId" = :EventId';
    $criteria->params = ['EventId' => $eventId];
    $this->getDbCriteria()->mergeWith($criteria, $useAnd);
    return $this;
  }
}