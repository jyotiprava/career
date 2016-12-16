<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Industry */

$this->title = 'Update Industry: ' . $model->IndustryId;
$this->params['breadcrumbs'][] = ['label' => 'Industries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IndustryId, 'url' => ['view', 'id' => $model->IndustryId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="industry-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
