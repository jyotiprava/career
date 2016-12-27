<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = 'Social Icon Block';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-flat">
    <div class="panel-body">
<div class="course-create">
    <legend class="text-bold"><?= Html::encode($this->title) ?></legend>

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="form-group">
		<label class="control-label col-lg-2">Twitter Visible</label>
		<div class="col-lg-10">
            <?= $form->field($model, 'IsTwitter')->checkbox(array())->label(false) ?>
		</div>
	</div>
    <div class="form-group">
		<label class="control-label col-lg-2">Twitter Link</label>
		<div class="col-lg-10">
            <?= $form->field($model, 'TwitterLink')->textInput(['maxlength' => true])->label(false) ?>
		</div>
	</div>
    <div class="form-group">
		<label class="control-label col-lg-2">Facebook Visible</label>
		<div class="col-lg-10">
            <?= $form->field($model, 'IsFacebook')->checkbox(array())->label(false) ?>
		</div>
	</div>
    <div class="form-group">
		<label class="control-label col-lg-2">Facebook Link</label>
		<div class="col-lg-10">
            <?= $form->field($model, 'FacebookLink')->textInput(['maxlength' => true])->label(false) ?>
		</div>
	</div>
    <div class="form-group">
		<label class="control-label col-lg-2">Linkedin Visible</label>
		<div class="col-lg-10">
            <?= $form->field($model, 'IsLinkedin')->checkbox(array())->label(false) ?>
		</div>
	</div>
    <div class="form-group">
		<label class="control-label col-lg-2">Linkedin Link</label>
		<div class="col-lg-10">
            <?= $form->field($model, 'LinkedinLink')->textInput(['maxlength' => true])->label(false) ?>
		</div>
	</div>
    <div class="form-group">
		<label class="control-label col-lg-2">Googleplus Visible</label>
		<div class="col-lg-10">
            <?= $form->field($model, 'IsGoogleplus')->checkbox(array())->label(false) ?>
		</div>
	</div>
    <div class="form-group">
		<label class="control-label col-lg-2">Googleplus Link</label>
		<div class="col-lg-10">
            <?= $form->field($model, 'GoogleplusLink')->textInput(['maxlength' => true])->label(false) ?>
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
    </div>
</div>