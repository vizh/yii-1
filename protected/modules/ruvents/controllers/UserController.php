<?php
class UserController extends \ruvents\components\Controller
{
  /**
   *
   */
  public function actionCreate ()
  {
    $request = \Yii::app()->getRequest();
    
    $userModel = new \user\models\User();
    $userModel->LastName = $request->getParam('LastName');
    $userModel->FirstName = $request->getParam('FirstName');
    $userModel->FatherName = $request->getParam('FatherName');
    $userModel->Email = $request->getParam('Email');
    $userModel->Password = $request->getParam('Password');
    if ($userModel->validate())
    {
      $user = $userModel->Register();     
      $user->Settings->Agreement = 1;
      $user->Settings->save();
      
      $company = $request->getParam('Company', null);
      $position = $request->getParam('Position', null);
      if ($company != null && $position != null)
      {
        $this->addUserEmployment($user, $company, $position);
      }
      
      $phone = $request->getParam('Phone', null);
      if ($phone != null)
      {
        $this->addUserPhone($user, $phone);
      }
      
      $result = array();
      $result['User'] = $this->buildUser($user);
      echo json_encode($result);
    }
    else 
    {
      foreach ($userModel->getErrors() as $message)
      {
        throw new \ruvents\components\Exception(207, $message);
      }
    }
  }
  
  /**
   * 
   */
  public function actionEdit ()
  {
    $request = Yii::app()->getRequest();
    $rocId = $request->getParam('RocId', null);
    
    $event = \event\models\Event::GetById($this->Operator()->EventId);
    if ($event === null)
    {
      throw new \ruvents\components\Exception(301);
    }
    
    $criteria = new \CDbCriteria();
    $criteria->with = array('Participants' => array('together' => true), 'Participants.Role');
    $criteria->condition = 't.RocId = :RocId AND Participants.EventId = :EventId';
    $criteria->params[':RocId'] = $rocId;
    $criteria->params[':EventId'] = $event->EventId;
    $user = \user\models\User::model()->find($criteria);
    if ($user === null)
    {
      throw new \ruvents\components\Exception(304);
    }
    
    $firstName = $request->getParam('FirstName', null);
    if ($firstName !== null) 
    {
      $user->FirstName = $firstName;
    }
    
    $lastName = $request->getParam('LastName', null);
    if ($lastName !== null)
    {
      $user->LastName = $lastName;
    }
    
    $fatherName = $request->getParam('FatherName', null);
    if ($fatherName !== null)
    {
      $user->FatherName = $fatherName;
    }
    
    $sex = $request->getParam('Sex', null);
    if ($sex !== null)
    {
      $user->Sex = $sex;
    }
    
    $birthday = $request->getParam('Birthday', null);
    if ($birthday !== null)
    {
      $user->Birthday = $birthday;
    }
    
    if ($user->validate())
    {
      $user->UpdateTime = time();
      $user->save();
    }
    else
    {
      foreach ($user->getErrors() as $message)
      {
        throw new \ruvents\components\Exception(207, $message); 
      }
    }
    
    $email = $request->getParam('Email', null);
    if ($email !== null)
    {
      $emailValidator = new \CEmailValidator();
      if (!$emailValidator->validateValue($email))
      {
        throw new \ruvents\components\Exception(205);
      }
      
      $userEmail = $user->GetEmail();
      if (!empty($userEmail))
      {
        $userEmail->Email = $email;
        $userEmail->save();
      }
      else 
      {
        $user->AddEmail($email, 1);
      }
    }
    
    $phone = $request->getParam('Phone', null);
    if ($phone !== null)
    {
      $this->addUserPhone($user, $phone);
    }
    
    $company = $request->getParam('Company', null);
    $position = $request->getParam('Position', null);
    if ($company != null && $position != null)
    {
      $this->addUserEmployment($user, $company, $position);
    }
    
    $result = array();
    $user->refresh();
    $this->buildUser($user);
    $result['User'] = $this->DataBuilder()->BuildUserEvent($user);
    echo json_encode($result);
  }
  
  /**
   *
   * @throws \ruvents\components\Exception 
   */
  public function actionSearch ()
  {
    $request = Yii::app()->getRequest();
    $query = $request->getParam('Query', null);
    if (empty($query))
    {
      throw new \ruvents\components\Exception(501);
    }
    
    $criteriaWith = array(
      'Emails' => array('together' => true), 
      'Phones', 
      'Employments', 
      'Settings' => array('together' => true)
    );
    
    if (filter_var($query, FILTER_VALIDATE_EMAIL))
    {
      $user = \user\models\User::GetByEmail($query, $criteriaWith);
      if ($user === null)
      {
        $criteria = new CDbCriteria();
        $criteria->condition = 'Emails.Email = :Email';
        $criteria->params[':Email'] = $query;
        $criteria->with = $criteriaWith;
        $users = \user\models\User::model()->findAll($criteria);
      }
      else
      {
        $users[] = $user;
      }
    }
    else 
    {
      $criteria = \user\models\User::GetSearchCriteria($query);
      $criteria->with  = $criteriaWith;
      $criteria->limit = 200;
      $users = \user\models\User::model()->findAll($criteria);
    }
    
    $result = array('Users' => array());
    if (!empty($users))
    {
      foreach ($users as $user)
      {
        $result['Users'][] = $this->buildUser($user);
      }
    }
    echo json_encode($result);
  }
  
  
  /**
   * Строит результат пользователя
   * @param \user\models\User $user
   * @return stdClass 
   */
  private function buildUser ($user)
  {
    $this->DataBuilder()->CreateUser($user);
    $this->DataBuilder()->BuildUserEmail($user);
    $this->DataBuilder()->BuildUserEmployment($user);
    return $this->DataBuilder()->BuildUserPhone($user);
  }
  
  /**
   * Связывает пользователя с местом работы
   * @param \application\models\user\User $user
   * @param string $companyName
   * @param string $position 
   */
  private function addUserEmployment ($user, $companyName, $position)
  {
    if (!empty($user->Employments))
    {
      foreach ($user->Employments as $userEmployment)
      {
        $userEmployment->Primary = 0;
        $userEmployment->save();
      }
    }
    
    $companyInfo = \company\models\Company::ParseName($companyName);
    $company = \company\models\Company::GetCompanyByName($companyInfo['name']);
    if ($company == null)
    {
      $company = new \company\models\Company();
      $company->Name = $companyInfo['name'];
      $company->Opf = $companyInfo['opf'];
      $company->CreationTime = time();
      $company->UpdateTime = time();
      $company->save();
    }

    $employment = new \user\models\Employment();
    $employment->UserId = $user->UserId;
    $employment->CompanyId = $company->CompanyId;
    $employment->SetParsedStartWorking(array('year' => '9999'));
    $employment->SetParsedFinishWorking(array('year' => '9999'));
    $employment->Position = $position;
    $employment->Primary = 1;
    $employment->save();
  }
  
  /**
   * Добавляет телефон пользователю
   * @param \application\models\user\User $user
   * @param string $phone
   * @param string $type 
   */
  private function addUserPhone ($user, $phone, $type = \contact\models\Phone::TypeMobile)
  {
    if (!empty($user->Phones))
    {
      foreach ($user->Phones as $userPhone)
      {
        $userPhone->Primary = 0;
        $userPhone->Save();
      }
    }

    $contactPhone = new \contact\models\Phone();
    $contactPhone->Phone = $phone;
    $contactPhone->Primary = 1;
    $contactPhone->Type = \contact\models\Phone::TypeMobile;
    $contactPhone->save();   
    $user->AddPhone($contactPhone);
  }
}
