<?php
use application\components\controllers\PublicMainController;
use \competence\models\Result;

class MainController extends PublicMainController
{
    public $layout = '/layouts/public';

    /** @var \competence\models\Test */
    public $test;

    /** @var \competence\models\Question */
    public $question;

    public function actions()
    {
        return [
            'process' => 'competence\controllers\main\ProcessAction',
        ];
    }

    /**
     * @return \competence\models\Test
     */
    public function getTest()
    {
        if ($this->test == null)
        {
            $this->test = \competence\models\Test::model()->byParticipantsOnly(false)->findByPk($this->actionParams['id']);
        }
        return $this->test;
    }

    /**
     * Проверяет проходил ли пользователь опрос
     * @return bool
     */
    private function checkExistsResult()
    {
        if (!$this->getTest()->Test && !$this->getTest()->Multiple) {
            $model = Result::model()->byTestId($this->getTest()->Id)->byFinished();
            if ($this->getTest()->getUserKey() !== null) {
                $model->byUserKey($this->getTest()->getUserKey());
            } else {
                $model->byUserId($this->getUser()->Id);
            }
            return $model->exists();
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    protected function beforeAction($action)
    {
        if ($this->getTest() == null || !$this->getTest()->Enable) {
            throw new \CHttpException(404);
        }

        if ($this->getTest()->getUserKey() == null && \Yii::app()->user->getCurrentUser() == null) {
            $this->render('competence.views.system.unregister');
            return false;
        }

        if ($this->checkExistsResult() && $action->getId() != 'done') {
            $this->redirect(['done', 'id' => $this->getTest()->Id]);
        }

        if (!empty($this->getTest()->EndTime) && $this->test->EndTime < date('Y-m-d H:i:s') && $action->getId() != 'after') {
            $this->redirect(['after', 'id' => $this->getTest()->Id]);
        }

        $this->getTest()->setUser(\Yii::app()->user->getCurrentUser());
        return parent::beforeAction($action);
    }

    public function actionIndex($id)
    {
        $this->setPageTitle(strip_tags($this->getTest()->Title));
        if (\Yii::app()->request->getIsPostRequest())
        {
            if ($this->getTest()->Test)
            {
                $this->test->getFirstQuestion()->getForm()->clearResult();
                $this->test->getFirstQuestion()->getForm()->clearRotation();
            }
            $this->redirect($this->createUrl('/competence/main/process', ['id' => $id]));
        }
        $this->render('index', ['test' => $this->getTest()]);
    }

    public function actionDone($id)
    {
        $this->render($this->getTest()->getEndView(), [
            'test' => $this->getTest(),
            'done' => $this->checkExistsResult()
        ]);
    }

    public function actionAfter($id)
    {
        $this->render('after', ['test' => $this->getTest()]);
    }

    /**
     * @return User|null
     */
    public function getUser()
    {
        if (\Yii::app()->user->getCurrentUser() !== null) {
            return \Yii::app()->user->getCurrentUser();
        }
        elseif (\Yii::app()->tempUser->getCurrentUser() !== null) {
            return \Yii::app()->tempUser->getCurrentUser();
        }
        return null;
    }
}