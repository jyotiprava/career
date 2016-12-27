<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = 'Footer ThirdBlock';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-flat">
    <div class="panel-body">
<div class="course-create">
    <legend class="text-bold"><?= Html::encode($this->title) ?></legend>

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="form-group">
		<label class="control-label col-lg-2">Heading</label>
		<div class="col-lg-10">
            <?= $form->field($model, 'Heading')->textInput(['maxlength' => true])->label(false) ?>
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