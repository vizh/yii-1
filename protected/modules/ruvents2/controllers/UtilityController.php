<?php
namespace ruvents2\controllers;

use ruvents2\components\Controller;

class UtilityController extends Controller
{
    /**
     * @link GET:/utility/ping
     */
    public function actionPing()
    {
        $this->renderJson([
            'DateSignal' => date('Y-m-d H:i:s')
        ]);
    }
}