<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Simple login form -->
				 <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
					<div class="panel panel-body login-form">
						<div class="text-center">
							<!--<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>-->
							<img src="bassets/images/logo.png" style="width: 150px;"/>
							<h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<?= $form->field($model, 'UserName')->textInput(['autofocus' => true,'placeholder'=>'Username'])->label(false) ?>
							<div class="form-control-feedback">
								<i class="icon-user text-muted"></i>
							</div>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<?= $form->field($model, 'Password')->passwordInput(['placeholder'=>'Password'])->label(false) ?>
							<div class="form-control-feedback">
								<i class="icon-lock2 text-muted"></i>
							</div>
						</div>

						<div class="form-group">
							<?= Html::submitButton('Sign In <i class="icon-circle-right2 position-right"></i>', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
						</div>

						<div class="text-center" style="display: none;">
							<a href="login_password_recover.html">Forgot password?</a>
						</div>
					</div>
				<?php ActiveForm::end(); ?>
				<!-- /simple login form -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->