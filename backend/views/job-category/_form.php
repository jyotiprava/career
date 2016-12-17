<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JobCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
		<label class="control-label col-lg-2">Category Name</label>
		<div class="col-lg-10">
            <?= $form->field($model, 'CategoryName')->textInput(['maxlength' => true])->label(false) ?>
		</div>
	</div>
    
    <div class="form-group">
        <label class="control-label col-lg-2">&nbsp;</label>
        <div class="col-lg-10">
        <?= Html::submitButton($model->isNewRecord ? 'Create <i class="icon-arrow-right14 position-right"></i>' : 'Update <i class="icon-arrow-right14 position-right"></i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
