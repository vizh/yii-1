<?php
namespace application\components\form;

abstract class SearchFormModel extends \CFormModel
{
    public function init()
    {
        parent::init();
        $request = \Yii::app()->getRequest();
        $this->setAttributes($request->getParam(get_class($this)));
    }

    /**
     * @return \CDataProvider
     */
    abstract public function getDataProvider();
} 