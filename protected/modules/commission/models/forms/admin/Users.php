<?php
namespace commission\models\forms\admin;

class Users extends \CFormModel
{
  public $Users = array();
  public function rules()
  {
    return array(
      array('Users', 'filter', 'filter' => array($this, 'filterUsers'))
    );
  }
  
  public function setAttributes($values, $safeOnly = true)
  {
    if (isset($values['Users']))
    {
      foreach ($values['Users'] as $value)
      {
        $form = new \commission\models\forms\User();
        $form->attributes = $value;
        $this->Users[] = $form;
      }
      unset($values['Users']);
    }
    parent::setAttributes($values, $safeOnly);
  }
  
  public function filterUsers($users)
  {
    $valid = true;
    foreach ($users as $user)
    {
      if (!$user->validate())
      {
        $valid = false;
      }
    }
    if (!$valid)
    {
      $this->addError('Users', \Yii::t('app', 'Ошибка в заполнении участников.'));
    }
    return $users;
  }
}
