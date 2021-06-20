<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Measures */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="measures-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sist')->textInput() ?>

    <?= $form->field($model, 'diast')->textInput() ?>

    <?= $form->field($model, 'pulse')->textInput() ?>

    <?= $form->field($model, 'measure_date')->textInput() ?>

    <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patient_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
