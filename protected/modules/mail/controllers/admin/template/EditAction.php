<?php
namespace mail\controllers\admin\template;

class EditAction extends \CAction
{
  private $count = 0;
  private $countAll = 0;
  private $form;
  private $template;

  private $viewHasExternalChanges = false;

  public function run($templateId = null)
  {
    $this->form = new \mail\models\forms\admin\Template();

    if ($templateId !== null)
    {
      $this->template = \mail\models\Template::model()->findByPk($templateId);
      if ($this->template == null)
        throw new \CHttpException(404);

      foreach ($this->template->getAttributes() as $attribute => $value)
      {
        if (property_exists($this->form, $attribute))
          $this->form->$attribute = $value;
      }

      if (md5_file($this->template->getViewPath()) != $this->template->ViewHash)
        $this->viewHasExternalChanges = true;

      if (!$this->viewHasExternalChanges)
      {
        $body = file_get_contents($this->template->getViewPath());
        $this->form->Body = str_replace($this->form->bodyFields(), array_keys($this->form->bodyFields()), $body);
      }

      $filter = $this->template->getFilter();
      $this->form->Conditions = $this->getFormConditionsList($filter);

      $this->count = \user\models\User::model()->count($this->template->getCriteria());
      if ($this->template->Success)
      {
        $this->countAll = \mail\models\TemplateLog::model()->byTemplateId($this->template->Id)->byHasError(false)->count();
      }
      else
      {
        $this->countAll = \user\models\User::model()->count($this->template->getCriteria(true));
      }
      if ($this->template->Active)
      {
        $this->form->addError('Active', \Yii::t('app', 'Рассылка была активирована, внесни изменения невозможно!'));
      }
    }
    else
    {
      $this->template = new \mail\models\Template();
    }

    $request = \Yii::app()->getRequest();
    $this->form->attributes = $request->getParam(get_class($this->form));
    if ($request->getIsPostRequest() && $this->form->validate(null, false))
    {
      $this->processForm();
    }

    \Yii::app()->getClientScript()->registerPackage('runetid.backbone');
    \Yii::app()->getClientScript()->registerPackage('runetid.ckeditor');
    $this->getController()->setPageTitle(\Yii::t('app', 'Редактирование рассылки'));
    $this->getController()->render('edit', [
      'form' => $this->form,
      'count' => $this->count,
      'template' => $this->template,
      'countAll' => $this->countAll,
      'viewHasExternalChanges' => $this->viewHasExternalChanges
    ]);
  }

  private function processForm()
  {
    $this->template->Title = $this->form->Title;
    $this->template->Subject = $this->form->Subject;
    $this->template->From = $this->form->From;
    $this->template->FromName = $this->form->FromName;
    $this->template->SendPassbook = $this->form->SendPassbook == 1 ? true : false;
    $this->template->SendUnsubscribe = $this->form->SendUnsubscribe == 1 ? true : false;
    $this->template->Active = $this->form->Active == 1 ? true : false;
    if ($this->template->Active)
    {
      $this->template->ActivateTime = date('Y-m-d H:i:s');
    }

    $filter = new \mail\components\filter\Event();
    foreach ($this->form->Conditions as $key => $condition)
    {
      $filterItem = null;
      switch ($condition['by'])
      {
        case  \mail\models\forms\admin\Template::ByEvent:
          $filterItem = new \mail\components\filter\EventCondition($condition['eventId'], $condition['roles']);
          break;
      }
      $filter->{$condition['type']}[] = $filterItem;
    }
    $this->template->setFilter($filter);
    $this->template->save();

    if (!$this->viewHasExternalChanges)
    {
      $this->form->Body = str_replace(array_keys($this->form->bodyFields()), $this->form->bodyFields(), $this->form->Body);
      file_put_contents($this->template->getViewPath(), $this->form->Body);
      $this->template->ViewHash = md5_file($this->template->getViewPath());
      $this->template->save();
    }

    \Yii::app()->getUser()->setFlash('success', \Yii::t('app', 'Рассылка успешно сохранена!'));
    if ($this->form->Test == 1)
    {
      $this->template->setTestMode(true);
      $this->template->setTestUsers(
        \user\models\User::model()->bySearch($this->form->TestUsers)->findAll()
      );
      $this->template->send();
      \Yii::app()->getUser()->setFlash('success', \Yii::t('app', 'Тестовая рассылка успешно отправлена!'));
    }
    $this->getController()->redirect(
      $this->getController()->createUrl('/mail/admin/template/edit', ['templateId' => $this->template->Id])
    );
  }

  private function getFormConditionsList($filter)
  {
    $conditions = [];
    $types = [
      \mail\models\forms\admin\Template::TypePositive,
      \mail\models\forms\admin\Template::TypeNegative
    ];
    foreach ($types as $type)
    {
      foreach ($filter->$type as $criteria)
      {
        $condition = ['type' => $type, 'by' => \mail\models\forms\admin\Template::ByEvent];
        $class = new \ReflectionClass($criteria);
        foreach ($class->getProperties() as $property)
        {
          $condition[$property->getName()] = isset($criteria->{$property->getName()}) ? $criteria->{$property->getName()} : null;
        }
        $conditions[] = $condition;
      }
    }
    return $conditions;
  }
}