<?php
class MainController extends \oauth\components\Controller
{
  public function actionDialog()
  {
    if ($this->Account->Id === self::SelfId)
    {
      echo '
      <script>
        window.top.modalAuthObj.success();
      </script>';
      return;
    }

    $user = Yii::app()->user->CurrentUser();
    if ($user === null)
    {
      $this->redirect($this->createUrl('/oauth/main/auth'));
    }

    $permission = \oauth\models\Permission::model()->byUserId($user->Id)->byAccountId($this->Account->Id)->find();
    if ($permission !== null)
    {
      $this->redirectWithToken();
    }
    elseif (Yii::app()->getRequest()->isPostRequest)
    {
      $permission = new \oauth\models\Permission();
      $permission->UserId  = $user->Id;
      $permission->AccountId = $this->Account->Id;
      $permission->Verified = true;
      $permission->save();
      $this->redirectWithToken();
    }

    $this->render('dialog', array('user' => $user, 'event' => $this->Account->Event));
  }

  private function redirectWithToken()
  {
    $user = Yii::app()->user->CurrentUser();
    $request = Yii::app()->getRequest();

    $accessToken = new \oauth\models\AccessToken();
    $accessToken->UserId = $user->Id;
    $accessToken->AccountId = $this->Account->Id;
    $accessToken->EndingTime = date('Y-m-d H:i:s', time()+86400);
    $accessToken->createToken($this->Account);
    $accessToken->save();

    $redirectUrl = Yii::app()->request->getParam('url');
    $pos = strrpos($redirectUrl, '?');
    $redirectUrl .= ($pos === false ? '?' : (($pos+1) != strlen($redirectUrl) ? '&' : '')) . http_build_query(array('token' => $accessToken->Token, 'r_state' => $request->getParam('r_state')));
    $this->redirect($redirectUrl);
  }

  public function actionAuth()
  {
    if (!\Yii::app()->user->isGuest)
    {
      $this->redirect($this->createUrl('/oauth/main/dialog'));
    }

    $socialProxy = !empty($this->social) ? new \oauth\components\social\Proxy($this->social) : null;

    $request = \Yii::app()->getRequest();
    $authForm = new \oauth\components\form\AuthForm();
    $authForm->attributes = $request->getParam(get_class($authForm));
    if ($request->getIsPostRequest() && $authForm->validate())
    {
      $identity = new application\components\auth\identity\Password($authForm->Login, $authForm->Password);
      $identity->authenticate();
      if ($identity->errorCode == \CUserIdentity::ERROR_NONE)
      {
        if ($authForm->RememberMe == 1)
        {
          \Yii::app()->user->login($identity, $identity->GetExpire());
        }
        else
        {
          \Yii::app()->user->login($identity);
        }

        if (isset($socialProxy) && $socialProxy->isHasAccess())
        {
          $socialProxy->saveSocialData(\Yii::app()->user->CurrentUser());
        }
        $this->redirect($this->createUrl('/oauth/main/dialog'));
      }
      else
      {
        $authForm->addError('Login', 'Пользователя с такими Эл. почтой или RUNET-ID и паролем не существует.');
      }
    }

    $this->render('auth', array('model' => $authForm, 'socialProxy' => $socialProxy));
  }

  public function actionRegister()
  {
    if (!Yii::app()->user->isGuest)
    {
      $this->redirect($this->createUrl('/oauth/main/dialog'));
    }

    $formRegister = new \oauth\components\form\RegisterForm();
    $socialProxy = null;

    $socialProxy = !empty($this->social) ? new \oauth\components\social\Proxy($this->social) : null;
    if ($socialProxy !== null && $socialProxy->isHasAccess())
    {
      $formRegister->LastName = $socialProxy->getData()->LastName;
      $formRegister->FirstName = $socialProxy->getData()->FirstName;
      $formRegister->Email = $socialProxy->getData()->Email;
    }

    $request = \Yii::app()->getRequest();
    $formRegister->attributes = $request->getParam(get_class($formRegister));
    if ($request->getIsPostRequest() && $formRegister->validate())
    {
      $user = new \user\models\User();
      $user->LastName = $formRegister->LastName;
      $user->FirstName = $formRegister->FirstName;
      $user->FatherName = $formRegister->FatherName;
      $user->Email = $formRegister->Email;
      $user->register();

      if (!empty($formRegister->Company))
      {
        $user->setEmployment($formRegister->Company);
      }
      $identity = new \application\components\auth\identity\RunetId($user->RunetId);
      $identity->authenticate();
      if ($identity->errorCode == \CUserIdentity::ERROR_NONE)
      {
        \Yii::app()->user->login($identity);
        if ($socialProxy !== null && $socialProxy->isHasAccess())
        {
          $socialProxy->saveSocialData($user);
        }

        $this->redirect($this->createUrl('/oauth/main/dialog'));
      }
      else
      {
        throw new \application\components\Exception('Не удалось пройти авторизацию после регистрации. Код ошибки: ' . $identity->errorCode);
      }
    }

    $this->render('register', array('model' => $formRegister, 'socialProxy' => $socialProxy));
  }

  public function actionRecover()
  {
    $this->render('recover');
  }

  public function actionError()
  {
    $error = \Yii::app()->errorHandler->error;
    $this->render('error');
  }
}

?>
