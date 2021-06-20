<?php


namespace app\models\domain;

use yii\db\ActiveRecord;

class Doctor extends ActiveRecord
{
    public static function tableName()
    {
        return 'doctors';
    }

    public function getPurposes()
    {
        return $this->hasMany(Purpose::class, ['doctor_id' => 'id']);
    }
}