<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Company Profile';
$this->params['breadcrumbs'][] = $this->title;
$home=str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl());
?>
<!-- Square thumbs -->
				<h6 class="content-group text-semibold">
					Company Profile List 
				</h6> 
  
				<div class="row">
			   <?php
			   foreach($dataProvider as $key=>$value)
			   {
			   ?>
					<div class="col-lg-3 col-md-6">
						<div class="thumbnail">
						  <div class="media-right media-middle position_right_main">
									<ul class="icons-list icons-list-vertical">
				                    	<li class="dropdown">
					                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
					                    	<ul class="dropdown-menu dropdown-menu-right"> 
												<li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
												<li class="divider"></li>
												<li><a href="#"><i class="icon-statistics pull-right"></i> Statistics</a></li>
											</ul>
				                    	</li>
			                    	</ul>
								</div>
								<div class="clearfix"></div>
							<div class="thumb thumb-rounded">
								<img src="<?=$home.'/'.$value->logo->Doc;?>" alt=""> 
							</div>
						
					    	<div class="caption text-center">
					    		<h6 class="text-semibold no-margin"><?=$value->industry->IndustryName;?> 
								<small class="display-block"> <?=$value->Name;?>  </small> 
								<small class="display-block"> Contact: +91 <?=$value->MobileNo;?>  </small> </h6> 
					    	</div>
				    	</div>
					</div>
			   <?php
			   }
			   ?>
			   </div>
			<!-- /main content -->
