<?php
/**
 * @property int $RegionId
 * @property int $CountryId
 * @property string $Name
 */
class GeoRegion extends CActiveRecord
{
  public static function model($className=__CLASS__)
  {    
    return parent::model($className);
  }
  
  public static $TableName = 'GeoRegion';
  
  public function tableName()
  {
    return self::$TableName;
  }
  
  public function primaryKey()
  {
    return 'RegionId';
  }

  /**
   * @static
   * @param  $countryId
   * @return GeoRegion[]
   */
  public static function GetRegionsByCountry($countryId)
  {
    $region = GeoRegion::model();
    $criteria = new CDbCriteria();
    $criteria->condition = 't.CountryId = :CountryId';
    $criteria->order = 'Priority DESC, Name';
    $criteria->params = array(':CountryId' => $countryId);
    return $region->findAll($criteria);
  }  
}