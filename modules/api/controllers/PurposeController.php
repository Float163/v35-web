<?php


namespace app\modules\api\controllers;

use app\models\domain\Purpose;
use yii\rest\ActiveController;

class PurposeController extends ActiveController
{
    public $modelClass = Purpose::class;
}