<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Candidates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-flat">
    <div class="panel-body">
<div class="course-index">

    <legend class="text-bold"><?= Html::encode($this->title) ?></legend>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'Name',
            'Email',
            'MobileNo',
            'Address',
            'City',
            'State',
            [ 'attribute'=>'Action',
             'content' => function ($data) {
                return  Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['candidatedetailview', 'userid' => $data->UserId]);
             }
             ],
        ],
    ]); ?>
</div>
    </div>
</div>