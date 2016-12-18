<?php
$this->title = 'Employers Login';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
?>
	<div id="wrapper"><!-- start main wrapper --> 
    	<div class="headline_inner">
				<div class="row"> 
			       <div class=" container"><!-- start headline section --> 
						 <h2>Employers Login</h2>
						<div class="clearfix"></div>
					</div>
			</div><!-- end headline section -->
    	</div>
	
		 
		<div class="inner_page">
			<div class="container">
		
 
					<div class="col-xs-12 col-sm-7">  
						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<?php $form = ActiveForm::begin(['options' => ['class' => 'omb_loginForm','enctype'=>'multipart/form-data']]); ?>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" class="form-control" name="AllUser[Email]" required  placeholder="Email address">
									</div>
									<span class="help-block"></span>
														
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input  type="password" class="form-control" required name="AllUser[Password]" placeholder="Password">
									</div>
									  <span class="help-block"> &nbsp  </span> 
									 <!-- <span class="help-block">Password error</span>  -->

									<input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Sign In" >
						
								<?php ActiveForm::end(); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								 <p class="left-algn">
									 New Client  <a  href="<?= Url::toRoute(['site/employersregister'])?>"  class="color"> Register Now </a>
							     </p>
							</div>
							<div class="col-xs-12 col-sm-6">
								<p class="omb_forgotPwd">
									<a  href="<?= Url::toRoute(['site/employeeforgetpassword'])?>" >Forgot password?</a>
								</p>
							</div>
						</div> 
					</div>
					
					
					
					<div class="col-xs-12 col-sm-4 float-right">   
						<div class="row"> 
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
		 
		
		
		<div class="border"></div>
        </div>