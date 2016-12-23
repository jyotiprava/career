<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Change Password';
?>

	<div id="wrapper"><!-- start main wrapper -->
		 
		<div class="headline_inner">
				<div class="row"> 
			       <div class=" container"><!-- start headline section --> 
						 <h2>Employer Change Password   </h2>
						<div class="clearfix"></div>
					</div>
			</div><!-- end headline section -->
    	</div>
	
		 
		<div class="inner_page">
			<div class="container">
		
 
					<div class="omb_login"> 
						

						<div class="row omb_row-sm-offset-3">
							<div class="col-xs-12 col-sm-6">	
								<?php $form = ActiveForm::begin(['options' => ['class' => 'omb_loginForm']]); ?>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="password" class="form-control"  name="AllUser[CPassword]" required  placeholder="Current Password">
									</div>
									<span class="help-block"></span>
									
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="password" class="form-control" id="password"  name="AllUser[NPassword]" required  placeholder="New Password">
										<input type="hidden" name="AllUser[UserId]" value="<?php echo Yii::$app->session['Employerid']; ?>"/>
									</div>
									<span class="help-block"></span>
									
									   <div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="password" class="form-control"  onblur="return ConfirmPassword(this.value);" id="confirmpassword"  required placeholder="Confirm New Password">
									</div>
									
									<span class="help-block"></span>
														
								 
									  <span class="help-block"> &nbsp  </span> 
									 <!-- <span class="help-block">Password error</span>  -->

									<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
								<?php ActiveForm::end(); ?>
							</div>
						</div>
						 
						
					 
					</div>

      </div>


 
		    </div>
		 
		
		
		<div class="border"></div>
        </div>