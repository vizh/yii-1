<?php
namespace partner\components\form;

class OperatorGenerateForm extends \CFormModel
{
  public $Prefix;
  public $CountOperators;
  public $CountAdmins;

  public function rules()
  {
    return array(
      array('Prefix', 'required'),
      array('CountOperators, CountAdmins', 'numerical'),
      array('CountOperators, CountAdmins', 'positiveValidator')
    );
  }

  public function attributeLabels()
  {
    return array(
      'Prefix'  => 'Префикс для логина',
      'CountOperators'   => 'Количество операторов',
      'CountAdmins' => 'Количество администраторов'
    );
  }

  public function positiveValidator($attribute, $params)
  {
    if ($this->$attribute < 0)
    {
      $this->addError($attribute, 'Поле "'. $this->getAttributeLabel($attribute) .'" не может быть отрицательным');
      return false;
    }

    return true;
  }
}
