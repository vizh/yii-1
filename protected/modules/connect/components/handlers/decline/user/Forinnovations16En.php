<?php

namespace connect\components\handlers\decline\user;

use connect\models\Meeting;
use mail\components\MailLayout;
use user\models\User;

class Forinnovations16En extends Forinnovations16
{
    /**
     * @inheritdoc
     */
    public function getSubject()
    {
        return 'You have cancelled a business meeting with '.$this->meeting->Creator->getFullName();
    }

    public function getViewName()
    {
        return $this->getViewPath().'.forinnovations16-en';
    }

    /**
     * @inheritdoc
     */
    public function getLayoutName()
    {
        return 'oi16-en';
    }
}