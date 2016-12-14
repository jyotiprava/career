<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
 $session = Yii::$app->session;
 $csrfToken = Yii::$app->request->getCsrfToken();
$url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
$imageurl=Yii::$app->getUrlManager()->getBaseUrl();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	<script>
function onlyAlphabets(e, t) {
            try {
			 alert(charCode);
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode==32) || (charCode==8))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }
			
function validateEmail(sEmail) {
var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
}

function validemail()
{

var email=$('#emailid').val();
if (!validateEmail(email))
{

alert('Invalid Email Address');
$('#emailid').val('');
$('#emailid').focus();
return false;
}
}
        
function numbersonly(e)
{
var unicode=e.charCode? e.charCode : e.keyCode;
if (unicode!=8){ //if the key isn't the backspace key (which we should allow);
if (unicode<48||unicode>57) //if not a number
return false //disable key press
}
}
	</script>
	
	
	<style>
 @media print
   {
      #w0 { display: none;}
	  #heading { display: none; }
	  #printimage,#breadcrumbs,.header { display: none; }
   }
</style>
</head>
<body class="no-skin" style="background: #fff;">
<?php $this->beginBody() ?>
<style>
		.no-skin .nav-list>li>a{ background:#5c80f2; color:#fff;}
		.table-header{ background:#28265a;}
		#ace-settings-container{ display:none;}
		.breadcrumbs{ }
		.ace-nav>li.light-blue>a{ background:#5b80f2;}
		.label-primary, .label.label-primary, .badge.badge-primary, .badge-primary {background-color: #fff;color: #000;}
		</style>


    <div class="main-container" id="main-container">
    		<div id="navbar" class="navbar navbar-default" style="background:#fff; border-bottom:2px solid #5c80f2; margin-bottom:0px;">
			
			<div class="navbar-container" id="navbar-container">
				

				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<img src="<?= $imageurl ?>/images/logo.png" width="250" >
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue" style="margin-top:20px; margin-right:10%;">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
									<small>Welcome,</small>
									<?= Yii::$app->user->identity->Name ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									 <a href="<?= Url::toRoute(['site/changepassword','id' => Yii::$app->user->identity->LoginId])?>">
										<i class="ace-icon fa fa-cog"></i>
										Change Password
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?= Url::to(['site/logout'])?>" data-method="post">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>
            
            
            
            
            
            
            <div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				

				<ul class="nav nav-list">
					<li class="topmenu1">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon" style="float:left;"><img src="<?= $imageurl ?>/images/home.png" /></i>
							<span class="menu-text" style="float:left; margin-top:3px; margin-left:5px;">Post</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						
						<ul class="submenu">
							<li class="">
								 <a href="<?= Url::toRoute(['weighbridge/create'])?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Post
								</a>
								<b class="arrow"></b>
							</li>
							
							<li class="">
								 <a href="<?= Url::toRoute(['weighbridge/index','type'=>'view'])?>">
									<i class="menu-icon fa fa-caret-right"></i>
									View Post
								</a>
								<b class="arrow"></b>
							</li>
							
							<li class="">
								 <a href="<?= Url::toRoute(['weighbridge/index','type'=>'edit'])?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Edit Post
								</a>
								<b class="arrow"></b>
							</li>
							
							<li class="">
								 <a href="<?= Url::toRoute(['weighbridge/index','type'=>'delete'])?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Delete Post
								</a>
								<b class="arrow"></b>
							</li>
                            			</ul>
						<b class="arrow"></b>
					</li>
					
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>
            
            
            
            <div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon" style="color:#fff;"></i>
								<a href="#">Home</a>
							</li>

							
						</ul><!-- /.breadcrumb -->
                         
           </div>
                     <div class="page-content">

                             <?= $content ?>

                        
                     </div>
                     
                     </div>
                        
         
                
                           <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		
   
      </div>
                 





<?php $this->endBody() ?>
<?php $this->endPage() ?>