<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = Yii::t('app', 'CARDIO')

?>
<div class="site-index">
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>1502</h3>
                        <p>Всего пациентов под наблюдением</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href=<?= Url::toRoute(['patient/index']) ?> class="small-box-footer">Посмотреть пациентов <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>345</h3>
                        <p>Пациентов с превышением нормы</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href=<?= Url::toRoute(['patient/outnorma']) ?> class="small-box-footer">Посмотреть пациентов <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>56</h3>
                        <p>Пациентов с гипертензией 2+ ст.</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href=<?= Url::toRoute(['patient/hyper2']) ?> class="small-box-footer">Посмотреть пациентов <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>23</h3>
                        <p>Новых сообщений от пациентов</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href=# class="small-box-footer">Посмотреть сообщения<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>