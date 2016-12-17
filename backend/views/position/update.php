<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Position */

$this->title = 'Update Position: ' . $model->PositionId;
$this->params['breadcrumbs'][] = ['label' => 'Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PositionId, 'url' => ['view', 'id' => $model->PositionId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="panel panel-flat">
    <div class="panel-body">
<div class="position-update">
<legend class="text-bold"><?= Html::encode($this->title) ?></legend>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </div>
</div>