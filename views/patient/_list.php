<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
?>
 
<div class="rent-item">
<?php 
        
$form = ActiveForm::begin([
                    'id' => 'm',
                    'action' => ['view', 'id' => $model->id],
    ]);
    $body = 'Пациент <b>'.$model->surname.' '.$model->name.'</b> последние 5 значений измерения давления:<br>';
    $arr = $model->lastMeasures;
    for ($i = 0; $i<count($arr); $i++) {
        $body = $body .' <b>'. $arr[$i]['sist'].'/' .$arr[$i]['diast'].'</b> '.$arr[$i]['measure_date'].'<br>';
    };
    $btnI = Html::a('Пациент', Url::toRoute(['patient/view' ,'id' => $model->id]), ['class'=>'btn btn-success']);
    echo Alert::widget([
            'options' => [
                 'class' => 'alert-warning'
             ],
             'body' => $body.'   '.$btnI,
     ]);

$form = yii\widgets\ActiveForm::end();
?>
    
</div>