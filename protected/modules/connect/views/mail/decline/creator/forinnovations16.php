<?php
/**
 * @var \connect\models\Meeting $meeting
 * @var \user\models\User $user
 * @var string $response
 */
?>
<h2>Здравствуйте!</h2>
<p>
    К сожалению, <?= $user->getFullName(); ?> (<?= $user->getEmploymentPrimary()->Company->FullName; ?>) не имеет возможности
    принять Ваше приглашение на <?= $meeting->Date; ?> в рамках форума «Открытые инновации 2016».
</p>
<p>Причина: <?= $response; ?>.</p>