<?php


namespace app\models\domain;

use app\models\directories\Diagnose;
use yii\db\ActiveRecord;

class Patient extends ActiveRecord
{
    public static function tableName()
    {
        return 'patients';
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'surname' => 'Фамилия',
            'birthdate' => 'Д.Р.',
        ];
    }

    public function getDiagnoses()
    {
        return $this->hasMany(Diagnose::class, ['patient_id' => 'id']);
    }

    public function getMeasures()
    {
        return $this->hasMany(Measure::class, ['patient_id' => 'id']);
    }

    public function getLastMeasures()
    {
        return $this->hasMany(Measure::class, ['patient_id' => 'id'])->orderBy('measure_date DESC')->asArray();
    }


    public function getPurposes()
    {
        return $this->hasOne(Purpose::class, ['patient_id' => 'id']);
    }
}