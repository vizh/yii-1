<?php

namespace paperless\models;

use application\components\ActiveRecord;

/**
 * @property int $Id
 * @property int $EventId
 * @property bool $Active
 * @property string $Subject
 * @property string $Text
 * @property string $File
 * @property bool $SendOnce
 * @property bool $ConditionLike
 * @property string $ConditionLikeString
 * @property bool $ConditionNotLike
 * @property bool $ConditionNotLikeString
 *
 * @property \event\models\Event $Event
 * @property EventLinkDevice[] $DeviceLinks
 * @property EventLinkRole[] $RoleLinks
 *
 * Описание вспомогательных методов
 * @method Event   with($condition = '')
 * @method Event   find($condition = '', $params = [])
 * @method Event   findByPk($pk, $condition = '', $params = [])
 * @method Event   findByAttributes($attributes, $condition = '', $params = [])
 * @method Event[] findAll($condition = '', $params = [])
 * @method Event[] findAllByAttributes($attributes, $condition = '', $params = [])
 *
 * @method Event byId(int $id, bool $useAnd = true)
 * @method Event byEventId(int $id, bool $useAnd = true)
 * @method Event bySubject(string $subject, bool $useAnd = true)
 * @method Event bySendOnce(bool $once, bool $useAnd = true)
 * @method Event byConditionLike(bool $like, bool $useAnd = true)
 * @method Event byConditionNotLike(bool $notLike, bool $useAnd = true)
 * @method Event byActive(bool $active, bool $useAnd = true)
 */
class Event extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function tableName()
    {
        return 'PaperlessEvent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['EventId, Subject, Text', 'required'],
            ['SendOnce, ConditionLike, ConditionNotLike, Active', 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Subject' => 'Тема письма',
            'Text' => 'Содержание письма',
            'File' => 'Файл',
            'SendOnce' => 'Отправлять письмо участнику только один раз',
            'ConditionLike' => 'Отправлять только для перечисленных RunetId (через запятую)',
            'ConditionLikeString' => '',
            'ConditionNotLike' => 'Игнорировать перечисленные RunetId (через запятую)',
            'ConditionNotLikeString' => '',
            'Active' => 'Событие активно',
            'activeLabel' => 'Событие активно',
            'Devices' => 'Устройства',
            'Roles' => 'Статусы',
        ];
    }

    /**
     * @inheritdoc
     */
    public function relations()
    {
        return [
            'Event' => [self::BELONGS_TO, \event\models\Event::className(), ['EventId']],
            'DeviceLinks' => [self::HAS_MANY, EventLinkDevice::className(), ['EventId']],
            'RoleLinks' => [self::HAS_MANY, EventLinkRole::className(), ['EventId']],
        ];
    }

    /**
     * Текстовое представление флага активности
     * @return string
     */
    public function getActiveLabel()
    {
        return $this->Active ? 'Активен' : 'Неактивен';
    }

    /**
     * Путь для сохранения файлов
     * @return string
     */
    public function getFilePath()
    {
        return \Yii::getPathOfAlias('webroot.paperless.event');
    }
}