<?php
/**
 * @var User $user
 * @var Event $event
 * @var Participant|Participant[] $participant
 */

use user\models\User;
use event\models\Event;
use event\models\Participant;
use ruvents\components\QrCode;
use application\components\web\helpers\Html;

$contacts = [];
if ($event->getContactSite() != null) {
    $contacts[] = 'Сайт: ' . $event->getContactSite()->getCleanUrl();
}
if (!empty($event->LinkPhones)) {
    $contacts[] = 'Тел.: ' . $event->LinkPhones[0]->Phone;
}
if (!empty($event->LinkEmails)) {
    $contacts[] = 'E-mail: ' . $event->LinkEmails[0]->Email->Email;
}

?>
<style type="text/css">
    p {
        padding: 0;
        margin:  0;
    }
    h3 {
        font-size: 5mm;
        font-weight: 100;
        padding: 0;
        margin: 0;
    }
</style>
<div style="position: absolute; width: 87mm; rotate: 90;font-family: 'Roboto', 'Helvetica Neue', Helvetica,Arial, sans-serif; font-size: 3mm; color: #556a7d;">
    <div style="padding: 3mm 0;background-color: #09918d; text-align: center; color: #fff; border-radius: 7mm 7mm 0 0;">
        <div style="height: 20px;"></div>
    </div>
    <table style="width: 100%; padding: 5mm; border-left: 0.5mm solid #ededed; border-right: 0.5mm solid #ededed; height: 77mm; font-family: 'Roboto', 'Helvetica Neue', Helvetica,Arial, sans-serif;" cellpadding="0" cellspacing="0">
        <tr>
            <td style="vertical-align: top; height: 40mm; color: #556a7d;">
                <h3 style="text-transform: uppercase; padding-bottom: 20px; color: #777777;"><?=Yii::t('tickets/ipheb16', 'ЭЛЕКТРОННЫЙ БИЛЕТ')?></h3>
                <img src="/img/ticket/ipheb16/IPHEB_logo.jpg" style="padding-right: 3mm; image-resolution: 110dpi;"/>
                <p style="color: #5d6363;">
                    <?=Yii::t('tickets/ipheb16', 'Международная выставка<br/>фармацевтических ингредиентов,<br/>производства и дистрибуции лекарственных<br/>средств')?>
                </p>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: middle; height: 17mm; color: #c01f40; font-size: 16px;">
                <?=Yii::t('tickets/ipheb16', '30 марта - 01 апреля 2016')?><br/>
                <?=Yii::t('tickets/ipheb16', 'МОСКВА, ВДНХ, 75 павильон')?>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: bottom; height: 20mm; color: #556a7d;">
            </td>
        </tr>
    </table>
    <table style="width: 100%; background-color: #01615f; padding: 5mm; color: #fff; font-family: 'Roboto', 'Helvetica Neue', Helvetica,Arial, sans-serif;">
        <tbody>
            <tr>
                <td style="height: 33mm; vertical-align: top;">
                    <table style="width: 100%;" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="font-size: 5mm; font-weight: 100; padding: 0; margin: 0;">
                                <?=$user->LastName?><br/><?=$user->getShortName()?>
                            </td>
                        </tr>
                        <?if($user->getEmploymentPrimary() !== null):?>
                            <tr>
                                <?=Html::limitedTag('td', $user->getEmploymentPrimary()->Company->Name, 20, 291, 60, [
                                    'style' => 'padding-top: 5mm;'
                                ])?>
                            </tr>
                        <?endif?>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 20mm; vertical-align: bottom; font-size: 3mm;">
                    <?if(is_array($participant)):?>
                        <?foreach($participant as $item):?>
                            <span style="text-transform: uppercase;">
                                <?=$item->Part->Title?>:
                            </span>
                            <?=$item->Role->Title?><br/>
                        <?endforeach?>
                    <?php else:?>
                        <span style="text-transform: uppercase; font-size: 4mm;"><?=$participant->Role->Title?></span>
                    <?endif?>
                </td>
            </tr>
        </tbody>
    </table>
    <div style="padding: 10mm 5mm; text-align: right; background: #ededed; border-radius: 0 0 7mm 7mm;">
        <table style="font-size: 3mm; font-family: 'Roboto', 'Helvetica Neue', Helvetica,Arial, sans-serif; width: 100%;" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
                <td align="center" style="font-size: 4mm;"><barcode code="<?=$user->RunetId?>" type="C128C" size="1" height="1"/><br><?=$user->RunetId?></td>
                <td style="text-align: right;"><?=\CHtml::image(QrCode::getAbsoluteUrl($user, 70))?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div style="height: 92mm;"></div>
<div style="background: url('/img/ticket/pdf/base/cutting-line.png') center center; height: 1mm; background-image-resolution: 100dpi;">
    <img src="/img/ticket/pdf/base/cutting.png" style="position: absolute; margin-top: 0; margin-left: 5mm;"/>
</div>
<table style="width: 100%; color: #595f5d; margin: 7px 10px 7px 30px;" cellpadding="0" cellspacing="10">
    <tbody>
    <tr>
        <td style="vertical-align: top; padding-right: 5px;">
            <p>
                <?=Yii::t('tickets/ipheb16', 'Спасибо за регистрацию и добро пожаловать на выставку<br/>IPhEB&CPhl Russia 2016.')?>
            </p>

            <br/><br/>
            <p>
                <?if(Yii::app()->language === 'ru'):?>
                    <b>Инструкция:</b><br/>
                <?endif?>
                <span>1) <?=Yii::t('tickets/ipheb16', 'Распечатайте Ваш пригласительный билет и обязательно возьмите его с собой на мероприятие')?>.</span>
                <br/>
                <span>2) <?=Yii::t('tickets/ipheb16', 'Предъявите пригласительный билет в зоне регистрации и получите имменной бейдж')?>.</span>
                <br/>
                <span>3) <?=Yii::t('tickets/ipheb16', 'Желаем Вам успешной работы на выставке')?>!</span>
            </p>
        </td>
        <td style="vertical-align: top;">
            <b><?=Yii::t('tickets/ipheb16', 'Время работы выставки')?>:</b><br/>
            <?if(Yii::app()->language === 'ru'):?>
                <span>30 - 31 марта.............10:00 - 18:00</span><br/>
                <span>01 апреля..................10:00 - 16:00</span>
            <?php else:?>
                <span>Wednesday 30 March: 10:00 - 18:00</span><br/>
                <span>Thursday 31 March: 10:00 - 18:00</span><br/>
                <span>Friday 01 April: 10:00 - 16:00</span>
            <?endif?>

            <br/><br/>
            <b><?=Yii::t('tickets/ipheb16', 'Место проведения')?>:</b><br/>
            <?if(Yii::app()->language === 'ru'):?>
                <span>Россия, Москва</span><br/>
                <span>пр. Мира 119</span><br/>
                <span>ВДНХ, 75 павильон, зал А</span><br/>
                <span>сайт мероприятия: <a href="http://www.fi-russia.ru/" style="color: #1179A0;">www.fi-russia.ru</a>
                    </span>
            <?php else:?>
                <span>All-Russian Exhibition Centre (VDNH)</span><br/>
                <span>Pavilion 75</span><br/>
                <span>Prospect Mira, VDNH</span><br/>
                <span>Moscow, Russia, 129223</span>
            <?endif?>
        </td>
    </tr>
    </tbody>
</table>
<div style="margin: 0 5mm; padding: 5mm 0; background-color: #ededed; font-family: 'Roboto', 'Helvetica Neue', Helvetica,Arial, sans-serif; font-size: 3mm; color: #556a7d;">
    <table style="font-size: 4mm; font-weight: 100; vertical-align: baseline; margin: 0; color: #595f5d; padding: 0 6mm;">
        <tbody>
        <tr>
            <td style="height: 50px; vertical-align: middle;">
                <?=Yii::t('tickets/ipheb16', 'Организаторы')?>:
            </td>
            <td style="padding: 0 5px;">
                <img src="/img/ticket/ipheb16/partner1.jpg" style="height: 50px; padding-right: 3mm; image-resolution: 110dpi;"/>
            </td>
            <td style="padding: 0 5px;">
                <img src="/img/ticket/ipheb16/partner2.jpg" style="height: 50px; padding-right: 3mm; image-resolution: 110dpi;"/>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div style="background: url('/img/ticket/pdf/base/cutting-line.png') center center; height: 1mm; background-image-resolution: 100dpi; margin: 5mm 0;"></div>
<div style="text-align: center; margin: 0 5mm; overflow: hidden;">
    <table style="width: 100%; font-size: 4mm; font-weight: 100; vertical-align: top; margin: 0; color: #595f5d; padding: 0 0 0 6mm;">
        <tbody>
        <?if(Yii::app()->language === 'en'):?>
            <tr>
                <td align="center">
                    <span>Navigation map:</span>
                </td>
            </tr>
        <?endif?>
        <tr>
            <td align="center">
                <img src="/img/ticket/ipheb16/map.jpg" style="height: 310px; padding-right: 3mm; image-resolution: 110dpi;"/>
            </td>

            <?if(Yii::app()->language === 'ru'):?>
                <td style="color: #09918d;">
                    <b style="color: #595f5d;">Схема проезда до местра проведения:</b><br/>

                    <ul>
                        <li>
                            <span style="color: #595f5d;">
                                На автомобиле:<br/>
                                адрес для навигатора:<br/>
                                Главный вход - Москва, проспект Мира, 121<br/>
                                Въезд на территорию платный (по правилам ОАО "ВДНХ")
                            </span>
                        </li>
                        <br/><br/>
                        <li>
                            <span style="color: #595f5d;">
                                Общественным транспортом:<br/>
                                Станция метро "ВДНХ"
                            </span>
                        </li>
                    </ul>
                </td>
            <?endif?>
        </tr>
        </tbody>
    </table>
</div>