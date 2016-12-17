<?php
$this->title = 'Employers Register';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
?>
<div id="wrapper"><!-- start main wrapper --> 
	
		<div class="headline_inner">
				<div class="row"> 
			       <div class=" container"><!-- start headline section --> 
						 <h2>  Employers Register </h2>
						<div class="clearfix"></div>
					</div>
			</div><!-- end headline section -->
    	</div>
	
		 
		<div class="inner_page">
			<div class="container">
		
 
						<div class="container">
			<div class="row main">
				 
				<div class="xs-12 col-sm-8 main-center">
					<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal','enctype'=>'multipart/form-data']]); ?>					
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label"> Company Type  </label>
							<div class="cols-sm-10">
								<div class="input-group">  
									  <div class="radio float-left-widtth3">
										<label>
										  <input type="radio" selected value="2" name="AllUser[UserTypeId]" required="">
										  Company
										</label>
									  </div>
									  <div class="radio float-left-widtth3">
										<label>
										  <input type="radio" value="3" name="AllUser[UserTypeId]" required="">
										   Consultancy
										</label>
									  </div> 
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label"> Company Name  </label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="AllUser[Name]" id="Name"  placeholder="Company Name"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label"> Company Type  </label>
							<div class="cols-sm-10">
								<div class="input-group full">
								<select name="AllUser[IndustryId]" class="form-control bfh-states">
                    
										<option selected="selected" value="-1">- Select an Industry -</option>
								</select>
             
								</div>
							</div>
						</div>
						
						

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="AllUser[Email]" id="Email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label"> Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="AllUser[Address]" id="Address"  placeholder="Address"/>
									
								</div>
							</div>
						</div> 
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">  Mobile No</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="AllUser[MobileNo]" id="MobileNo"  placeholder="Mobile No"/>
								</div>
							</div>
						</div> 
						
						<!--<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">  Contact No</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Contact Nos"/>
									
								</div>
							</div>
						</div> -->

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="AllUser[Password]" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label"> Country  </label>
							<div class="cols-sm-12">
								<div class="input-group full">
									<select class="questions-category countries form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="AllUser[Country]"  id="countryId">
										<option value="">Select Country</option>
										</select>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Select State  </label>
							<div class="cols-sm-12">
								<div class="input-group full">
									 <select class="questions-category states form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="AllUser[State]"  id="stateId">
											<option value="">Select State  </option>
										</select>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">  City  </label>
						 
								<div class="input-group full">
									 <select class="questions-category cities form-control select2-hidden-accessible"  name="AllUser[City]" tabindex="-1" aria-hidden="true"  id="cityId">
														<option value="">Select City  </option>
										</select>
								 
							</div>
						</div>
						
						
						
				      <div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Pincode  </label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="AllUser[Pincode]" id="Pincode"  placeholder="Pincode"/>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Description </label>
							<div class="cols-sm-10">
								<div class="input-group full">
									<textarea name="AllUser[CompanyDesc]" class="form-control textarea"></textarea></div>
							</div>
						</div>
						 
						 
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label"><input type="checkbox" id="agreed"  >  </label>
							<div class="cols-sm-10 info">
									I agreed to the Terms and Conditions  
							</div>
						</div>
						
						
						<div class="form-group ">
							<input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Register" >
						</div>
						 
					<?php ActiveForm::end(); ?>
				</div>
				
				
				
				
	
  <div class="xs-12 col-sm-4">
				
				<div class="side_bar">
							   <h2><a href="">Contact us </a> or <a href=""> Request information</a></h2>
							 
							
							<div class="row margin-bottom-10"> 
							 <div class="form-group">
							   <div class="col-xs-4 col-sm-4">
							    <label for="name" class="cols-sm-2 small">  India   </label>
							  </div>
					         <div class="col-xs-8 col-sm-8">
								<div class="input-group">
									 03340416254
									 <br> 03340416254
								</div>
							  </div>
						      </div>
							</div>
							 
							<div class="row margin-bottom-10"> 
							 <div class="form-group">
							   <div class="col-xs-4 col-sm-4">
							    <label for="name" class="cols-sm-2 small">Email</label>
							  </div>
					         <div class="col-xs-8 col-sm-8">
								<div class="input-group">
									 info@careerbugs.com
									 sales@careerbugs.com
								</div>
							  </div>
						      </div>
							</div>
							
							
							<div class="row margin-bottom-10"> 
							 <div class="form-group">
							   <div class="col-xs-4 col-sm-4">
							    <label for="name" class="cols-sm-2 small">Address</label>
							  </div>
					         <div class="col-xs-8 col-sm-8">
								<div class="input-group">
									CF318 Sector-1 Saltlake<br>Kolkata-700064
								</div>
							  </div>
						      </div>
							</div>
							
							
							
							
							
							  
							 </div>
					 </div>
				
				
				
				
				
				
			</div>
		</div>

      </div>


 
		    </div>
		 
		
		
		
		<div class="border"></div>
</div>