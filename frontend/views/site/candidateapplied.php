<?php
$this->title = 'Candidates';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
$url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
use yii\widgets\LinkPager;
?>
<div class="wrapper"><!-- start main wrapper -->

		 
		<div class="inner_page">
			<div class="container">
					  
					 
					 <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12"  id="mobile_design">
					 
					 <div class="pannel_header margin_top">
					 <div class="width-13">
							 <div class="checkbox">
							    <label> <input type="checkbox" value="">
								<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span> 
							    </label>
							  </div>					     
							</div>
							
					      <div class="width-14">
							 <div class="checkbox">
							    <label> 
								  Sms
							    </label>
							  </div>					     
							</div>
					      
						  
						  <div class="width-14">
							 <div class="checkbox">
							    <label>  
								 Mail
							    </label>
							  </div>					     
							</div>
							
							
							 <div class="width-14">
							 <div class="checkbox">
							    <label> 
								  Download  
							    </label>
							  </div>					     
							</div>
					    <div class="width-10" id="select_per_page">	
                            <div class="form-groups">
							<div class="col-sm-8">
						      <label>Result Per page </label>
							 </div>
						<div class="col-sm-4">
							<?php
							if(isset($_GET['perpage']))
							{
							$perpage=$_GET['perpage'];
							}else{$perpage=10;}
							?>
                              <select id="form-filter-location" data-minimum-results-for-search="Infinity" class="form-control23 select2-hidden-accessible" tabindex="-1" aria-hidden="true" onchange="getresultperpage(this.value,'hirecandidate');">
								<option value="10" <?php if($perpage==10) echo "selected='selected'";?>>10</option>
                                <option value="20" <?php if($perpage==20) echo "selected='selected'";?>>  20  </option>
                                <option value="30" <?php if($perpage==30) echo "selected='selected'";?>>  30 </option>
                                <option value="40" <?php if($perpage==40) echo "selected='selected'";?>>  40  </option>
								<option value="50" <?php if($perpage==50) echo "selected='selected'";?>>  50  </option> 
                              </select> 
                            </div>
							 </div>
                          </div>
					 </div>
					 
				<?php
				foreach($appliedjob as $key=>$value)
				{
										if($value->user->photo)
										{
											$doc=$url.$value->user->photo->Doc;
										}
										else
										{
											$doc=$imageurl.'images/user.png';
										}
				?>
					 <div class="profile-content payment_list">
                                <div class="card">
                                    <div class="firstinfo">
                                    	<img src="<?=$doc;?>" alt="" class="img-circle img-responsive">
                                        <div class="profileinfo">
                                            <h1> <?=$value->user->Name;?></h1>
											<?php
											if($value->user->experiences)
											{
												$positionv=$value->user->experiences[0]->position->Position;
											?>
											<small><?=$value->user->experiences[0]->position->Position;?>  from <?=$value->user->City;?>, <?=$value->user->State;?></small>
											<?php
											}
											else{
											?>
											<small>From <?=$value->user->City;?>, <?=$value->user->State;?></small>
											<?php
											}
											?>
											<div class="spcae1"></div>
											
											<div class="row">
											 <div class="col-md-12 col-sm-12 col-xs-12">
											     <div class="col-md-6 col-sm-12 col-xs-12"> 
             										<ul class="commpany_desc">
														<?php
														if($value->user->experiences)
														{
														?>
														<li>Experience: <?=$value->user->experiences[0]->Experience;?> Years   </li>
														<li>Company:  <?=$value->user->experiences[0]->CompanyName;?> </li>
														<?php
														}
														?>
														
													  </ul>
                                                </div>
												 
												   <div class="col-md-6 col-sm-12 col-xs-12"> 
													  <ul class="commpany_desc">
														<?php
														if($value->user->experiences)
														{
														?>
													    <li> Current Salary <?=$value->user->experiences[0]->Salary;?> Lakh   </li>
														<?php
														}
														if($value->user->educations)
														{
															?>
														 <li> Last Qualification: <?=$value->user->educations[0]->HighestQualification;?>   </li>
														 <?php
														}
														?>
													   </ul>
                                                   </div> 
												 </div>
											</div>
												
												 
												   <div class="profile-skills">
													<?php
													if($value->user->empRelatedSkills)
													{
													foreach($value->user->empRelatedSkills as $ask=>$asv)
												{
													?>
													<span> <?=$asv->skill->Skill;?> </span>
													<?php
												}
													}
												?>
														
													</div> 
													
													 <p class="last_update">Last updated <?=date('d-m-Y',strtotime($value->user->UpdatedDate));?></p>
													 <p class="last_update_main" style="display: none;">Shortlisted by 2 Recruiters recently</p>
										</div>
                                    </div>
		 
									 <div class="contact_me"> 
									  	<a href="" class="btn-default  type="button" data-toggle="modal" data-target="#myModal_buy_a_plan"> <i class="fa fa-download"></i>  Sms  </a>
									    <a href="" class="btn-default" type="button" data-toggle="modal" data-target="#myModal_buy_a_plan"> <i class="fa fa-phone"></i>   Email </a>
										 <a href="" class="btn-default" type="button" data-toggle="modal" data-target="#myModal_buy_a_plan"> <i class="fa fa-envelope-o"></i>  View Contact   </a>
									 </div>
                                </div>
                            </div>
							
							
					<!--profile-content-->
					<?php
				}
				?>
				
			 <!-- Modal -->
  <div class="modal fade" id="myModal_buy_a_plan" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
	     <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Buy a Plan</h4>
        </div>
									   <div class="widget_inner">
											   <div class="panel price panel-red">
												<div class="panel-body text-center">
													<p class="lead" ><strong>Basic Plan</strong></p>
												</div> 
												<div class="clear"></div>
												<ul class="list-group list-group-flush text-center width-half">
												<li class="list-group-item"><i class="icon-ok text-danger"></i> Rs/- 199 </li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i> 3 Candidates </li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i> 3 Days</li> 
												</ul> 
												<div class="panel-footer">
													<a class="btn btn-lg btn-block btn-danger" href="#">BUY NOW!</a>
												</div>
											</div>
									   <!-- /PRICE ITEM -->
								       </div>
									   
									   
								 <div class=" widget_inner"> 
								 <!-- PRICE ITEM -->
										<div class="panel price panel-red "> 
											<div class="panel-body text-center">
												<p class="lead" ><strong>REGULAR PLAN</strong></p>
											</div>
											<ul class="list-group list-group-flush text-center width-half"> 
											   <li class="list-group-item"><i class="icon-ok text-danger"></i> Rs/- 499 </li>
												<li class="list-group-item"><i class="icon-ok text-danger"></i> 50 Candidates </li>
												<li class="list-group-item"><i class="icon-ok text-danger"></i> 10 Days </li> 
											</ul>
											<div class="panel-footer">
												<a class="btn btn-lg btn-block btn-danger" href="#">BUY NOW!</a>
											</div>
										</div>
					             <!-- /PRICE ITEM --> 
								 </div>
								 
								  <div class="widget_inner">
								 <!-- PRICE ITEM -->
										<div class="panel price panel-red"> 
											<div class="panel-body text-center">
												<p class="lead" ><strong>STAR PLAN</strong></p>
											</div>
											<ul class="list-group list-group-flush text-center width-half">
												<li class="list-group-item"><i class="icon-ok text-danger"></i>Rs/- 999  </li>
												<li class="list-group-item"><i class="icon-ok text-danger"></i>200 Candidates </li>
												<li class="list-group-item"><i class="icon-ok text-danger"></i> 25 Days </li> 
											</ul>
											<div class="panel-footer">
												<a class="btn btn-lg btn-block btn-danger" href="#">BUY NOW!</a>
											</div>
										</div>
					             <!-- /PRICE ITEM --> 
								</div> 
			   </div>  
			   </div>
		 	</div>
			<!-- Modal -->		 				

							<?php
							echo LinkPager::widget([
								'pagination' => $pages,
							]);
							?>
  
  
  
                        </div>
					 
					 
					  

      </div>


 
		    </div>
		 
		
		
		<div class="border"></div>
		</div><!-- end main wrapper -->
