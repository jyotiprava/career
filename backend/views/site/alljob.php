<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Opening';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-flat">
<div class="panel-body">
<div class="position-index">
<legend class="text-bold"> Total Job Opening</legend>
   <table class="table table-striped table-bordered" style="width: 100%;">
			<thead>
				<tr>
				   <th><a href="#">#</a></th>
				   <th><a href="#">Date</a></th>
				   <th><a href="#">Job Title</a></th>
				   <th><a href="#">Company Name</a></th>
				   <th><a href="#">Email</a></th>
				   <th><a href="#">Ph No.</a></th>
				   <th><a href="#">Location</a></th>
				   <th><a href="#">Action</a></th>
				</tr>
			</thead>
			<tbody>
 
<?php $i=0; if($model){ foreach($model as $value){ $i++; ?>
			<tr>
			       <td><?=$i;?></td>
			       <td> <?=date("d-m-Y",strtotime($value->OnDate));?></td>
			       <td> <?=$value->JobTitle;?></td>
                               <td>  <?=$value->CompanyName;?></td>
                               <td><?=$value->Email;?></td>
                               <td><?=$value->Phone;?></td>
			       <td><?=$value->Location;?></td>
			       <td>
				<span class="glyphicon glyphicon-eye-open"></span>
				<a href="/career/backend/web/index.php?r=site%2Fdeletejob&amp;id=<?=$value->JobId;?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this job?" data-method="post" data-pjax="0">
				<span class="glyphicon glyphicon-trash"></span></a>
				</span>
				</a>
			       </td>
			</tr>
<?php }}else{ ?>
			<tr>
				<td colspan="9">No Results Found.</td>
			</tr>
   
<?php } ?>
			</tbody>
			</table> 
</div>
</div>
</div>
