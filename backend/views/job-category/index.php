<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JobCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-flat">
    <div class="panel-body">
<div class="job-category-index">
<legend class="text-bold"><?= Html::encode($this->title) ?></legend>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Job Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'JobCategoryId',
            'CategoryName',
            //'IsDelete',
            //'OnDate',
            //'UpdatedDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
    </div>
    </div>