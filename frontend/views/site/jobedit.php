<?php
$this->title = 'Job Edit';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;use dosamigos\tinymce\TinyMce;


$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
$url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));

?>
  
	<div id="wrapper"><!-- start main wrapper -->

		<div class="headline_inner">
				<div class="row"> 
			       <div class=" container"><!-- start headline section --> 
						 <h2>Job Edit</h2>
						<div class="clearfix"></div>
					</div>
			</div><!-- end headline section -->
    	</div>
	
		 
		<div class="inner_page">
			<div class="container">
						<div class="container">
			<div class="row main">
				 
				<div class="xs-12 col-sm-12 main-center">
					<?php $form = ActiveForm::begin(['options' => ['class' => 'row','enctype'=>'multipart/form-data']]); ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input type="text" value="<?=$allpost->JobTitle;?>" name="PostJob[JobTitle]" required class="form-control">
                                    </div>
                                </div>
								<div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Key Skill</label>
										<?php
										$allskill=$allpost->jobRelatedSkills;
										$skillid='';$skillname='';
										foreach($allskill as $key=>$value)
										{
											$skillid.=$value->SkillId.',';
											$skillname.=$value->skill->Skill.', ';
										}
										?>
                                        <input type="text" value="<?=$skillname;?>" id="skills" required class="form-control">
										<div id="allskill" style="width: 100%; margin-top: 5px; height: 25px; padding: 3px;font-size:12px; color: #fff;"></div>
										<input type="hidden" value="<?=$skillid;?>" id="skillid" name="PostJob[KeySkill]" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" value="<?=$allpost->Location;?>" name="PostJob[Location]" required class="form-control">
                                    </div>
                                </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Experiencce  </label>
                                        <select class="questions-category form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="PostJob[Experience]">
                                            <option value="Fresher" <?php if($allpost->Experience=='Fresher') echo 'selected="selected"';?>>  Fresher</option>
                                            <option value="1" <?php if($allpost->Experience=='1') echo 'selected="selected"';?>>1 Years</option>
                                            <option value="2" <?php if($allpost->Experience=='2') echo 'selected="selected"';?>> 2 Years</option>
                                            <option value="3" <?php if($allpost->Experience=='3') echo 'selected="selected"';?>>3 Years</option>
                                        </select> 
                                    </div>
                                </div>
								 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Salary  </label>
                                        <select class="questions-category form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="PostJob[Salary]">
                                            <option value="Less than 10,000" <?php if($allpost->Salary=='Less than 10,000') echo 'selected="selected"';?>>  Less than 10,000</option>
                                            <option value="10000 +" <?php if($allpost->Salary=='10000 +') echo 'selected="selected"';?>>10000 + </option>
                                            <option value="20000 +" <?php if($allpost->Salary=='20000 +') echo 'selected="selected"';?>> 20000 +</option>
                                            <option value="30000 +" <?php if($allpost->Salary=='30000 +') echo 'selected="selected"';?>>30000 +</option>
											<option value="40000 +" <?php if($allpost->Salary=='40000 +') echo 'selected="selected"';?>>40000 +</option>
											<option value="50000 +" <?php if($allpost->Salary=='50000 +') echo 'selected="selected"';?>>50000 +</option>
											<option value="60000 +" <?php if($allpost->Salary=='60000 +') echo 'selected="selected"';?>>60000 +</option>
											<option value="70000 +" <?php if($allpost->Salary=='70000 +') echo 'selected="selected"';?>>70000 +</option>
											<option value="Negotiable" <?php if($allpost->Salary=='Negotiable') echo 'selected="selected"';?>>Negotiable</option>
                                        </select> 
                                    </div>
                                </div>
								
								
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Type</label>
                                        <select class="questions-category form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="PostJob[JobType]">
                                            <option value="Full Time" <?php if($allpost->JobType=='Full Time') echo 'selected="selected"';?>>Full Time</option>
                                            <option value="Part Time" <?php if($allpost->JobType=='Part Time') echo 'selected="selected"';?>>Part Time</option>
                                            <option value="Remote" <?php if($allpost->JobType=='Remote') echo 'selected="selected"';?>>Remote</option>
                                            <option value="Freelancer" <?php if($allpost->JobType=='Freelancer') echo 'selected="selected"';?>>Freelancer</option>
                                        </select> 
                                    </div>
                                </div>
								 
								  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Poition</label>
                                        <select class="questions-category form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="PostJob[PositionId]" required>
                                            <option value="">Select Position  </option>
										<?php
										foreach($position as $key=>$value)
										{
										?>
										<option value="<?=$value->PositionId;?>"  <?php if($allpost->PositionId==$value->PositionId) echo 'selected="selected"';?>><?=$value->Position;?></option>
										<?php
										}
										?>
                                        </select> 
                                    </div>
                                </div>
								  
								   <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Category</label>
                                        <select class="questions-category form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="PostJob[JobCategoryId]">
										<option value="">Select Job Ccategory</option>
                                            <?php
										foreach($jobcategory as $key=>$value)
										{
										?>
										<option value="<?=$value->JobCategoryId;?>" <?php if($allpost->JobCategoryId==$value->JobCategoryId) echo 'selected="selected"';?>><?=$value->CategoryName;?></option>
										<?php
										}
										?>
                                        </select> 
                                    </div>
                                </div>
								
								   
                                <div class="clearfix height-20"></div>
                                 <h5 class="page-head">Company Details</h5>
								   <div class="clearfix height-20"></div>
								 
								  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" name="PostJob[CompanyName]" required value="<?=$allpost->CompanyName;?>" class="form-control">
                                    </div>
                                </div>
								 
								 
								  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Email Address*</label>
                                        <input type="email"  name="PostJob[Email]" value="<?=$allpost->Email;?>" required class="form-control">
                                    </div>
                                </div>
								  
								  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Phone:</label>
                                        <input type="text" maxlength="10" onkeypress="return numbersonly(event)" onblur="return IsMobileno(this.value);" id="MobileNo" value="<?=$allpost->Phone;?>" name="PostJob[Phone]" class="form-control" required>
                                    </div>
                                </div>
								
								  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Website:	</label>
                                        <input type="text" value="<?=$allpost->Website;?>" class="form-control" name="PostJob[Website]">
                                    </div>
                                </div>
								 
								
								
								 
								  <div class="col-md-6 col-sm-6 col-xs-12">
								  <div class="form-group">
                                        <label>Country</label> 
										<input type="text" value="<?=$allpost->Country;?>" name="PostJob[Country]" required class="form-control">
								        </div>
								   </div>
								   
								   
								 <div class="col-md-6 col-sm-6 col-xs-12">
								     <div class="form-group">
                                        <label>State</label>
										 <input type="text" value="<?=$allpost->State;?>" name="PostJob[State]" required class="form-control">
								     </div>
							     </div>
											  <div class="col-md-6 col-sm-6 col-xs-12">
											   <div class="form-group">
												<label>City</label>
												<input type="text" value="<?=$allpost->City;?>" name="PostJob[City]" required class="form-control">
												</div>
										   </div>
										
										  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>No. of Vacancies:</label>
                                         <select class="questions-category form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="PostJob[NoofVacancy]">
                                            <option value="1" <?php if($allpost->NoofVacancy==1) echo 'selected="selected"';?>>  1</option>
                                            <option value="1-5" <?php if($allpost->NoofVacancy=='1-5') echo 'selected="selected"';?>> 1 - 5 </option>
                                            <option value="5-10" <?php if($allpost->NoofVacancy=='5-10') echo 'selected="selected"';?>> 5 - 10 </option>
											 <option value="15-20" <?php if($allpost->NoofVacancy=='15-20') echo 'selected="selected"';?>> 15 - 20 </option>
											  <option value="25-50" <?php if($allpost->NoofVacancy=='25-50') echo 'selected="selected"';?>> 25 - 50 </option> 
                                           
                                        </select> 
                                    </div>
                                </div>
								
								
								  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Shift:</label>
                                        <input type="text" value="<?=$allpost->JobShift;?>" name="PostJob[JobShift]" class="form-control">
                                    </div>
                                </div> 
										 
								 
								  <div class="col-md-12 col-sm-12 col-xs-12">
								    <div class="form-group"><label>Job Description*  </label>
										
								<?= $form->field($allpost, 'JobDescription')->widget(TinyMce::className(), [
									'options' => ['rows' => 6],'class'=>'form-control textarea-small',
									'language' => 'en_CA',
									'clientOptions' => [
										'plugins' => [
											"advlist autolink lists link charmap print preview anchor",
											"searchreplace visualblocks code fullscreen",
											"insertdatetime media table  paste spellchecker"
										],
										'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
									]
								])->label(false);?>
                              </div> 
							   
							  </div>
							  
							   <div class="col-md-6 col-sm-12 col-xs-12">
								    <div class="form-group"><label>Job Specification: </label>
								<?= $form->field($allpost, 'JobSpecification')->widget(TinyMce::className(), [
									'options' => ['rows' => 6],'class'=>'form-control textarea-small',
									'language' => 'en_CA',
									'clientOptions' => [
										'plugins' => [
											"advlist autolink lists link charmap print preview anchor",
											"searchreplace visualblocks code fullscreen",
											"insertdatetime media table  paste spellchecker"
										],
										'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
									]
								])->label(false);?>
                              </div> 
							   
							  </div>
							  
							  
							   <div class="col-md-6 col-sm-12 col-xs-12">
								    <div class="form-group"><label>Technical Guidance:  </label>
								<?= $form->field($allpost, 'TechnicalGuidance')->widget(TinyMce::className(), [
									'options' => ['rows' => 6],'class'=>'form-control textarea-small',
									'language' => 'en_CA',
									'clientOptions' => [
										'plugins' => [
											"advlist autolink lists link charmap print preview anchor",
											"searchreplace visualblocks code fullscreen",
											"insertdatetime media table  paste spellchecker"
										],
										'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
									]
								])->label(false);?>
                              </div> 
							   
							  </div>
							  
							  <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<div class="company-img">
										<?php
										if($allpost->docDetail)
										{
											$doc=$url.$allpost->docDetail->Doc;
										}
										else
										{
											$doc=$imageurl.'images/user.png';
										}
										?>
                                        <img src="<?=$doc;?>" class="img-responsive" alt="">
                                    </div>
								<label for="logo">Logo <span>(Optional)</span> <small>Max. file size: 8 MB.</small></label>
								<div class="upload">
									<input type="file" id="logo" name="PostJob[LogoId]" >
								</div>
						
							  </div>
							</div>
							
							<div class="col-md-12 col-sm-12 col-xs-12">
							
							<div class="form-group">
							<?= Html::submitButton('UPDATE JOB', ['class' => 'btn btn-default btn-green']) ?>
						</div>
						</div>
						
						
						
                           <?php ActiveForm::end(); ?>
					
				</div>
				
				 
				
			</div>
		</div>

      </div>
		    </div>
		<div class="border"></div>
        </div>