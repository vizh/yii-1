<?php
namespace oauth\components\form;

class AuthForm extends \CFormModel
{
  public $Login;
  public $Password;
  public $RememberMe = null;
  
  public function rules()
  {
    return array(
      array('Login', 'loginValidate'),
      array('Password', 'required'),
      array('RememberMe', 'safe')
    );
  }
  
  public function loginValidate($attribute, $params)
  {
    if (intval($this->$attribute) > 0)
    {
      return true;
    }
    else if (filter_var($this->$attribute, FILTER_VALIDATE_EMAIL))
    {
      return true;
    }
    $this->addError($attribute, 'Неверно заполнено поле R / Email');
    return false;
  }
  
  public function attributeLabels()
  {
    return array(
      'Login' => 'Эл. почта или RUNET-ID',
      'Password' => 'Пароль',
      'RememberMe' => 'Запомнить меня'
    );
  }
}

?>
