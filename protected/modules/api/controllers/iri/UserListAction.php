<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 23.06.2015
 * Time: 14:14
 */

namespace api\controllers\iri;


use api\components\Action;
use iri\models\User;

class UserListAction extends Action
{
    public function run()
    {
        $request = \Yii::app()->getRequest();
        $type = $request->getParam('Type');

        $criteria = new \CDbCriteria();
        $criteria->addCondition('"t"."ExitTime" IS NULL OR "t"."ExitTime" > NOW()');
        $users = User::model()->byType($type)->orderBy('"t"."JoinTime"')->findAll($criteria);

        $result = [];
        foreach ($users as $user) {
            $result[] = $this->getDataBuilder()->createIriUser($user);
        }
        $this->setResult($result);
    }
} 