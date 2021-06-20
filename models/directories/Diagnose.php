<?php


namespace app\models\directories;

use yii\db\ActiveRecord;
use app\models\domain\Diagnose as DiagnoseInstances;

class Diagnose extends ActiveRecord
{
    public static function tableName()
    {
        return 'directory_diagnoses';
    }

    public function getDiagnoses()
    {
        return $this->hasMany(DiagnoseInstances::class, ['id' => 'diagnose_id']);
    }
}