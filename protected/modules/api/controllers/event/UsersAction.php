<?php

namespace api\controllers\event;

use api\components\Action;
use api\components\builders\Builder;
use api\models\Account;
use application\components\helpers\ArrayHelper;
use CDbCriteria;
use pay\models\OrderItem;
use user\models\User;
use Yii;

class UsersAction extends Action
{
    public function run()
    {
        $request = Yii::app()->getRequest();
        $maxResults = (int)$request->getParam('MaxResults', $this->getMaxResults());
        $maxResults = min($maxResults, $this->getMaxResults());
        $pageToken = $request->getParam('PageToken', null);
        $roles = $request->getParam('RoleId');

        $nextUpdateTime = date('Y-m-d H:i:s');
        $fromUpdateTime = $this->hasRequestParam('FromUpdateTime')
            ? $this->getRequestedDate('FromUpdateTime')
            : null;

        $command = Yii::app()->getDb()->createCommand()
            ->select('EventParticipant.UserId')->from('EventParticipant')
            ->where('"EventParticipant"."EventId" = '.$this->getEvent()->Id);

        if (!empty($roles)) {
            $command->andWhere(['in', 'EventParticipant.RoleId', $roles]);
        }

        $criteria = new CDbCriteria();

        if ($pageToken === null) {
            $criteria->limit = $maxResults;
            $criteria->offset = 0;
        } else {
            $criteria->limit = $maxResults;
            $criteria->offset = $this->getController()->parsePageToken($pageToken);
        }

        if ($fromUpdateTime !== null) {
            $criteria->addCondition('"t"."UpdateTime" > :UpdateTime');
            $criteria->params['UpdateTime'] = $fromUpdateTime;
        }


        $criteria->with = [
            'Participants' => [
                'on' => '"Participants"."EventId" = :EventId',
                'params' => [
                    'EventId' => $this->getEvent()->Id,
                ],
                'together' => false,
            ],
            'Employments.Company' => ['on' => '"Employments"."Primary"', 'together' => false],
            'LinkPhones.Phone' => ['together' => false],
        ];
        $criteria->order = '"t"."LastName" ASC, "t"."FirstName" ASC';
        $criteria->addCondition('"t"."Id" IN ('.$command->getText().')');

        $users = User::model();

        if ($this->hasRequestParam('RunetId'))
            $users->byRunetId($this->getRequestParam('RunetId'));

        $users = $users->findAll($criteria);

        if ($this->getEvent()->IdName === 'forinnovations16' && $this->getAccount()->Role !== Account::ROLE_MOBILE) {
            $orderItems = $this->getOrderItems(ArrayHelper::columnGet('Id', $users));
        }

        $result = [
            'Users' => [],
            'TotalCount' => $this->getTotalCount(),
            'NextUpdateTime' => $nextUpdateTime
        ];

        // Билдеры по умолчанию
        $defaultBuilders = [
            Builder::USER_EVENT,
            Builder::USER_EMPLOYMENT,
            Builder::USER_ATTRIBUTES,
        ];

        // Не совсем понятно почему, но ок..
        if ($this->getAccount()->Role !== 'mobile') {
            $defaultBuilders[] = Builder::USER_CONTACTS;
        }

        // toDo: Выпилить.
        $builders = $request->getParam('Builders', $defaultBuilders);

        // Не совсем понятно почему, но ок..
        if ($this->getAccount()->Role !== 'mobile') {
            $builders[] = Builder::USER_CONTACTS;
        }

        foreach ($users as $user) {
            $userData = $this
                ->getDataBuilder()
                ->createUser($user, $builders);


            if (isset($orderItems[$user->Id])) {
                /** @var OrderItem $item */
                foreach ($orderItems[$user->Id] as $item) {
                    switch ($item->ProductId) {
                        case 6160: $userData->Products = ['Id' => $item->ProductId, 'Days' => 1]; break;
                        case 6161: $userData->Products = ['Id' => $item->ProductId, 'Days' => 3]; break;
                        case 6158: $userData->Products = ['Id' => $item->ProductId, 'Days' => 1]; break;
                        case 6159: $userData->Products = ['Id' => $item->ProductId, 'Days' => 3]; break;
                        case 6182: $userData->Products = ['Id' => $item->ProductId, 'Days' => 2]; break;
                    }
                }
            } else {
                $userData->Products = [
                    'Days' => 3
                ];
            }

            $result['Users'][] = $userData;
        }

        if (count($users) === $maxResults) {
            $result['NextPageToken'] = $this->getController()->getPageToken($criteria->offset + $maxResults);
        }

        $this->setResult($result);
    }

    private function getOrderItems(array $ids)
    {
        $criteria = new \CDbCriteria();
        $criteria->addInCondition('"t"."OwnerId"', $ids);
        $criteria->addCondition('"t"."ChangedOwnerId" IS NULL');
        $criteria->addInCondition('"t"."ChangedOwnerId"', $ids, 'OR');

        $orderItems = OrderItem::model()
            ->byEventId($this->getEvent()->Id)
            ->byPaid(true)
            ->findAll($criteria);

        $result = [];
        foreach ($orderItems as $item) {
            $ownerId = $item->ChangedOwnerId === null
                ? $item->OwnerId
                : $item->ChangedOwnerId;

            $result[$ownerId][] = $item;
        }

        return $result;
    }

    /**
     * @return mixed
     */
    private function getTotalCount()
    {
        $command = Yii::app()->getDb()->createCommand();
        $command->select('count("Id")');
        $command->from('EventParticipant');
        $command->andWhere('"EventId" = :EventId', [':EventId' => $this->getEvent()->Id]);

        if ($this->hasRequestParam('RoleId')) {
            $command->andWhere(['in', 'EventParticipant.RoleId', $this->getRequestParam('RoleId')]);
        }

        return $command->queryScalar();
    }
}
