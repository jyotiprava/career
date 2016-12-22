<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Contacts';
$this->params['breadcrumbs'][] = $this->title;
//var_dump($contactdetail);
?>
<style>
				#contacct_details_main  .media-heading {color:#f16b22; font-size: 16px;}
				#contacct_details_main .contact-details>ul{clear:both; overflow:hidden}
				#contacct_details_main .list-extended>li, .list-extended>li .list>li {font-size: 11.5px; margin-top: 0;width: 20%;float: left;}
				#contacct_details_main .list-extended>li.place  { width: 16%;}
				#contacct_details_main .list-extended>li.contact_num  { width: 18%;}
				#contacct_details_main .list-extended>li.name  { width: 18%;}
				#contacct_details_main .list-extended>li.cate  { width: 5%;}
				#contacct_details_main .list-extended>li.expert  { width: 22%;}
				#contacct_details_main .collapse {display: block}
				#contacct_details_main .contact-details {  padding: 5px 15px 5px 15px;}
				#contacct_details_main .btn{padding: 4px 11px; margin: 0 0 0 8px}
			  </style>
<!-- Collapsible lists -->
				<div class="row">
					<div class="col-md-12" id="contacct_details_main">

						<!-- Collapsible list -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">
                                                                    Contact Details
								<div class="heading-elements">
									
			                	</div>
							</div>
							<ul class="media-list media-list-linked">
							     
								<li class="media"> 
									<div class="collapse" id="james">
										<div class="contact-details">
                                                                                    <ul style="background-color: #ccc;font-weight: bold;height: 50px;padding: 10px;" class="list-extended list-unstyled list-icons">                                                                                         
                                                                                        
                                                                                                    <li class="name">Date </li>
                                                                                                    <li class="name">Name</li> 
                                                                                                    <li class="name">Contact No.</li>
                                                                                                    <li class="name">Email</li>
                                                                                                    <li class="name">Message</li>
                                                                                                    
                                                                                    </ul>
                                                                                    <ul style="padding: 10px;" class="list-extended list-unstyled list-icons">                                                                                         
                                                                                                
											   <?php foreach($contactdetail as $value){?>
                                                                                                <li class="name">  <?=date("d-m-Y",strtotime($value->OnDate));?></li>
                                                                                                <li class="name">  <?=$value->Name;?></li>
												<li class="name"> +91  <?=$value->ContactNumber;?></li>
												<li class="name"><?=$value->Email;?></li>
												<li class="name"><?=$value->Message;?></li>
											<?php } ?>
											</ul>
										</div>
									</div>
								</li>
							      
							</ul>
						 
						</div>
						<!-- /collapsible list -->

						
						
						
						
					</div>

					 
				</div>
				<!-- /collapsible lists -->

