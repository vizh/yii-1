<?php

namespace partner\models\forms\paperless;

use application\components\form\CreateUpdateForm;
use application\helpers\Flash;
use application\models\paperless\Device as DeviceModel;
use event\models\Event;

class Device extends CreateUpdateForm
{
    public $Id;
    public $DeviceNumber;
    public $Name;
    public $Type;
    public $Comment;
    public $Active;

    /** @var Event */
    protected $event;

    /**
     * @param Event $event
     * @param DeviceModel $model
     */
    public function __construct(Event $event, DeviceModel $model)
    {
        $this->event = $event;
        parent::__construct($model);
    }

    public function attributeLabels()
    {
        return $this->model->attributeLabels();
    }

    public function rules()
    {
        return [
            ['DeviceNumber,Name,Type,Active', 'required'],
            ['DeviceNumber,Name,Type,Active', 'required'],
            ['Comment', 'safe'],
            ['Active', 'boolean']
        ];
    }

    /**
     * @return DeviceModel|null
     */
    public function createActiveRecord()
    {
        $this->model->EventId = $this->event->Id;
        return $this->updateActiveRecord();
    }

    /**
     * @return DeviceModel|null
     */
    public function updateActiveRecord()
    {
        if (!$this->validate()) {
            return null;
        }

        try {
            $this->fillActiveRecord();
            $this->model->save();

            return $this->model;
        } catch (\CDbException $e) {
            Flash::setError($e);
        }
        return null;
    }
}