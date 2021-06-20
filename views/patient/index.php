<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Пациенты');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            'surname',
            'patronymic',
            'birthdate',
            [
                'label' => 'Просмотр',
                'format' => 'raw',
                'value' => function($data){
                    return \yii\helpers\Html::a('Просмотр', Url::toRoute(['patient/view', 'id' => $data->id]), ['class' => 'btn btn-sm btn-success']);
                },
                'options' =>  ['style' => 'width: 104px; max-width: 104px;'],
            ],
        ],
    ]); ?>


</div>
