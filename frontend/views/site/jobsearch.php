<?php
$this->title = 'Career Bugs';
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
$url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
?>


<div id="wrapper"><!-- start main wrapper -->

		<div class="job_search"><!-- Start Recent Job -->
			<div class="container">
				<div class="row">
					<div class="col-lg-3  col-md-3 col-sm-3 col-xs-12"  id="right-side"> 
			 
	 <h4>Job Filter</h4>
            <div class="panel-group" id="accordion">
			 <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne12"><h4 class="panel-title">
							 Latest
                        </h4></a>
                    </div>
                    <div id="collapseOne12" class="panel-collapse collapse in">
                        <div class="panel-body">
								<select class="form-control" onchange="getlatestjob(this.value);">
										<option value="">Select</option>
										<option value="1">1 Days</option>
										<option value="3">3 Days</option>
										<option value="7">7 Days</option>
										<option value="15">15 Days</option>
										<option value="30">30 Days</option>
						        </select>
                        </div>
                    </div>
                </div>
				
				
				
			  <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne13"><h4 class="panel-title">
							 Role
                        </h4></a>
                    </div>
                    <div id="collapseOne13" class="panel-collapse collapse">
                        <div class="panel-body">
                           <select class="form-control" onchange="getjobrole(this.value);"><option value="">Select</option>
						   <?php
						   foreach($role as $rk=>$rvalue)
						   {
						   ?>
						   <option value="<?=$rvalue->PositionId;?>"><?=$rvalue->Position;?></option>
						   <?php
						   }
						   ?>
						   </select>
                        </div>
                    </div>
                </div>
				
				
				
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							 Location</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <select class="form-control bfh-states states" onchange="getstatejob(this.value);"><option value="">Select</option></select>
                        </div>
                    </div>
                </div>
				
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Salary</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body"> 
						            <span> 
									   <div class="checkbox"> <label> <input type="checkbox" value="0-12500">
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span> 0 - 1.5 Lakh   </label>
								      </div>	 
							       </span>
								 
								     <span> 
									   <div class="checkbox"> <label> <input type="checkbox" value="12500-25000">
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>1.5 - 3Lakh  </label>
								      </div>	 
							       </span>
								    
								       <span> 
									   <div class="checkbox"> <label> <input type="checkbox" value="25000-50000">
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>3 - 6 Lakh   </label>
								      </div>	 
							       </span>
								   
								   
								       <span> 
									   <div class="checkbox"> <label> <input type="checkbox" value="50000-84000">
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>6 - 10 Lakh  </label>
								      </div>	 
							       </span>
								  
								       <span> 
									   <div class="checkbox"> <label> <input type="checkbox" value="84000-125000">
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>10 - 15 Lakh  </label>
								      </div>	 
							       </span>
								   
								    
								       <span> 
									   <div class="checkbox"> <label> <input type="checkbox" value="125000-208000">
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>15 - 25 Lakh   </label>
								      </div>	 
							       </span> 
							 </select>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> Job Type</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                           
						         <span> 
									<div class="checkbox">
									<label> <input type="checkbox" value="Work From Home">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span> Work From Home 
									</label>
								  </div>	 
							     </span>
								 
								  <span> 
									<div class="checkbox">
									<label> <input type="checkbox" value="Part Time">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>Part Time Jobs 
									</label>
								  </div>	 
							     </span>
								 
								  <span> 
									<div class="checkbox">
									<label> <input type="checkbox" value="Full Time">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>Full Time Jobs
									</label>
								  </div>	 
							     </span>
								 
								 
								  <span> 
									<div class="checkbox">
									<label> <input type="checkbox" value="Internships">
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
			<div class="widget-heading"><span class="title">Hot Categories </span></div>
			
			<div class="spacer-5"></div>
        <div class="widget"> 
                                    <ul class="categories-module">
                                       <?php
								if($hotcategory)
								{
								foreach($hotcategory as $hkey=>$hvalue)
								{
								?>
								<li> <a href="<?= Url::toRoute(['site/jobsearch','JobCategoryId'=>$hvalue->JobCategoryId])?>"> <?=$hvalue->CategoryName;?> <span>(<?=$hvalue->cnt;?>)</span> </a> </li>
								<?php
								}
								}
								?>
                                    </ul>
                                </div>
					</div>
					
					 
					
					<div class="col-lg-9  col-md-9 col-sm-9 col-xs-12"  >
						<div class="pannel_header margin_top">
								<h4>All Job</h4>
						</div>
	 
		 <?php
		if($alljob)
		{
		foreach($alljob as $jkey=>$jvalue)
		{
		?>
		 <div class="item-list">
                <a href="<?= Url::toRoute(['site/jobdetail','JobId'=>$jvalue->JobId])?>">
                <div class="col-sm-12 add-desc-box">
                  <div class="add-details">
                    <h5 class="add-title"><?=$jvalue->JobTitle;?></h5>
                    <div class="info"> 
                      <span class="category"><?=$jvalue->position->Position;?></span> -
                      <span class="item-location"><i class="fa fa-map-marker"></i><?=$jvalue->Location;?></span> <br>
                    <span> <strong><?=$jvalue->CompanyName;?></strong> </span>
					</div>
                    <div class="info bottom">
					    <div class="col-sm-3 col-xs-3">
					    	<span class="styl">Experience : </span>  
					    </div>
						<div class="col-sm-9 col-xs-9 left-text">
							<span class="category"><?php if($jvalue->Experience!='Fresher'){ echo $jvalue->Experience.' Year';}else{echo $jvalue->Experience;}?></span>  
                      </div>
					 </div> 
					  <div class="info bottom">
					     <div class="col-sm-3 col-xs-3">
					    	<span class="styl">Keyskills : </span>  
					    </div>
						<div class="col-sm-9 col-xs-9 left-text">
							<span class="category">
								<?php
								$jskill='';
								foreach($jvalue->jobRelatedSkills as $k=>$v)
								{
								$jskill.=$v->skill->Skill.' , ';
								}
								echo $jskill;
								?>
							</span>  
                      </div>
					 </div>
					 
					   <div class="info bottom">
					    <div class="col-sm-3 col-xs-3">
					    	<span class="styl">Job Description : </span>  
					    </div>
						<div class="col-sm-9 col-xs-9 left-text">
							<span class="category"><?=substr(htmlspecialchars_decode($jvalue->JobDescription),0,150).'...';?></span>  
                      </div>
					 </div>
					 
					  <div class="info bottom">
					    <div class="col-sm-3 col-xs-3">
					    	<span class="styl">Salary Range </span>  
					    </div>
						<div class="col-sm-9 col-xs-9 left-text">
							<span class="category"><?=$jvalue->Salary;?></span>  
                      </div>
					 </div> 
					 
					<div class="info bottom"> 
						<span class="category" style="text-align:right">    Posted By <?=$jvalue->employer->Name.' ('.date('d M Y, h:i A',strtotime($jvalue->OnDate)).')';?></span> 
                    </div> 
                  </div>
                </div>
                </a>
              </div>
		<?php
		}
		}
		?>
					 
					 <ul class="pagination" style="display: none;">
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
							  </ul>
						<div class="spacer-2"></div>
					</div>
					
					
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		
		<div class="border"></div>
</div>

<script type="text/javascript">
		function getlatestjob(val) {
            window.location.href="<?= Url::toRoute(['site/jobsearch'])?>&latest="+val;
        }
		function getjobrole(val) {
            window.location.href="<?= Url::toRoute(['site/jobsearch'])?>&role="+val;
        }
		function getstatejob(val) {
            window.location.href="<?= Url::toRoute(['site/jobsearch'])?>&state="+val
        }
</script>
	 