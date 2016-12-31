<?php
$this->title = 'Career Bugs';
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
$url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
use yii\widgets\LinkPager;
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
								<?php
								if(isset($_GET['latest']))
								{
										$latest=$_GET['latest'];}else{$latest='';}
								?>
								<select class="form-control" id="latest" onchange="getsearch();">
										<option value="">Select</option>
										<option value="1" <?php if($latest==1) echo "selected='selected'";?>>1 Days</option>
										<option value="3" <?php if($latest==3) echo "selected='selected'";?>>3 Days</option>
										<option value="7" <?php if($latest==7) echo "selected='selected'";?>>7 Days</option>
										<option value="15" <?php if($latest==15) echo "selected='selected'";?>>15 Days</option>
										<option value="30" <?php if($latest==30) echo "selected='selected'";?>>30 Days</option>
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
						<?php
								if(isset($_GET['role']))
								{$role1=$_GET['role'];}else{$role1='';}?>
                           <select class="form-control" id="position" onchange="getsearch();"><option value="">Select</option>
						   <?php
						   foreach($role as $rk=>$rvalue)
						   {
						   ?>
						   <option value="<?=$rvalue->PositionId;?>" <?php if($role1==$rvalue->PositionId) echo "selected='selected'";?>><?=$rvalue->Position;?></option>
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
                            <select class="form-control bfh-states states" id="state" onchange="getsearch();"><option value="">Select</option></select>
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
									   <div class="checkbox"> <label> <input type="checkbox" class="salary" value="0 - 1.5" <?php if(in_array('0 - 1.5',$salaryrange)) echo "checked";?>>
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span> 0 - 1.5 Lakh   </label>
								      </div>	 
							       </span>
								 
								     <span> 
									   <div class="checkbox"> <label> <input type="checkbox" class="salary" value="1.5 - 3" <?php if(in_array('1.5 - 3',$salaryrange)) echo "checked";?>>
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>1.5 - 3 Lakh  </label>
								      </div>	 
							       </span>
								    
								       <span> 
									   <div class="checkbox"> <label> <input type="checkbox" class="salary" value="3 - 6" <?php if(in_array('3 - 6',$salaryrange)) echo "checked";?>>
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>3 - 6 Lakh   </label>
								      </div>	 
							       </span>
								   
								   
								       <span> 
									   <div class="checkbox"> <label> <input type="checkbox" class="salary" value="6 - 10" <?php if(in_array('6 - 10',$salaryrange)) echo "checked";?>>
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>6 - 10 Lakh  </label>
								      </div>	 
							       </span>
								  
								       <span> 
									   <div class="checkbox"> <label> <input type="checkbox" class="salary" value="10 - 15" <?php if(in_array('10 - 15',$salaryrange)) echo "checked";?>>
									   <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>10 - 15 Lakh  </label>
								      </div>	 
							       </span>
								   
								    
								       <span> 
									   <div class="checkbox"> <label> <input type="checkbox" class="salary" value="15 - 25" <?php if(in_array('15 - 25',$salaryrange)) echo "checked";?>>
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
									<label> <input type="checkbox" class="jobtype" value="Work From Home" <?php if(in_array('Work From Home',$jobtype)) echo "checked";?>>
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span> Work From Home 
									</label>
								  </div>	 
							     </span>
								 
								  <span> 
									<div class="checkbox">
									<label> <input type="checkbox" class="jobtype" value="Part Time" <?php if(in_array('Part Time',$jobtype)) echo "checked";?>>
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>Part Time Jobs 
									</label>
								  </div>	 
							     </span>
								 
								  <span> 
									<div class="checkbox">
									<label> <input type="checkbox" class="jobtype" value="Full Time" <?php if(in_array('Full Time',$jobtype)) echo "checked";?>>
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>Full Time Jobs
									</label>
								  </div>	 
							     </span>
								 
								 
								  <span> 
									<div class="checkbox">
									<label> <input type="checkbox" class="jobtype" value="Internships" <?php if(in_array('Internships',$jobtype)) echo "checked";?>>
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
                      <span class="item-location"><i class="fa fa-map-marker"></i> <?=$jvalue->Location;?></span> <br>
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
							<span class="category"><?=$jvalue->Salary;?> Lakh</span>  
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
					 
					 <?php
							echo LinkPager::widget([
								'pagination' => $pages,
							]);
							?>
						<div class="spacer-2"></div>
					</div>
					
					
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		
		<div class="border"></div>
</div>
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