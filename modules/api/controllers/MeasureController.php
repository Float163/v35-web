<?php


namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use app\models\domain\Measure;
use yii\web\Request;

class MeasureController extends ActiveController
{
    public $modelClass = Measure::class;

    public function actionAdd()
    {
        $p = $this->request->getBodyParams();
        $m = new Measure();
        $m['sist'] = $p['sist'];
        $m['diast'] = $p['diast'];
        $m['pulse'] = $p['pulse'];
        $m['measure_date'] = $p['measure_date'];
        $m['action'] = $p['action'];
        $m['comment'] = $p['comment'];
        $m['patient_id'] = $p['patient_id'];
        $m->save();

        return "OK";
    }
}