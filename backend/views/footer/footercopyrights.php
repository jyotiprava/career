<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = 'Footer Copyrights';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-flat">
    <div class="panel-body">
<div class="course-create">
    <legend class="text-bold"><?= Html::encode($this->title) ?></legend>

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="form-group">
		<label class="control-label col-lg-2">Content</label>
		<div class="col-lg-10">
            <?= $form->field($model, 'Content')->widget(TinyMce::className(), [
									'options' => ['rows' => 6],'class'=>'form-control textarea-small',
									'language' => 'en_CA',
									'clientOptions' => [
										'plugins' => [
											"advlist autolink lists link charmap print preview anchor",
											"searchreplace visualblocks code fullscreen",
											"insertdatetime media table  paste spellchecker"
										],
										'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
									]
								])->label(false);?>
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