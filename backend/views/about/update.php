<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\About */

$this->title = 'Update About: ' . $model->AboutId;
$this->params['breadcrumbs'][] = ['label' => 'Abouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->AboutId, 'url' => ['view', 'id' => $model->AboutId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="about-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
