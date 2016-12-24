<?php
$this->title = 'Edit Profile';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
?>
<style>
  .editcontainer{
    width: 20px;
    height: 20px;
    padding: 4px;
    float: right;
    cursor: pointer;
}
.select-wrapper {
    background: url(images/edit.png) no-repeat;
    background-size: cover;
    display: block;
    position: relative;
    width: 15px;
    height: 15px;
}
#image_src {
    width: 15px;
    height: 15px;
    margin-right: 100px;
    opacity: 0;
    filter: alpha(opacity=0); /* IE 5-7 */
}
</style>
<div id="wrapper"><!-- start main wrapper -->
	 
		 
		<div class="inner_page second">
			<div class="container">
			  <div  id="profile-desc">
				 <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal','enctype'=>'multipart/form-data']]); ?>
		
			   <div class="col-md-2 col-sm-2 col-xs-12">
			                 <div class="user-profile">
                                    <img src="<?=Yii::$app->session['EmployeeDP'];?>" alt="" class="img-responsive center-block ">
						<div class="editcontainer">
							<span class="select-wrapper">
							  <input type="file"  name="AllUser[PhotoId]" id='image_src'/>
							</span>
						</div>
				   <h3><input type="text" class="form-control" required name="AllUser[Name]" id="Name" value="<?=$profile->Name;?>" placeholder="Name"></h3>
                                </div> 
			      	</div>
               
                       <div class="col-md-10 col-sm-10 col-xs-12">
                            <div class="job-short-detail" id="edit_profile_page">
                                <div class="heading-inner">
                                    <p class="title">Profile detail</p>
									<?= Html::submitButton('<i class="fa fa-floppy-o orange"></i> Save Changes') ?>
									
                                </div>
                                <dl>
                                     
                                    <dt>Phone:</dt>
                                    <dd>
                                        <input type="text" class="form-control" name="AllUser[MobileNo]" onkeypress="return numbersonly(event)" onblur="return IsMobileno(this.value);" maxlength="10" id="MobileNo" value="<?=$profile->MobileNo;?>" required> </dd>

                                    <dt>Email:</dt>
                                    <dd><input type="email" class="form-control" name="AllUser[Email]" value="<?=$profile->Email;?>" id="email" placeholder="martine-aug234@domain.com" readonly></dd>
 
                                    <dt>Address:</dt> 
									<dd><input type="text" class="form-control" name="AllUser[Address]" id="address" value="<?=$profile->Address;?>" placeholder="234 Uptown new City Tower "></dd>

                                    <dt>City:</dt> 
									<dd><input type="text" class="form-control" name="AllUser[City]" id="city" placeholder="Islamabad" value="<?=$profile->City;?>"></dd>

                                    <dt>State:</dt> <dd></dd>
									<dd><input type="text" class="form-control" name="AllUser[State]" id="state" placeholder="North Vega " value="<?=$profile->State;?>"></dd>

                                    <dt>Country:</dt>
                                   
									<dd><input type="text" class="form-control" name="AllUser[Country]" id="country" placeholder="Somewere at Antarctica " value="<?=$profile->Country;?>"> </dd>
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
										 <input type="text" class="form-control" name="AllUser[HighestQualification]" id="hq" placeholder="Master of Business Administration" value="<?=$profile->educations[0]->HighestQualification;?>"> 
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
										  <select class="questions-category form-control select2-hidden-accessible" name="AllUser[CourseId]"  required>
										<option value="">Select Course  </option>
										<?php
										foreach($course as $key=>$value)
										{
										?>
										<option value="<?=$value->CourseId;?>" <?php if($profile->educations[0]->CourseId==$value->CourseId) echo "selected";?>><?=$value->CourseName;?></option>
										<?php
										}
										?>
										</select>
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
										 <input type="text" class="form-control" name="AllUser[University]" id="University"  placeholder="University/College" value="<?=$profile->educations[0]->University;?>" required/>
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
										  <select class="questions-category form-control select2-hidden-accessible" name="AllUser[SkillId]"  required>
										<option value="">Select Skill  </option>
										<?php
										foreach($skill as $key=>$value)
										{
										?>
										<option value="<?=$value->SkillId;?>" <?php if($profile->educations[0]->SkillId==$value->SkillId) echo "selected";?>><?=$value->Skill;?></option>
										<?php
										}
										?>
										</select>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
						 
						 <div class="clearfix"> </div>
						 
						 
						 
			
				<div class="col-md-12 col-sm-12 col-xs-12">
                <?php
				if($profile->experiences)
				{
				?>
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
										  <input type="text" class="form-control" name="AllUser[CompanyName]" id="CompanyName"  placeholder="Company name" value="<?=$profile->experiences[0]->CompanyName;?>"/>
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
										  <select class="questions-category form-control select2-hidden-accessible" name="AllUser[PositionId]">
										<option value="">Select Position  </option>
										<?php
										foreach($position as $key=>$value)
										{
										?>
										<option value="<?=$value->PositionId;?>" <?php if($profile->experiences[0]->PositionId==$value->PositionId) echo "selected";?>><?=$value->Position;?></option>
										<?php
										}
										?>
										</select>
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
										  <select id="form-filter-location" name="AllUser[Experience]" data-minimum-results-for-search="Infinity" class="questions-category form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                 <option value="Experience" <?php if($profile->experiences[0]->PositionId==$value->PositionId) echo "selected";?>>Experience</option>
                                <option value="1" <?php if($profile->experiences[0]->PositionId==1) echo "selected";?>> &gt; 1 Year   </option>
                                <option value="2" <?php if($profile->experiences[0]->PositionId==2) echo "selected";?>>   2 Year  </option>
                                <option value="3" <?php if($profile->experiences[0]->PositionId==3) echo "selected";?>>   3 Year  </option>
								<option value="4" <?php if($profile->experiences[0]->PositionId==4) echo "selected";?>>   4 Year  </option>
								<option value="5" <?php if($profile->experiences[0]->PositionId==5) echo "selected";?>>   5 Year  </option>
								<option value="6" <?php if($profile->experiences[0]->PositionId==6) echo "selected";?>>   6 Year  </option>
								<option value="7" <?php if($profile->experiences[0]->PositionId==7) echo "selected";?>>   7 Year  </option>
                              </select> 
                                        </div>   
                                    </div>
                                </div>
								
								  
                            </div>
					<?php
                }
				else
				{
				?>
				<div class="resume-box">
                                <div class="heading-inner">
                                    <p class="title">  Work Experience </p>
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
										  <input type="text" class="form-control" name="AllUser[CompanyName]" id="CompanyName"  placeholder="Company name" />
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
										  <select class="questions-category form-control select2-hidden-accessible" name="AllUser[PositionId]">
										<option value="">Select Position  </option>
										<?php
										foreach($position as $key=>$value)
										{
										?>
										<option value="<?=$value->PositionId;?>"><?=$value->Position;?></option>
										<?php
										}
										?>
										</select>
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
										  <select id="form-filter-location" name="AllUser[Experience]" data-minimum-results-for-search="Infinity" class="questions-category form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                 <option value="Experience">Experience</option>
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
                                </div>
								
								<div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                              <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4>Year</h4>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
										<div class="degree-info">
						<div class="cols-sm-5">
								<div class="input-group" style="width: 33%;float: left;">
									<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
									<input type="text" class="form-control date" name="AllUser[YearFrom]" id="YearFrom"  placeholder="From" maxlength="4" onkeypress="return numbersonly(event)"/>
								</div>
								<div class="input-group" style="width: 33%;float: left;margin-left: 10%;">
									<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
									<input type="text" class="form-control date" name="AllUser[YearTo]" id="YearTo"  placeholder="To"  maxlength="4" onkeypress="return numbersonly(event);" onchange="if(new Date($(this).val()).getTime()<=new Date($('#YearFrom').val()).getTime()){alert('Wrong Year Duration');$(this).val('');}"/>
								</div>
						</div>
                                        </div>   
                                    </div>
                                </div>
								
								<div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                              <i class="fa fa-briefcase" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4>Salary</h4>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
										<div class="degree-info">
													<input type="text" class="form-control" name="AllUser[Salary]" id="Salary"  placeholder="Salary Per Month"/>
                                        </div>   
                                    </div>
                                </div>
								
								  
                            </div>
				<?php
				}
				?>
							
							
						
                        </div>
	
    <?php ActiveForm::end(); ?>
  </div>
            </div>
       </div>
		 
		
		
		
		<div class="border"></div>
	 