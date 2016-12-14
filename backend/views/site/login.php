<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-relative">
<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												Sign In										</h4>

											<div class="space-6"></div>
                                                                                         <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                                                                                        <?= $form->field($model, 'UserName')->textInput(['autofocus' => true,'placeholder'=>'Username'])->label(false) ?>
															<i class="ace-icon fa fa-user"></i>												      </span>													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                                                                                        <?= $form->field($model, 'Password')->passwordInput(['placeholder'=>'Password'])->label(false) ?>
															<i class="ace-icon fa fa-lock"></i>														</span>													</label>

													<div class="space"></div>

													<div class="clearfix">
														<!--<label class="inline" for="loginform-rememberme">
                                                                                                                    <input type="hidden" value="0" name="LoginForm[rememberMe]">
                                                                                                                        <input type="checkbox" value="1" name="LoginForm[rememberMe]" class="ace" id="loginform-rememberme">
															<span class="lbl"> Remember Me</span>												    </label>-->
															
                                                                                                                <p class="help-block help-block-error"></p>    
                                                                                                                <?= Html::submitButton('<i class="ace-icon fa fa-key"></i> <span class="bigger-110">Login</span>', ['class' => 'width-35 pull-right btn btn-sm btn-primary blue1', 'name' => 'login-button']) ?>
                                                                                                                
													</div>
													<div class="space-4"></div>
												</fieldset>
											  <?php ActiveForm::end(); ?>

										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
</div>
