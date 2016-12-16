<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Skill */

$this->title = 'Update Skill: ' . $model->SkillId;
$this->params['breadcrumbs'][] = ['label' => 'Skills', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SkillId, 'url' => ['view', 'id' => $model->SkillId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="skill-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
