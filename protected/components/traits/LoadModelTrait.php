<?php
namespace application\components\traits;
use application\components\Exception;

trait LoadModelTrait
{
    /**
     * Загружает модель
     * @param string $class Имя класса модели
     * @param mixed $key Уникальный ключ для поиска: ID записи
     * @return \CActiveRecord
     * @throws Exception
     * @throws \CHttpException
     */
    public function loadModel($class, $key)
    {
        /** @var ActiveRecord $class */
        if (method_exists($class, 'model')) {
            $model = $class::model()->findByPk($key);
            if (empty($model)) {
                throw new \CHttpException(404);
            }
            return $model;
        }
        throw new Exception("Переданный класс не является экземпляром CActiveRecord");
    }
}