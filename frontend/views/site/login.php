<?php
$this->title = 'Login';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div id="wrapper"><!-- start main wrapper -->
	 
	
		<div class="headline_inner">
				<div class="row"> 
			       <div class=" container"><!-- start headline section --> 
						 <h2>Login</h2>
						<div class="clearfix"></div>
					</div>
			</div><!-- end headline section -->
    	</div>
	
		 
		<div class="inner_page">
			<div class="container">
		
 
					<div class="omb_login"> 
						

						<div class="row omb_row-sm-offset-3">
							<div class="col-xs-12 col-sm-6">	
								<?php $form = ActiveForm::begin(['options' => ['class' => 'omb_loginForm','enctype'=>'multipart/form-data']]); ?>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="email" class="form-control" name="AllUser[Email]" required placeholder="Email address">
									</div>
									<span class="help-block"></span>
														
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input  type="password" class="form-control" name="AllUser[Password]" required placeholder="Password">
									</div>
									  <span class="help-block"> &nbsp  </span> 
									 <!-- <span class="help-block">Password error</span>  -->

									<input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Log In" >
						
								<?php ActiveForm::end(); ?>
							</div>
						</div>
						<div class="row omb_row-sm-offset-3">
							<div class="col-xs-12 col-sm-3">
								  <p class="center-left"> Not Yet Register ?  <a  href="<?= Url::toRoute(['site/register'])?>"  class="color"> Register Now </a></p>
							</div>
							<div class="col-xs-12 col-sm-3">
								<p class="omb_forgotPwd">
									<a  href="<?= Url::toRoute(['site/forgetpassword'])?>" >Forgot password?</a>
								</p>
							</div>
						</div>
					 
						
						<div class="row omb_row-sm-offset-3 omb_loginOr">
							<div class="col-xs-12 col-sm-6">
								<hr class="omb_hrOr">
								<span class="omb_spanOr">or</span>
							</div>
						</div>

						
	    	<div class="row omb_row-sm-offset-3 omb_socialButtons">
							<div class="col-xs-4 col-sm-2">
								<a href="#" class="btn btn-lg btn-block omb_btn-facebook">
									<i class="fa fa-facebook visible-xs"></i>
									<span class="hidden-xs">Facebook</span>
								</a>
							</div>
							<div class="col-xs-4 col-sm-2">
								<a href="#" class="btn btn-lg btn-block omb_btn-twitter">
									<i class="fa fa-twitter visible-xs"></i>
									<span class="hidden-xs">Twitter</span>
								</a>
							</div>	
							<div class="col-xs-4 col-sm-2">
								<a href="#" class="btn btn-lg btn-block omb_btn-google">
									<i class="fa fa-google-plus visible-xs"></i>
									<span class="hidden-xs">Google+</span>
								</a>
							</div>	
						</div>
					</div>
                             </div>
		    </div>
		 
		
		
		<div class="border"></div>
		  
	 
</div>
	 
	 
	