<?php
$this->title = 'Edit Company Profile Pages';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
$url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
?>
	<div id="wrapper"><!-- start main wrapper -->
	 
		 
		<div class="inner_page second">
			<div class="container">
			  <div  id="profile-desc">
			   <div class="col-md-2 col-sm-2 col-xs-12">
			                 <div class="user-profile">
                                    <img src="<?php echo $url.$employer->logo->Doc ;?>" alt="<?php //secho $employer->Name ;?>" class="img-responsive center-block ">
                                    <h3>c</h3>
                                </div> 
			      	</div>
		         <div class="col-md-10 col-sm-10 col-xs-12"> 
                            <div class="job-short-detail" id="edit_profile_page">
                                <div class="heading-inner">
                                    <p class="title"> Company / Consultant details</p>
									
									<a href="">  <i class="fa fa-floppy-o orange"></i> Save Changes  </a>
                                </div>
								 
                                <dl>
                                     
                                    <dt>Company Type</dt>
                                    <dd><select name="AllUser[IndustryId]" required class="form-control">
                    
										<option selected="selected" value="">- Select an Industry -</option>
										<?php foreach($industry as $key=>$value){?>
										<option value="<?php echo $key;?>" <?php if($key==$employer->IndustryId){ echo "selected"; } ?> ><?=$value;?></option>
										<?php } ?>
								</select>
				    </dd>


                                   <dt> Company Email </dt>
                                   <dd><input type="text" class="form-control" readonly required name="AllUser[Email]" id="Email" value="<?php echo $employer->Email ;?>" placeholder="Enter your Email"></dd>
				   <dt>Address:</dt>
                                   <dd><input type="text" class="form-control" required name="AllUser[Address]" id="Address" value="<?php echo $employer->Address ;?>" placeholder="Address"></dd>
				   <dt> Mobile Number  </dt> 
				   <dd><input type="text" class="form-control" required name="AllUser[MobileNo]" id="MobileNo" onkeypress="return numbersonly(event)" onblur="return IsMobileno(this.value);" value="<?php echo $employer->MobileNo ;?>" placeholder="MobileNo"></dd>
				   <dt>  Contact Number </dt>
				   <dd><input type="text" class="form-control"required name="AllUser[ContactNo]" id="ContactNo" value="<?php echo $employer->ContactNo ;?>" placeholder="ContactNo"></dd>
				   <dt>City:</dt> 
				   <dd><input type="text" class="form-control" name="email" id="email" placeholder="Islamabad, Rawalindi"></dd>

                                    <dt>State:</dt> <dd></dd>
									<dd><input type="text" class="form-control" name="email" id="email" placeholder="North Vega "></dd>
                                    <dt>Country:</dt>                                   
									<dd><select class="questions-category countries form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="AllUser[Country]" required id="countryId">
										<option value="">Select Country</option>
										<option value="India" countryid="101">India</option>
										</select>
									</dd>
				   <dt>State:</dt> <dd><select class="questions-category states form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="AllUser[State]" required id="stateId">
											<option value="">Select State  </option>
										</select>
				   </dd>
                                    <dt>City:</dt> 
									<dd> <select class="questions-category cities form-control select2-hidden-accessible"  name="AllUser[City]" tabindex="-1" aria-hidden="true" required id="cityId">
														<option value="">Select City  </option>
										</select>
								 </dd>
                                   <dt>Pincode:</dt>  
									<dd><input type="text" class="form-control" name="email" id="email" placeholder="Pincode"></dd>
  
                                </dl>
                            </div>
 
                        </div>
						 
	 <div class="clearfix"> </div>
	
						
				<div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="resume-box">
                                <div class="heading-inner">
                                    <p class="title">  Company Description </p>
                                </div>
                                <div class="row education-box">
                                    
                                    <div class="col-xs-12 col-md-12 col-sm-12">
                                        <div class="degree-info">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet.</p>
                                             </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
		<div class="clearfix"> </div>
  </div>
</div>
       </div>
		<div class="border"></div>
</div>