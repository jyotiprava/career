<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SkillSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="skill-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SkillId') ?>

    <?= $form->field($model, 'Skill') ?>

    <?= $form->field($model, 'IsDelete') ?>

    <?= $form->field($model, 'OnDate') ?>

    <?= $form->field($model, 'UpdatedDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
