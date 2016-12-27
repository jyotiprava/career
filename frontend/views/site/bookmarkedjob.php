<?php
$this->title = 'Bookmarked Job';
//var_dump($model);
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
$url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
?>

<div id="wrapper"><!-- start main wrapper -->
	
  
	 
		 
		<div class="inner_page">
			<div class="container">
		
 
					 
					  
					 
					 <div class="col-lg-9  col-md-9 col-sm-9 col-xs-12"  id="mobile_design">
	  
					 
					   <h4><i class="glyphicon glyphicon-briefcase"></i>   You Have Bookmarked <?=Yii::$app->session['NoofjobApplied']; ?> Jobs</h4>
				
				<?php
				if($model)
				{
				foreach($model as $key=>$value)
				{
				?>
				<div class="item-list">
						
					       <a href="<?= Url::toRoute(['site/jobdetail','JobId'=>$value->JobId])?>"">
					       
					       <div class="col-sm-12 add-desc-box">
							       <div class="applied_job">
								 <p>Bookmarked</p>
							       </div>
							       
							       
					       <div class="add-details">
						<h5 class="add-title"><?=$value->job->JobTitle;?></h5>
						<div class="info"> 
						  <span class="category"><?=$value->job->position->Position;?></span> -
						  <span class="item-location"><i class="fa fa-map-marker"></i> <?=$value->job->Location;?></span> <br>
						<span> <strong><?=$value->job->CompanyName;?></strong> </span>
						</div>
						<div class="info bottom">
									<div class="col-sm-3 col-xs-3">
									    <span class="styl">Experience : </span>  
									</div>
									    <div class="col-sm-9 col-xs-9 left-text">
										    <span class="category"><?php if($value->job->Experience!='Fresher'){ echo $value->job->Experience.' Year';}else{echo $value->job->Experience;}?></span>  
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
												   foreach($value->job->jobRelatedSkills as $k=>$v)
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
									    <span class="category"><?=substr(htmlspecialchars_decode($value->job->JobDescription),0,150).'...';?></span>  
								    </div>
						</div>
					 
						<div class="info bottom">
						  <div class="col-sm-3 col-xs-3">
						      <span class="styl">Salary Range </span>  
						  </div>
						      <div class="col-sm-9 col-xs-9 left-text">
							      <span class="category"><?=$value->job->Salary;?></span>  
						      </div>
					       </div> 
					 
						<div class="info bottom"> 
						<span class="category" style="text-align:right">    Posted By <?=$value->job->employer->Name.' ('.date('d M Y, h:i A',strtotime($value->job->OnDate)).')';?></span> 
						</div>
						
						</div>
                  
				</div>
				</a>
				</div>
				
				<?php } }?>
				
                </div>
					 
					 
					 
					 
					 
					 
					 
					 <div class="col-lg-3  col-md-3 col-sm-3 col-xs-12" id="right-side">
					 
								<div class="job-oppening-title-right mar_less"> <h4> Top Jobs </h4></div>
				 
						  <div class="rsw"> 
                            <aside> 
                                <div class="widget">
                                    
                                    <ul class="related-post">
                                        <li>
                                            <a href="#"> SSCS WORLD PVT LTD  </a>
											<span><i class="fa fa-suitcase"></i>Position:  Wed Developer </span>
											<span><i class="fa fa-calendar"></i>Place: Kolkata </span>
											<span><i class="fa fa-clock-o"></i>Post Time: 10.30 AM </span>
                                        </li>
                                        <li>
										   <a href="#"> RS WORLD PVT LTD  </a>
											<span><i class="fa fa-suitcase"></i>Position: Marketing Professionals Required </span>
											<span><i class="fa fa-calendar"></i>Place: Kolkata </span>
											<span><i class="fa fa-clock-o"></i>Post Time: 10.30 AM </span> 
                                        </li>
                                        <li>
										<a href="#"> BCC PVT LTD  </a>
											<span><i class="fa fa-suitcase"></i>Position: Mobile App Programmers </span>
											<span><i class="fa fa-calendar"></i>Place: Kolkata </span>
											<span><i class="fa fa-clock-o"></i>Post Time: 10.30 AM </span>  
                                        </li>
                                        <li>
										<a href="#"> PC Gems PVT LTD  </a>
											<span><i class="fa fa-suitcase"></i>Position: General Compliance Officer </span>
											<span><i class="fa fa-calendar"></i>Place: Kolkata </span>
											<span><i class="fa fa-clock-o"></i>Post Time: 10.30 AM </span>  
                                        </li>
                                        <li>
										<a href="#"> Tech Mahendra PVT LTD  </a>
											<span><i class="fa fa-suitcase"></i>Position: Call Centre Manager</span>
											<span><i class="fa fa-calendar"></i>Place: Kolkata </span>
											<span><i class="fa fa-clock-o"></i>Post Time: 10.30 AM </span>  
                                        </li>
                                        
                                    </ul>
                                </div>

                            </aside>
                        </div>
					  	 
                
 
  
  
							<div class="clearfix"></div>
						
						
							<!--adban_block main -->
								<div class="adban_block">
							      <img src="images/adban_block/ban.jpg"> 
							    </div>
						   <!-- adban_block  main -->
								
								
						</div>
					 
					 
					 
					 
					  
					  

      </div>


 
		    </div>
		 
		
		
		<div class="border"></div>
	
        </div>