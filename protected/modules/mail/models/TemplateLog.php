<?php
namespace mail\models;

use application\components\db\MongoLogDocument;

/**
 * @property int $Id
 * @property int $UserId
 * @property int $TemplateId
 * @property string $Error
 */
class TemplateLog extends MongoLogDocument implements \mail\components\ILog
{
    /**
     * @param string $className
     * @return TemplateLog
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function collectionName()
    {
        return 'MailTemplateLog';
    }

    /**
     * @param int $id
     * @return $this
     */
    public function byTemplateId($id)
    {
        $this->mergeDbCriteria(['condition' => ['TemplateId' => $id]]);
        return $this;
    }

    /**
     * @param bool|true $has
     * @return $this
     */
    public function byHasError($has = true)
    {
        $condition = !$has ? ['$or' => [['Error' => null], ['Error' => $has]]] : ['Error' => $has];
        $this->mergeDbCriteria(['condition' => $condition]);
        return $this;
    }

    /**
     * @param string $error
     */
    public function setError($error)
    {
        $this->Error = $error;
    }
}
