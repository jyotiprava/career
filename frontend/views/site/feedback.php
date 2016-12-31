<?php
$this->title = 'Feedback';
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
$url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
use dosamigos\tinymce\TinyMce;
?>
<!-- start main wrapper --> 
	<div id="wrapper">
		
        <div class="headline_inner">
				<div class="row"> 
			       <div class=" container"><!-- start headline section --> 
						 <h2> Feedback  </h2>
						<div class="clearfix"></div>
					</div>
			</div><!-- end headline section -->
    	</div>
    
		<div class="inner_page"><!-- Start Recent Job -->
			<div class="container">
				<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <?php $form = ActiveForm::begin(['options' => ['class' => 'omb_loginForm','enctype'=>'multipart/form-data']]); ?>
									 <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Name</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="Feedback[Name]" required placeholder="Name">
                                            </div>
                                        </div>
									</div>
									<span class="help-block"></span>
                                    
                                     <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Email</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
										<input type="email" class="form-control" name="Feedback[Email]" required placeholder="Email address">
                                            </div>
                                        </div>
									</div>
									<span class="help-block"></span>
                                    
                                     <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Designation</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="Feedback[Designation]" required placeholder="Designation">
                                            </div>
                                        </div>
									</div>
									<span class="help-block"></span>
                                    
                                     <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Company Name</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="Feedback[Companyname]" required placeholder="Company Name">
									</div>
                                        </div>
                                     </div>
									<span class="help-block"></span>
                                    
                                    <div class="form-group"><label>Message:  </label>
								<?= $form->field($feedback, 'Message')->widget(TinyMce::className(), [
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
                                    
                                    <div class="form-group">
                                        <label for="confirm" class="cols-sm-2 control-label">Upload Photo  </label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                    <div class="input-group" style="font-size: 14px;">
                                                <input type="file" name="Feedback[Logo]" accept=
"application/jpeg, application/png, application/jpg">
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Facebook Link</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                                <input type="url" class="form-control" name="Feedback[Facebooklink]"  placeholder="Facebook Link" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Twitter Link</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                                <input type="url" class="form-control" name="Feedback[TwitterLink]"  placeholder="Twitter Link" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Linkedin Link</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
                                                <input type="url" class="form-control" name="Feedback[LinkedinLink]" id="address"  placeholder="Linkedin Link" />
                                            </div>
                                        </div>
                                    </div>

									<input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Submit" >
						
				<?php ActiveForm::end(); ?>
				</div>
					
					<div class="col-lg-3  col-md-3 col-sm-3 col-xs-12"  id="right-side">
						 
							<div class="clearfix"></div>
						
						
							<!--adban_block main -->
								<div class="adban_block">
							      <img src="images/adban_block/ban.jpg"> 
							    </div>
						   <!-- adban_block  main -->
								
								
						</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div><!-- end Recent Job -->
		
	
</div><!-- end main wrapper -->