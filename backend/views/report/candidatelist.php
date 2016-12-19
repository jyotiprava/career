<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Candidates';
$this->params['breadcrumbs'][] = $this->title;
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
													<input type="radio" name="gender2" class="styled">
													 
										 Candidate list <button type="submit" class="btn btn-primary">Download   <i class="icon-arrow-right14 position-right"></i></button></h5>
								<div class="heading-elements">
									<ul class="icons-list">
									
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li> 
									 
										<li>
										<select data-placeholder="Select your country" class="select">
				                                        <option value="USA">100</option> 
				                                        <option value="United Kingdom">  200</option> 
				                                        <option value="..."> 300 </option> 
				                                        <option value="Australia"> 350</option> 
				                                    </select></li>
													
													
				                	</ul>
			                	</div>
							</div>
 
							<ul class="media-list media-list-linked">
							 
								<li class="media"> 
									<div class="collapse" id="james">
										<div class="contact-details">
											<ul class="list-extended list-unstyled list-icons">
											 <li class="cate">  Fre</li>
											    <li class="name"> James Alexander</li>
												<li class="place"><i class="icon-pin position-left"></i> Madrid</li> 
												<li class="contact_num"><i class="icon-phone position-left"></i> +91 8017537619</li>
												<li class="email"><i class="icon-mail5 position-left"></i> <a href="#">jordana@mills.com</a></li>
												<li class="expert"><i class="icon-user-tie position-left"></i> UI/UX expert</li>
											</ul>
										</div>
									</div>
								</li>

							</ul>
						 
					 

						
						
						 
						 
							<div class="panel-heading"> 
								<div class="heading-elements">
									<ul class="icons-list"> 
										<li>10 / 12 / 2016</li>
				                	</ul>
			                	</div>
							</div>

							<ul class="media-list media-list-linked">
							 
								<li class="media"> 
									<div class="collapse" id="james">
										<div class="contact-details">
											<ul class="list-extended list-unstyled list-icons">
											 <li class="cate">  Fre</li>
											    <li class="name"> James Alexander</li>
												<li class="place"><i class="icon-pin position-left"></i> Madrid</li> 
												<li class="contact_num"><i class="icon-phone position-left"></i> +91 8017537619</li>
												<li class="email"><i class="icon-mail5 position-left"></i> <a href="#">jordana@mills.com</a></li>
												<li class="expert"><i class="icon-user-tie position-left"></i> UI/UX expert</li>
											</ul>
										</div>
									</div>
								</li>

  
							</ul>
							
							
							
							
						 
						 
							<div class="panel-heading"> 
								<div class="heading-elements">
									<ul class="icons-list"> 
										<li>09/ 12 / 2016</li>
				                	</ul>
			                	</div>
							</div>

							<ul class="media-list media-list-linked">
							 
								<li class="media"> 
									<div class="collapse" id="james">
										<div class="contact-details">
											<ul class="list-extended list-unstyled list-icons">
											 <li class="cate">  Fre</li>
											    <li class="name"> James Alexander</li>
												<li class="place"><i class="icon-pin position-left"></i> Madrid</li> 
												<li class="contact_num"><i class="icon-phone position-left"></i> +91 8017537619</li>
												<li class="email"><i class="icon-mail5 position-left"></i> <a href="#">jordana@mills.com</a></li>
												<li class="expert"><i class="icon-user-tie position-left"></i> UI/UX expert</li>
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


	            