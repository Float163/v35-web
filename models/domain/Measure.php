<?php


namespace app\models\domain;

use yii\db\ActiveRecord;

class Measure extends ActiveRecord
{
    public static function tableName()
    {
        return 'measures';
    }

    public function attributeLabels()
    {
        return [
            'sist' => 'SYS',
            'diast' => 'DIA',
            'pulse' => 'Пульс',
            'measure_date' => 'Дата',
            'action' => 'Нагрузка',
            'comment' => 'Комментарий',
        ];
    }

    public function getAttributes($names = null, $except = [])
    {
        return [
            'id',
            'sist',
            'diast',
            'pulse',
            'measure_date',
            'action',
            'comment',
            'patient_id',
        ];
    }

    public function getPatient()
    {
        return $this->hasOne(Patient::class, ['id' => 'patient_id']);
    }
}