<?php
$this->title = 'Post Job';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
?>
  
	<div id="wrapper"><!-- start main wrapper -->

		<div class="headline_inner">
				<div class="row"> 
			       <div class=" container"><!-- start headline section --> 
						 <h2>  Post a Job   </h2>
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
                                        <input type="text" placeholder=" " name="PostJob[JobTitle]" required class="form-control">
                                    </div>
                                </div>
								<div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Key Skill</label>
                                        <input type="text" placeholder=" " id="skills" required class="form-control">
										<input type="hidden" id="skillid" name="PostJob[KeySkill]" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" placeholder=" " name="PostJob[Location]" required class="form-control">
                                    </div>
                                </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Experiencce  </label>
                                        <select class="questions-category form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="PostJob[Experience]">
                                            <option value="Fresher">  Fresher</option>
                                            <option value="1">1 Years</option>
                                            <option value="2"> 2 Years</option>
                                            <option value="3">3 Years</option>
                                        </select> 
                                    </div>
                                </div>
								 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Salary  </label>
                                        <select class="questions-category form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="PostJob[Salary]">
                                            <option value="Less than 10,000">  Less than 10,000</option>
                                            <option value="10000 +">10000 + </option>
                                            <option value="20000 +"> 20000 +</option>
                                            <option value="30000 +">30000 +</option>
											<option value="40000 +">40000 +</option>
											<option value="50000 +">50000 +</option>
											<option value="60000 +">60000 +</option>
											<option value="70000 +">70000 +</option>
											<option value="Negotiable">Negotiable</option>
                                        </select> 
                                    </div>
                                </div>
								
								
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Type</label>
                                        <select class="questions-category form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="PostJob[JobType]">
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Remote">Remote</option>
                                            <option value="Freelancer">Freelancer</option>
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
										<option value="<?=$value->PositionId;?>"><?=$value->Position;?></option>
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
										<option value="<?=$value->JobCategoryId;?>"><?=$value->CategoryName;?></option>
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
                                        <input type="text" name="PostJob[CompanyName]" required placeholder="" class="form-control">
                                    </div>
                                </div>
								 
								 
								  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="" name="PostJob[Email]" required class="form-control">
                                    </div>
                                </div>
								  
								  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Phone:</label>
                                        <input type="text" maxlength="10" onkeypress="return numbersonly(event)" onblur="return IsMobileno(this.value);" id="MobileNo" placeholder="" name="PostJob[Phone]" class="form-control" required>
                                    </div>
                                </div>
								
								  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Website:	</label>
                                        <input type="text" placeholder="" class="form-control" name="PostJob[Website]">
                                    </div>
                                </div>
								 
								
								
								 
								  <div class="col-md-6 col-sm-6 col-xs-12">
								  <div class="form-group">
                                        <label>Country</label> 
                                        <select class="questions-category countries form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true"  id="countryId" name="PostJob[Country]">
										<option value="">Select Country</option>
										<option value="India" countryid="101">India</option>
										</select>
								        </div>
								   </div>
								   
								   
								 <div class="col-md-6 col-sm-6 col-xs-12">
								     <div class="form-group">
                                        <label>State</label>
										 <select class="questions-category states form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true"  id="stateId" name="PostJob[State]" required>
										<option value="">Select State</option>
										</select> 
								     </div>
							     </div>
											  <div class="col-md-6 col-sm-6 col-xs-12">
											   <div class="form-group">
												<label>City</label>
												<select class="questions-category cities form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true"  id="cityId" name="PostJob[City]" required>
												<option value="">Select City</option>
											</select>
												</div>
										   </div>
										
										  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>No. of Vacancies:</label>
                                         <select class="questions-category form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="PostJob[NoofVacancy]">
                                            <option value="1">  1</option>
                                            <option value="1-5"> 1 - 5 </option>
                                            <option value="5-10"> 5 - 10 </option>
											 <option value="15-20"> 15 - 20 </option>
											  <option value="25-50"> 25 - 50 </option> 
                                           
                                        </select> 
                                    </div>
                                </div>
								
								
								  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Shift:</label>
                                        <input type="text" placeholder="" name="PostJob[JobShift]" class="form-control">
                                    </div>
                                </div> 
										 
								 
								  <div class="col-md-12 col-sm-12 col-xs-12">
								    <div class="form-group"><label>Job Description*  </label>
								 <textarea class="form-control textarea" name="PostJob[JobDescription]"></textarea>
                              </div> 
							   
							  </div>
							  
							   <div class="col-md-6 col-sm-12 col-xs-12">
								    <div class="form-group"><label>Job Specification: </label>
								 <textarea class="form-control textarea-small" name="PostJob[JobSpecification]"></textarea>
                              </div> 
							   
							  </div>
							  
							  
							   <div class="col-md-6 col-sm-12 col-xs-12">
								    <div class="form-group"><label>Technical Guidance:  </label>
								 <textarea class="form-control textarea-small" name="PostJob[TechnicalGuidance]"></textarea>
                              </div> 
							   
							  </div>
							  
							  <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label for="logo">Logo <span>(Optional)</span> <small>Max. file size: 8 MB.</small></label>
								<div class="upload">
									<input type="file" id="logo" name="PostJob[LogoId]" >
								</div>
						
							  </div>
							</div>
							
							<div class="col-md-12 col-sm-12 col-xs-12">
							
							<div class="form-group">
							<?= Html::submitButton('POST A JOB', ['class' => 'btn btn-default btn-green']) ?>
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