<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Purposes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purposes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Purposes'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'patient_id',
            'doctor_id',
            'drug_id',
            'period',
            //'signa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
