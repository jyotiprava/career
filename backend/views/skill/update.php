<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Skill */

$this->title = 'Update Skill: ' . $model->SkillId;
$this->params['breadcrumbs'][] = ['label' => 'Skills', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SkillId, 'url' => ['view', 'id' => $model->SkillId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="panel panel-flat">
    <div class="panel-body">
<div class="skill-update">
 <legend class="text-bold"><?= Html::encode($this->title) ?></legend>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </div>
</div>