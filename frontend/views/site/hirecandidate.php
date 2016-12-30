<?php
$this->title = 'Search Candidate';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
$url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
use yii\widgets\LinkPager;
?>
<div class="wrapper"><!-- start main wrapper -->
	
  
	
	<div class="headline job_head">
       <div class=" container"><!-- start headline section -->
		<div class="row">
			<div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 top-main bg-full margin_auto"> 
			   <h2 class="banner_heading">  <span>Search </span>  Candidate </h2>
			 
				<div class="sticky">
					<?php $form = ActiveForm::begin(['options' => ['class' => 'offset-top-10 offset-sm-top-30','id'=>'home_page_form']]); ?>
                        <div class="group-sm group-top">
                         
						 <div class="group-item col-md-4 col-xs-12"> 
							<div class="form-group"><div class="input-group">
										<span class="input-group-addon"><i class="fa fa-key"></i></span> 
										<input type="text" class="form-control" name="keysearch" placeholder="Qualification,industry">
									</div></div>
                          </div>
						  
						   <div class="group-item col-md-2 col-xs-12"> 
							<div class="form-group">  
								<input type="text" class="form-control" name="location" placeholder="Location">
							 </div>
                          </div>
						    
							
							<div class="group-item col-md-2 col-xs-6">
                            <div class="form-group">
                              <select id="form-filter-location" name="experience" data-minimum-results-for-search="Infinity" class="form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                <option value=" ">Experience</option>
                                <option value="1"> &gt; 1 Year   </option>
                                <option value="2">   2 Year  </option>
                                <option value="3">   3 Year  </option>
								<option value="4">   4 Year  </option>
								<option value="5">   5 Year  </option>
								<option value="6">   6 Year  </option>
								<option value="7">   7 Year  </option>
                              </select>
							       
                            </div>
                          </div>
						  
						  
                          <div class="group-item col-md-2 col-xs-6">
                            <div class="form-group">
                              <select id="form-filter-location" name="category" data-minimum-results-for-search="Infinity" class="form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                <option value="">Select By position</option>
								<?php
								foreach($allcategory as $hk=>$hv)
								{
								?>
								<option value="<?=$hv->PositionId;?>"><?=$hv->Position;?></option>
								<?php
								}
								?>
                              </select> 
                            </div>
                          </div>
						   
                          <div class=" group-item reveal-block reveal-lg-inline-block col-md-1 col-xs-12">
							<?= Html::submitButton('Search', ['name'=>'candidatesearch','class' => 'btn btn-primary element-fullwidth']) ?>
                          </div>
						  
                        </div>
                      <?php ActiveForm::end(); ?>
					 </div>
						</div>
						 
						<div class="clearfix"></div>
					</div>
			</div><!-- end headline section -->
	</div>
	
		 
		<div class="inner_page">
			<div class="container">
		
<div class="col-lg-3  col-md-3 col-sm-3 col-xs-12"  id="right-side"> 
	 <h4>Job Filter</h4>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><h4 class="panel-title">
							 Location
                        </h4></a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <select class="form-control bfh-states states" id="state" onchange="candidatesearch();"><option value="">Select</option></select>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><h4 class="panel-title">
                             Salary
                        </h4></a>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body"> 
						            <?php
								if(isset($_GET['salaryrange']))
								{
								$salaryrange=explode(",",$_GET['salaryrange']);
								}
								else
								{
										$salaryrange=array();
								}
								?>
						            <span> 
									   <div class="checkbox"> <label> <input type="checkbox" class="csalary" value="0 - 1.5" <?php if(in_array('0 - 1.5',$salaryrange)) echo "checked";?>>
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span> 0 - 1.5 Lakh   </label>
								      </div>	 
							       </span>
								 
								     <span> 
									   <div class="checkbox"> <label> <input type="checkbox" class="csalary" value="1.5 - 3" <?php if(in_array('1.5 - 3',$salaryrange)) echo "checked";?>>
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>1.5 - 3 Lakh  </label>
								      </div>	 
							       </span>
								    
								       <span> 
									   <div class="checkbox"> <label> <input type="checkbox" class="csalary" value="3 - 6" <?php if(in_array('3 - 6',$salaryrange)) echo "checked";?>>
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>3 - 6 Lakh   </label>
								      </div>	 
							       </span>
								   
								   
								       <span> 
									   <div class="checkbox"> <label> <input type="checkbox" class="csalary" value="6 - 10" <?php if(in_array('6 - 10',$salaryrange)) echo "checked";?>>
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>6 - 10 Lakh  </label>
								      </div>	 
							       </span>
								  
								       <span> 
									   <div class="checkbox"> <label> <input type="checkbox" class="csalary" value="10 - 15" <?php if(in_array('10 - 15',$salaryrange)) echo "checked";?>>
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>10 - 15 Lakh  </label>
								      </div>	 
							       </span>
								   
								    
								       <span> 
									   <div class="checkbox"> <label> <input type="checkbox" class="csalary" value="15 - 25" <?php if(in_array('15 - 25',$salaryrange)) echo "checked";?>>
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>15 - 25 Lakh   </label>
								      </div>	 
							       </span> 
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><h4 class="panel-title">
                             Job Type
                        </h4></a>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                           <?php
								if(isset($_GET['jobtype']))
								{
								$jobtype=explode(",",$_GET['jobtype']);
								}
								else
								{
										$jobtype=array();
								}
								?>
						         <span> 
									<div class="checkbox">
									<label> <input type="checkbox" class="cjobtype" value="Work From Home" <?php if(in_array('Work From Home',$jobtype)) echo "checked";?>>
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span> Work From Home 
									</label>
								  </div>	 
							     </span>
								 
								  <span> 
									<div class="checkbox">
									<label> <input type="checkbox" class="cjobtype" value="Part Time" <?php if(in_array('Part Time',$jobtype)) echo "checked";?>>
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>Part Time Jobs 
									</label>
								  </div>	 
							     </span>
								 
								  <span> 
									<div class="checkbox">
									<label> <input type="checkbox" class="cjobtype" value="Full Time" <?php if(in_array('Full Time',$jobtype)) echo "checked";?>>
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>Full Time Jobs
									</label>
								  </div>	 
							     </span>
								 
								 
								  <span> 
									<div class="checkbox">
									<label> <input type="checkbox" class="cjobtype" value="Internships" <?php if(in_array('Internships',$jobtype)) echo "checked";?>>
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>Internships
									</label>
								  </div>	 
							     </span> 
                        </div>
                    </div>
                </div>
                <div class="panel panel-default" style="display:none">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">  Reports</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                             
                        </div>
                    </div>
                </div>
            </div>
		
		
		
		
		
		
		
		
		<div class="spacer-5"></div>
 
                           
                               <div class="widget-heading"><span class="title"> Our Plans  </span></div> 
                          <div id="orange_payment_block">     
								 <div class="widget_inner-main">
									   <div class="widget_inner">
											   <div class="panel price panel-red">
												<div class="panel-body text-center">
													<p class="lead"><strong>Basic Plan</strong></p>
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
									  </div>   
									  
								<div class="widget_inner-main">	   
								 <div class="widget_inner"> 
								 <!-- PRICE ITEM -->
										<div class="panel price panel-red "> 
											<div class="panel-body text-center">
												<p class="lead"><strong>REGULAR PLAN</strong></p>
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
								 </div>
								 
								 <div class="widget_inner-main">	  
								  <div class="widget_inner">
								 <!-- PRICE ITEM -->
										<div class="panel price panel-red"> 
											<div class="panel-body text-center">
												<p class="lead"><strong>STAR PLAN</strong></p>
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
					
					 
					  
					 
					 <div class="col-lg-9  col-md-9 col-sm-9 col-xs-12"  id="mobile_design">
	 
		 
		 
					 
					 
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
				foreach($candidate as $key=>$value)
				{
										if($value->photo)
										{
											$doc=$url.$value->photo->Doc;
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
                                            <h1> <?=$value->Name;?></h1>
											<?php
											if($value->experiences)
											{
												$positionv=$value->experiences[0]->position->Position;
											?>
											<small><?=$value->experiences[0]->position->Position;?>  from <?=$value->City;?>, <?=$value->State;?></small>
											<?php
											}
											else{
											?>
											<small>From <?=$value->City;?>, <?=$value->State;?></small>
											<?php
											}
											?>
											<div class="spcae1"></div>
											
											<div class="row">
											 <div class="col-md-12 col-sm-12 col-xs-12">
											     <div class="col-md-6 col-sm-12 col-xs-12"> 
             										<ul class="commpany_desc">
														<?php
														if($value->experiences)
														{
														?>
														<li>Experience: <?=$value->experiences[0]->Experience;?> Years   </li>
														<li>Company:  <?=$value->experiences[0]->CompanyName;?> </li>
														<?php
														}
														?>
														
													  </ul>
                                                </div>
												 
												   <div class="col-md-6 col-sm-12 col-xs-12"> 
													  <ul class="commpany_desc">
														<?php
														if($value->experiences)
														{
														?>
													    <li> Current Salary <?=$value->experiences[0]->Salary;?> Lakh   </li>
														<?php
														}
														if($value->educations)
														{
															?>
														 <li> Last Qualification: <?=$value->educations[0]->HighestQualification;?>   </li>
														 <?php
														}
														?>
													   </ul>
                                                   </div> 
												 </div>
											</div>
												
												 
												   <div class="profile-skills">
													<?php
													if($value->empRelatedSkills)
													{
													foreach($value->empRelatedSkills as $ask=>$asv)
												{
													?>
													<span> <?=$asv->skill->Skill;?> </span>
													<?php
												}
													}
												?>
														
													</div> 
													
													 <p class="last_update">Last updated <?=date('d-m-Y',strtotime($value->UpdatedDate));?></p>
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
	
<script type="text/javascript">
		setTimeout(function(){
				<?php
				if(isset($_GET['state']))
								{
										?>
				var state='<?=$_GET['state'];?>';
				$('#state').val(state);
				<?php
								}
								?>
		},2000);
</script>