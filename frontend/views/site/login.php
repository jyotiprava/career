<?php
use yii\helpers\Url;
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
								<form class="omb_loginForm" action="" autocomplete="off" method="POST">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" class="form-control" name="username" placeholder="Email address">
									</div>
									<span class="help-block"></span>
														
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input  type="password" class="form-control" name="password" placeholder="Password">
									</div>
									  <span class="help-block"> &nbsp  </span> 
									 <!-- <span class="help-block">Password error</span>  -->

									<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
								</form>
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
	 
	 
	