<?php
namespace ruvents\controllers\badge;

use application\components\services\AIS;
use event\models\Event;
use event\models\UserData;
use ruvents\components\Exception;
use user\models\User;
use Yii;

class CreateAction extends \ruvents\components\Action
{
    public function run()
    {
        $request = Yii::app()->getRequest();
        $runetId = $request->getParam('RunetId', null);
        //$partId = $request->getParam('PartId', null);

        Yii::log(sprintf('Печать бейджа для RunetId:%d', $runetId));

        //todo: для PHDays
        //$partId = $request->getParam('PartId', 18);


        $event = $this->getEvent();
        $user = \user\models\User::model()->byRunetId($runetId)->find();

        if ($user === null)
            throw new Exception(202, $runetId);

        $badge = new \ruvents\models\Badge();
        $badge->OperatorId = $this->getOperator()->Id;
        $badge->EventId = $event->Id;
        $badge->UserId = $user->Id;

        $participant = \event\models\Participant::model()->byEventId($event->Id)->byUserId($user->Id);
//    if (sizeof($event->Parts) > 0)
//    {
//      /** @var $part \event\models\Part */
//      $part = \event\models\Part::model()->findByPk($partId);
//      if ($part === null || $part->EventId != $event->Id)
//      {
//        throw new \ruvents\components\Exception(306, array($partId));
//      }
//
//      $badge->PartId = $part->Id;
//      $participant->byPartId($part->Id);
//    }
//    else
//    {
//      $participant->byPartId(null);
//    }

        if (count($event->Parts) > 0) {
            $participants = $participant->findAll();
            if (count($participants) == 0) {
                throw new Exception(304);
            }
            $participant = null;
            foreach ($participants as $p) {
                if ($participant == null || $participant->Role->Priority < $p->Role->Priority) {
                    $participant = $p;
                }
                $p->UpdateTime = date('Y-m-d H:i:s');
                $p->save();
            }
        } else {
            $participant = $participant->find();
            if (empty($participant)) {
                throw new Exception(304);
            }
//      $participant->UpdateTime = date('Y-m-d H:i:s');
            $participant->save();
        }

        $badge->RoleId = $participant->RoleId;
        $badge->save();

        if ($this->getEvent()->Id == Event::TS16) {
            $this->notifyAIS($runetId);
        }

        $this->renderJson([
            'Success' => true
        ]);
    }

    /**
     * ТС16: Уведомляет АИС о том, что участник пришел на мероприятие
     *
     * @param int $runetId
     */
    private function notifyAIS($runetId)
    {
        Yii::log(sprintf('Печать бейджа для %d', $runetId));

        if (!$user = User::model()->byRunetId($runetId)->find()) {
            return;
        }

        $data = UserData::fetch(Event::TS16, $user);
        $m = $data->getManager();
        if (!$registrationId = $m->ais_registration_id) {
            Yii::log(sprintf('Пользователь c RunetId:%d не имеет идентификатора в АИС', $runetId));
            return;
        }

        try {
            $ais = new AIS();
            $ais->notify($registrationId);
        } catch (Exception $e) {
            Yii::log(sprintf('Ошибка отправки данных в АИС: %s', $e->getMessage()));
        }
    }
}
