<?php


namespace app\models\domain;

use app\models\directories\Drug;
use yii\db\ActiveRecord;

class Purpose extends ActiveRecord
{
    public static function tableName()
    {
        return 'purposes';
    }

    public function getPatient()
    {
        return $this->hasOne(Patient::class, ['id' => 'patient_id']);
    }

    public function getDrug()
    {
        return $this->hasOne(Drug::class, ['id' => 'drug_id']);
    }

    public function getDoctor()
    {
        return $this->hasOne(Doctor::class, ['id' => 'doctor_id']);
    }
}