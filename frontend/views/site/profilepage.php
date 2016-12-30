<?php
$this->title = 'Profile';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
?>

<div id="wrapper"><!-- start main wrapper -->

		<div class="inner_page second">
			<div class="container">
			  <div  id="profile-desc">
			   <div class="col-md-2 col-sm-2 col-xs-12">
			                 <div class="user-profile">
                                    <img src="<?=Yii::$app->session['EmployeeDP'];?>" alt="" class="img-responsive center-block ">
                                    <h3><?=$profile->Name;?></h3>
                                </div> 
			      	</div>
		         <div class="col-md-10 col-sm-10 col-xs-12"> 
                            <div class="job-short-detail">
                                <div class="heading-inner">
                                    <p class="title">Profile detail</p>
									
									<a href="<?= Url::toRoute(['site/editprofile'])?>">  <i class="fa fa-pencil-square-o orange"></i> Edit Profile</a>
                                </div>
								
								
								
                                <dl>
                                     
                                    <dt>Phone:</dt>
                                    <dd>+<?=$profile->MobileNo;?> </dd>

                                    <dt>Email:</dt>
                                    <dd><?=$profile->Email;?> </dd>
 
                                    <dt>Address:</dt>
                                    <dd><?=$profile->Address;?></dd>

                                    <dt>City:</dt>
                                    <dd><?=$profile->City;?></dd>

                                    <dt>State:</dt>
                                    <dd><?=$profile->State;?></dd>

                                    <dt>Country:</dt>
                                    <dd><?=$profile->Country;?></dd>
                                </dl>
                            </div>
 
                        </div>
						 
	 <div class="clearfix"> </div>
	
						
				<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="resume-box">
                                <div class="heading-inner">
                                    <p class="title">Educational Information  <span><?=date('Y',strtotime($profile->educations[0]->DurationFrom));?> to <?=date('Y',strtotime($profile->educations[0]->DurationTo));?></span></p>
                                </div>
                                <div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                           <i class="fa fa-file-text" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4>Higest Qualification</h4>
                                           
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4><?=$profile->educations[0]->HighestQualification;?></h4>
                                             </div>
                                    </div>
                                </div>
                                <div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                            <i class="fa fa-files-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4>Course</h4> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4><?=$profile->educations[0]->course->CourseName;?></h4>
                                             </div>
                                    </div>
                                </div>
                                <div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                              <i class="fa fa-briefcase" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4>University / College</h4>
                                           
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4><?=$profile->educations[0]->University;?></h4>
                                             </div>
                                    </div>
                                </div>
								
								 <div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                             <i class="fa fa-file-text" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4> 	Skills</h4>
                                             
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
												<?php
												$skill='';
												foreach($profile->empRelatedSkills as $ask=>$asv)
												{
														$skill.=$asv->skill->Skill.', ';
												}
												$skill=trim(trim($skill),",");
												?>
                                            <h4><?=$skill;?></h4>
                                             </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						 
						 <div class="clearfix"> </div>
						 
						 
						 
				<?php
				if($profile->experiences)
				{
				?>
				<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="resume-box">
                                <div class="heading-inner">
                                    <p class="title">  Work Experience  <span><?=date('Y',strtotime($profile->experiences[0]->YearFrom));?> to <?=date('Y',strtotime($profile->experiences[0]->YearTo));?></span></p>
                                </div>
                                <div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                           <i class="fa fa-file-text" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4>Company name</h4>
                                           
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4><?=$profile->experiences[0]->CompanyName;?></h4>
                                             </div>
                                    </div>
                                </div>
                                <div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                            <i class="fa fa-files-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4>Position</h4> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4><?=$profile->experiences[0]->position->Position;?></h4>
                                             </div>
                                    </div>
                                </div>
                                <div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                              <i class="fa fa-briefcase" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4>Experience</h4>
                                           
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4>> <?=$profile->experiences[0]->Experience;?> Year</h4>
                                             </div>
                                    </div>
                                </div>
								
								  
                            </div>
                        </div>
	
  
			  <?php
				}
				?>
			  </div>
            </div>
       </div>
		 
		
		
		
		<div class="border"></div>
</div>