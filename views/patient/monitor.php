<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', $text);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}',
        'itemView' =>  function ($model, $key, $index, $widget)  {
            return $this->render('_list',['model' => $model, 'key' =>$key, ]);}
    ]);
    ?>
</div>
