<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request Password Reset';
?>
	<div id="wrapper"><!-- start main wrapper -->
		 
		<div class="headline_inner">
				<div class="row"> 
			       <div class=" container"><!-- start headline section --> 
						 <h2>Employer Request to Reset Password   </h2>
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
										<input type="email" class="form-control"  name="AllUser[Email]" required  placeholder="Email address">
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