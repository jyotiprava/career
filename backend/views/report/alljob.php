<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-flat">
<div class="panel-body">
<div class="position-index">
<legend class="text-bold"> Contact Details</legend>
   <table class="table table-striped table-bordered">
			<thead>
				<tr>
				   <th><a href="#">#</a></th>
				   <th><a href="#">Date</a></th>
				   <th><a href="#">Name</a></th>
				   <th><a href="#">Contact No.</a></th>
				   <th><a href="#">Email</a></th>
				   <th><a href="#">Message</a></th>
				   <th><a href="#">Type</a></th>
				</tr>
			</thead>
			<tbody>
 
<?php $i=0; foreach($contactdetail as $value){ $i++; ?>
				<tr>
				<td><?=$i;?></td>
			       <td> <?=date("d-m-Y",strtotime($value->OnDate));?></td>
				<td> <?=$value->Name;?></td>
                               <td> +91  <?=$value->ContactNumber;?></td>
                               <td><?=$value->Email;?></td>
                               <td><?=$value->Message;?></td>
			       <td><?=$value->Message;?></td>
				</tr>
<?php } ?>
   

			</tbody>
			</table> 
</div>
</div>
</div>
