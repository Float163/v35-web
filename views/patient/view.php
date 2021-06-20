<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */
/* @var $model app\models\domain\Patient */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="patient-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'surname',
            'patronymic',
            'birthdate',
            [ 'label' => 'Терапия', 'attribute' =>'purposes.drug.name']
        ],
    ]) ?>

    <div class="nav-tabs-custom">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="active">
                <a href="#out_norma" data-toggle="tab" aria-expanded="true">Вне нормы</a>
            </li>
            <li >
                <a href="#2week" data-toggle="tab" aria-expanded="false">Две недели</a>
            </li>
            <li >
                <a href="#all" data-toggle="tab" aria-expanded="false">Все данные</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane active" id="out_norma">
                <div class="panel panel-success">
                    <div class="panel-heading text-center">
                        <b>Измерения</b>
                    </div>
                    <div class="panel-body">
                        <?= GridView::widget([
                            'dataProvider' => $mea_out,
                            'summary'=>'',
                            'columns' => [
                                ['attribute' => 'sist',
                                    'contentOptions' => function ($model, $key, $index, $column) {
                                        if ($model->sist > 139) {
                                            return ['class' => 'bg-warning'];
                                        }
                                        return ['class' => 'bg-info'];
                                    },],
                                ['attribute' => 'diast',
                                    'contentOptions' => function ($model, $key, $index, $column) {
                                        if ($model->diast > 89) {
                                            return ['class' => 'bg-warning'];
                                        }
                                        return ['class' => 'bg-info'];
                                    },],
                                'pulse',
                                'measure_date',
                                'action',
                                'comment',
                            ],
                        ]);

                        $mea_arr = ArrayHelper::toArray($mea_out->getModels(),['app\models\domain\measure' => ['measure_date','sist', 'diast']]);

                        for ($i = 0; $i<count($mea_arr); $i++) {
                            $Xa[] = null;
                            $Ya[] = null;
                            $Ya1 [] = null;
                        }

                        for ($i = 0; $i<count($mea_arr); $i++) {
                            $Xa[$i] = $mea_arr[$i]['measure_date'];
                            $Ya[$i] = (int)$mea_arr[$i]['sist'];
                            $Ya1[$i] = (int)$mea_arr[$i]['diast'];
                        }

                        echo Highcharts::widget([
                            'options' => [
                                'title' => ['text' => ''],
                                'chart' => ['height' => '240'],
                                'xAxis' => [
                                    'categories' => $Xa
                                ],
                                'yAxis' => [
                                    'plotLines' => [[
                                        'value' => '90',
                                        'color' => 'orange',
                                        'width' => '2',],
                                        [
                                            'value' => '130',
                                            'color' => 'orange',
                                            'width' => '2',],
                                    ],

                                    'title' => ['text' => 'Давление']
                                ],
                                'series' => [
                                    ['name' => 'SYS', 'data' => $Ya ],
                                    ['name' => 'DIA', 'data' => $Ya1 ],
                                ]
                            ]
                        ]);

                        ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="2week" >
                <div class="panel panel-success">
                    <div class="panel-heading text-center">
                        <b>Измерения</b>
                    </div>
                    <div class="panel-body">
                        <?= GridView::widget([
                            'dataProvider' => $mea_2week,
                            'summary'=>'',
                            'columns' => [
                                ['attribute' => 'sist',
                                    'contentOptions' => function ($model, $key, $index, $column) {
                                        if ($model->sist > 139) {
                                            return ['class' => 'bg-warning'];
                                        }
                                        return ['class' => 'bg-info'];
                                       },],
                                ['attribute' => 'diast',
                                    'contentOptions' => function ($model, $key, $index, $column) {
                                        if ($model->diast > 89) {
                                            return ['class' => 'bg-warning'];
                                        }
                                        return ['class' => 'bg-info'];
                                    },],
                                'pulse',
                                'measure_date',
                                'action',
                                'comment',
                            ],
                        ]);

                        $mea_arr = ArrayHelper::toArray($mea_2week->getModels(),['app\models\domain\measure' => ['measure_date','sist', 'diast']]);

                        for ($i = 0; $i<count($mea_arr); $i++) {
                            $aXa[] = null;
                            $aYa[] = null;
                            $aYa1 [] = null;
                        }

                        for ($i = 0; $i<count($mea_arr); $i++) {
                            $aXa[$i] = $mea_arr[$i]['measure_date'];
                            $aYa[$i] = (int)$mea_arr[$i]['sist'];
                            $aYa1[$i] = (int)$mea_arr[$i]['diast'];
                        }

                        echo Highcharts::widget([
                            'options' => [
                                'title' => ['text' => ''],
                                'chart' => ['height' => '240'],
                                'xAxis' => [
                                    'categories' => $aXa
                                ],
                                'yAxis' => [
                                    'plotLines' => [[
                                        'value' => '90',
                                        'color' => 'orange',
                                        'width' => '2',],
                                        [
                                            'value' => '130',
                                            'color' => 'orange',
                                            'width' => '2',],
                                    ],

                                    'title' => ['text' => 'Давление']
                                ],
                                'series' => [
                                    ['name' => 'SYS', 'data' => $aYa ],
                                    ['name' => 'DIA', 'data' => $aYa1 ],
                                ]
                            ]
                        ]);

                        ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="all">
                <div class="panel panel-success">
                    <div class="panel-heading text-center">
                        <b>Измерения</b>
                    </div>
                    <div class="panel-body">
                        <?= GridView::widget([
                            'dataProvider' => $mea,
                            'summary'=>'',
                            'columns' => [
                                ['attribute' => 'sist',
                                    'contentOptions' => function ($model, $key, $index, $column) {
                                        if ($model->sist > 139) {
                                            return ['class' => 'bg-warning'];
                                        }
                                        return ['class' => 'bg-info'];
                                    },],
                                ['attribute' => 'diast',
                                    'contentOptions' => function ($model, $key, $index, $column) {
                                        if ($model->diast > 89) {
                                            return ['class' => 'bg-warning'];
                                        }
                                        return ['class' => 'bg-info'];
                                    },],
                                'pulse',
                                'measure_date',
                                'action',
                                'comment',
                            ],
                        ]);

                        $mea_arr = ArrayHelper::toArray($mea->getModels(),['app\models\domain\measure' => ['measure_date','sist', 'diast']]);

                        for ($i = 0; $i<count($mea_arr); $i++) {
                            $bXa[] = null;
                            $bYa[] = null;
                            $bYa1 [] = null;
                        }

                        for ($i = 0; $i<count($mea_arr); $i++) {
                            $bXa[$i] = $mea_arr[$i]['measure_date'];
                            $bYa[$i] = (int)$mea_arr[$i]['sist'];
                            $bYa1[$i] = (int)$mea_arr[$i]['diast'];
                        }

                        echo Highcharts::widget([
                            'options' => [
                                'title' => ['text' => ''],
                                'chart' => ['height' => '240'],
                                'xAxis' => [
                                    'categories' => $bXa
                                ],
                                'yAxis' => [
                                    'plotLines' => [[
                                            'value' => '90',
                                            'color' => 'orange',
                                            'width' => '2',],
                                        [
                                            'value' => '130',
                                            'color' => 'orange',
                                            'width' => '2',],
                                    ],
                                    'title' => ['text' => 'Давление']
                                ],
                                'series' => [
                                    ['name' => 'SYS', 'data' => $bYa ],
                                    ['name' => 'DIA', 'data' => $bYa1 ],
                                ]
                            ]
                        ]);

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
