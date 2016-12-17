<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JobCategory */

$this->title = 'Update Job Category: ' . $model->JobCategoryId;
$this->params['breadcrumbs'][] = ['label' => 'Job Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->JobCategoryId, 'url' => ['view', 'id' => $model->JobCategoryId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="panel panel-flat">
    <div class="panel-body">
<div class="job-category-update">
<legend class="text-bold"><?= Html::encode($this->title) ?></legend>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </div>
</div>