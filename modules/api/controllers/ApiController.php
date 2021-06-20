<?php


namespace app\modules\api\controllers;

use app\models\domain;
use yii\rest\ActiveController;

class ApiController extends ActiveController
{
    public $modelClass = domain\Measure::class;
}