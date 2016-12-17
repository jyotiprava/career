<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\IndustrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Industries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-flat">
    <div class="panel-body">
<div class="industry-index">
<legend class="text-bold"><?= Html::encode($this->title) ?></legend>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Industry', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'IndustryId',
            'IndustryName',
           // 'IsDelete',
           // 'OnDate',
           // 'UpdatedDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
    </div>
</div>