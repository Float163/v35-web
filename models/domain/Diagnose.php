<?php


namespace app\models\domain;

use yii\db\ActiveRecord;
use app\models\directories\Diagnose as DirDiagnose;

class Diagnose extends ActiveRecord
{
    public static function tableName()
    {
        return 'diagnoses';
    }

    public function getDiagnose()
    {
        return $this->hasOne(DirDiagnose::class, ['id' => 'diagnose_id']);
    }

    public function getPatient()
    {
        return $this->hasOne(Patient::class, ['id' => 'patient_id']);
    }
}