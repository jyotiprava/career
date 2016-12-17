<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Industry */

$this->title = 'Create Industry';
$this->params['breadcrumbs'][] = ['label' => 'Industries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-flat">
    <div class="panel-body">
<div class="industry-create">
<legend class="text-bold"><?= Html::encode($this->title) ?></legend>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </div>
</div>
