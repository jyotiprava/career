<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = 'Update Course: ' . $model->CourseId;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CourseId, 'url' => ['view', 'id' => $model->CourseId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="panel panel-flat">
    <div class="panel-body">
<div class="course-update">
<legend class="text-bold"><?= Html::encode($this->title) ?></legend>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </div>
</div>