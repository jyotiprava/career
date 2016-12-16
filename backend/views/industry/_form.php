<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Industry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="industry-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IndustryName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IsDelete')->textInput() ?>

    <?= $form->field($model, 'OnDate')->textInput() ?>

    <?= $form->field($model, 'UpdatedDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
