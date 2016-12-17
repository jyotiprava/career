<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Position */

$this->title = 'Create Position';
$this->params['breadcrumbs'][] = ['label' => 'Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-flat">
    <div class="panel-body">
<div class="position-create">
<legend class="text-bold"><?= Html::encode($this->title) ?></legend>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </div>
</div>