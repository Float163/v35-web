<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Measures');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="measures-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
                'id',
            'patient.name',
            'patient.surname',
            'sist',
            'diast',
            'pulse',
            'measure_date',
            'action',
            'comment',
            //'patient_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
