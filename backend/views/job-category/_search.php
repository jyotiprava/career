<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JobCategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'JobCategoryId') ?>

    <?= $form->field($model, 'CategoryName') ?>

    <?= $form->field($model, 'IsDelete') ?>

    <?= $form->field($model, 'OnDate') ?>

    <?= $form->field($model, 'UpdatedDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
