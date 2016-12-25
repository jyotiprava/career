<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Feedback';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-flat">
<div class="panel-body">
<div class="position-index">
<legend class="text-bold">All Feedback</legend>
   <table class="table table-striped table-bordered">
			<thead>
				<tr>
				   <th><a href="#">#</a></th>
				   <th><a href="#">Date</a></th>
				   <th><a href="#">Name</a></th>
				   <th><a href="#">Email</a></th>
				   <th><a href="#">CompanyName</a></th>
				   <th><a href="#">Message</a></th>
				   <th><a href="#">Action</a></th>
				</tr>
			</thead>
			<tbody>
 
<?php $i=0; foreach($allfeedback as $value){ $i++; ?>
				<tr>
				<td><?=$i;?></td>
			       <td> <?=date("d-m-Y",strtotime($value->OnDate));?></td>
                    <td> <?=$value->Name;?></td>
                    <td><?=$value->Email;?></td>
                    <td><?=$value->Companyname;?></td>
                    <td><?=$value->Message;?></td>
			       <td>
                    <?php
                    if($value->IsApprove==0)
                    {
                    ?>
                    <a href="<?=Url::to(['footer/approvefeedback','id'=>$value->FeedbackId]);?>" title="Approve" aria-label="Approve">
                    <span>Approve</span></a>
                    <?php
                    }
                    else
                    {
                    ?>
                    <a href="<?=Url::to(['footer/disapprovefeedback','id'=>$value->FeedbackId]);?>" title="Disapprove" aria-label="Disapprove">
                    <span>Disapprove</span></a>
                    <?php
                    }
                    ?>
                   </td>
				</tr>
<?php } ?>
   

			</tbody>
			</table> 
</div>
</div>
</div>
