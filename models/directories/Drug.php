<?php


namespace app\models\directories;

use app\models\domain\Purpose;
use yii\db\ActiveRecord;

class Drug extends ActiveRecord
{
    public static function tableName()
    {
        return 'directory_drugs';
    }

    public function getPurposes()
    {
        return $this->hasMany(Purpose::class, ['drug_id' => 'id']);
    }
}