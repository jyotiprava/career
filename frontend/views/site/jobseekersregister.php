<?php
$this->title = 'Job seekers';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
?>
<div id="wrapper"><!-- start main wrapper -->
 
		<div class="headline_inner">
				<div class="row"> 
			       <div class=" container"><!-- start headline section --> 
						 <h2>  Job seekers  </h2></h2>
						<div class="clearfix"></div>
					</div>
			</div><!-- end headline section -->
    	</div>
	
		 
		<div class="inner_page">
			<div class="container">
			<div class="main">
		 
				<div class="main-center">

					<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal','enctype'=>'multipart/form-data']]); ?>
					<div class="row">
					<div class="col-xs-12 col-sm-6">
 <h5 class="page-head">Personal</h5>
					
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<?php
							if(isset(Yii::$app->session['SocialName']))
							   {
								$name='value="'.Yii::$app->session['SocialName'].'" readonly';
							   }
							   else
							   {
								$name='';
							   }
							   if(isset(Yii::$app->session['SocialEmail']))
							   {
								$email='value="'.Yii::$app->session['SocialEmail'].'" readonly';
							   }
							   else
							   {
								$email='';
							   }
							?>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" <?=$name;?> name="AllUser[Name]" id="name"  placeholder="Enter your Name" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" <?=$email;?> name="AllUser[Email]" id="email"  placeholder="Enter your Email" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">  Mobile No</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="AllUser[MobileNo]" id="MobileNo"  placeholder="Enter your MobileNo" onkeypress="return numbersonly(event)" onblur="return IsMobileno(this.value);" maxlength="10" required/>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="AllUser[Address]" id="address"  placeholder="Enter your Address" required/>
								</div>
							</div>
						</div>
							
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Upload Photo  </label>
							<div class="cols-sm-10">
								<div class="input-group">
										<div class="input-group" style="font-size: 14px;">
								    <input type="file" name="AllUser[PhotoId]" accept=
"application/jpeg, application/png, application/jpg">
										</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Country  </label>
							<div class="cols-sm-12">
								<div class="input-group full">
									<select class="questions-category countries form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" id="countryId" name="AllUser[Country]" required>
										<option value="">Select Country</option>
										<option value="India" countryid="101" selected="selected">India</option></select>
								</div>
							</div>
						</div>
						
						
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Select State  </label>
							<div class="cols-sm-12">
								<div class="input-group full">
									 <select class="questions-category states form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" id="stateId" name="AllUser[State]" required>
											<option value="">Select State  </option>
										</select>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">  City  </label>
						 
								<div class="input-group full">
									 <select class="questions-category cities form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" id="cityId" name="AllUser[City]" required>
										<option value="">Select City  </option>
										</select>
								 
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Pincode  </label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="AllUser[PinCode]" id="confirm" placeholder="Pincode" maxlength="6" required onkeypress="return numbersonly(event)" autocomplete="off">
								</div>
							</div>
						</div>
						
						

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="AllUser[Password]" id="password"  placeholder="Enter your Password" required autocomplete="off"/>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password" required onblur="if($(this).val()!=$('#password').val()){alert('Password  and Confirm password Must Be Same');$(this).val('');setTimeout(function() {  $('#password').focus();return false; }, 10);}"/>
								</div>
							</div>
						</div>
			  
			
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Upload CV  </label>
							<div class="cols-sm-10">
								<div class="input-group">
										<div class="input-group" style="font-size: 14px;">
								    <input type="file" name="AllUser[CVId]" accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf">
										</div>
								</div>
							</div>
						</div>
						
			</div> 
						
						
						
			<!--Education-->
						<div class="col-xs-12 col-sm-6">
  <h5  class="page-head">Education</h5>
					
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Highest Qualification</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-file-text" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="AllUser[HighestQualification]" id="hq"  placeholder="Highest Qualification" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Course  </label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-files-o" aria-hidden="true"></i></span>
									<select class="questions-category form-control select2-hidden-accessible" id="empcourse" name="AllUser[CourseId]" onchange="if($('#empcourse option:selected').text()=='Others'){$('#otc').append('<input type=&#34;text&#34; class=&#34;form-control&#34; name=&#34;AllUser[OtherCourse]&#34;   placeholder=&#34;Course&#34; required/>');} else{$('#otc').html('');}"  required>
										<option value="">Select Course  </option>
										<?php
										foreach($course as $key=>$value)
										{
										?>
										<option value="<?=$value->CourseId;?>"><?=$value->CourseName;?></option>
										<?php
										}
										?>
								       </select>
								       <span id="otc">
										
								       </span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">  University / College  </label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="AllUser[University]" id="University"  placeholder="University/College" required/>
								</div>
							</div>
						</div> 

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Year</label>
							<div class="cols-sm-8">
								<div class="input-group" style="width: 33%;float: left;">
									<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
									<input type="text" class="form-control educationdatepicker" name="AllUser[DurationFrom]" readonly style="cursor: pointer;background: #fff;" id="dfrom" autocomplete="off" placeholder="From" required maxlength="4" onkeypress="return numbersonly(event)" />
								</div>
								
								<div class="input-group" style="width: 33%;float: left;margin-left: 10%;">
									<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
									<input type="text" class="form-control educationdatepicker" name="AllUser[DurationTo]" readonly style="cursor: pointer;background: #fff;" id="dto" autocomplete="off"  placeholder="To" required maxlength="4" onkeypress="return numbersonly(event)" onchange="if(new Date($(this).val()).getTime()<=new Date($('#dfrom').val()).getTime()){alert('Wrong Year Duration');$(this).val('');}"/>
								</div>
							</div>
							
						</div>
						
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Skills  </label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="text" placeholder=" " name="AllUser[RawSkill]"  id="skills" required class="form-control">
										
										<input type="hidden" id="skillid" name="AllUser[SkillId]" />
								</div>
								<div id="allskill" style="width: 100%; margin-top: 5px;margin-left: 110px; height: 25px; padding: 3px;font-size:12px; color: #fff;"></div>
							</div>
						</div>
						
						
						
						  <h5  class="page-head">Work Experience</h5>
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">  Company name  </label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="AllUser[CompanyName]" id="CompanyName"  placeholder="Company name"/>
								</div>
							</div>
						</div> 
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">  Position    </label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
									
									<select class="questions-category form-control select2-hidden-accessible" name="AllUser[PositionId]" id="emppos" onchange="if($('#emppos option:selected').text()=='Others'){$('#pos').append('<input type=&#34;text&#34; class=&#34;form-control&#34; name=&#34;AllUser[OtherPosition]&#34;   placeholder=&#34;Position&#34; required/>');} else{$('#pos').html('');}">
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
									<span id="pos"></span>
								</div>
							</div>
						</div> 
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">  Year    </label>
							<div class="cols-sm-5">
								<div class="input-group" style="width: 33%;float: left;">
									<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
									<input type="text" class="form-control educationdatepicker" name="AllUser[YearFrom]" id="YearFrom" readonly style="cursor: pointer;background: #fff;" autocomplete="off"  placeholder="From" maxlength="4" onkeypress="return numbersonly(event)"/>
								</div>
								<div class="input-group" style="width: 33%;float: left;margin-left: 10%;">
									<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
									<input type="text" class="form-control educationdatepicker" name="AllUser[YearTo]" id="YearTo" readonly style="cursor: pointer;background: #fff;" autocomplete="off"  placeholder="To"  maxlength="4" onkeypress="return numbersonly(event);" onchange="if(new Date($(this).val()).getTime()<=new Date($('#YearFrom').val()).getTime()){alert('Wrong Year Duration');$(this).val('');}"/>
								</div>
							</div>
							
						</div> 
						
						
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">  Experience    </label>
							<div class="cols-sm-10">
								<div class="input-group full">
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
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">  Salary</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
									<select class="questions-category form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="AllUser[Salary]">
                                            <option value="0 - 1.5"> 0 - 1.5 Lakh</option>
                                            <option value="1.5 - 3">1.5 - 3 Lakh</option>
                                            <option value="3 - 6">3 - 6 Lakh</option>
											<option value="6 - 10">6 - 10 Lakh</option>
											<option value="10 - 15">10 - 15 Lakh</option>
											<option value="15 - 25">15 - 25 Lakh</option>
											<option value="Negotiable">Negotiable</option>
                                        </select> 
								</div>
							</div>
						</div>
						
							
						
						
						
			   
			</div> 
			
			<!--Education-->
			
			
	</div>
						
						
						
						
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label"><input type="checkbox" id="check_box" class=""  required>  </label>
							<div class="cols-sm-10 info">
									I agreed to the Terms and Conditions governing the use of Carrer Bugs.
I have reviewed the default Mailer & Communications settings.
Register Now
							</div>
						</div>
						
						
						
					

						<div class="form-group ">
							<?= Html::submitButton('Register', ['class' => 'btn btn-primary btn-lg btn-block login-button']) ?>
						</div>
						 
					<?php ActiveForm::end(); ?>
					
					
					
					
					
					
					
				</div>
			</div>
		 

      </div>


 
		    </div>
		 
		
		
		
		<div class="border"></div>
	 
					 
</div>