<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\JobCategory */

$this->title = 'Create Job Category';
$this->params['breadcrumbs'][] = ['label' => 'Job Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-flat">
    <div class="panel-body">
<div class="job-category-create">
<legend class="text-bold"><?= Html::encode($this->title) ?></legend>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </div>
</div>