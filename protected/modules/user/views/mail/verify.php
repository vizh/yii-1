<?php
/**
 * @var User $user
 */
use user\models\User;
?>
<h2><?=$user->getShortName();?>, здравствуйте!</h2>

<p>Вы создали аккаунт в RUNET—ID, единой системе регистрации на ИТ-мероприятия Рунета.</p>
<p>Это не социальная сеть. Это сервис, позволяющий быстро и удобно регистрироваться на большую часть проводимых в России форумов, конференций, семинаров, вебинаров и тренингов связанных с интернет, телеком и медиа.</p>
<p>Для того, что бы мы могли отправлять Вам электронные билеты, новости по мероприятиям на которые вы будете регистрироваться и информировать об уникальных событиях, просим подтвердить свой аккаунт.</p>

<div style="text-align: center;">
    <?=\CHtml::link('ПОДТВЕРДИТЬ АККАУНТ', $user->getVerifyUrl(), ['style' => 'font-size: 14px; line-height: 2; color: #FFF; text-decoration: none; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; background: #2F8EDC; margin: 0 10px 0 0; padding: 0; border-color: #2f8edc; border-style: solid; border-width: 10px 40px;']);?>
</div>

<p>Также обращаем внимание, что наша компания зарегистрирована в качестве оператора персональных данных. Вы можете нам доверять, как и другие <strong><?=User::getTotalCount();?></strong> уже зарегистрированных в системе участников.</p>