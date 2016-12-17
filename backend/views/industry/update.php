<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Industry */

$this->title = 'Update Industry: ' . $model->IndustryId;
$this->params['breadcrumbs'][] = ['label' => 'Industries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IndustryId, 'url' => ['view', 'id' => $model->IndustryId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="panel panel-flat">
    <div class="panel-body">
<div class="industry-update">
<legend class="text-bold"><?= Html::encode($this->title) ?></legend>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </div>
</div>