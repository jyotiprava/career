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
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
</head>

<body class="navbar-bottom" onload="alertload()">
<?php $this->beginBody() ?>
	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="bassets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

				 
			</ul>

		 

			<ul class="nav navbar-nav navbar-right">
				 

				  

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="bassets/images/demo/users/face11.jpg" alt="">
						<span><?=Yii::$app->user->identity->Name;?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><i class="icon-coins"></i> My balance</a></li>
						<li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="<?= Url::to(['site/logout'])?>" data-method="post"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page header -->
	<div class="page-header">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ul>
 
		</div>

	 
	</div>
	<!-- /page header -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-title h6">
							<span>Main navigation</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content sidebar-user">
							<div class="media">
								<a href="#" class="media-left"><img src="bassets/images/demo/users/face11.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?=Yii::$app->user->identity->Name;?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="" data-original-title="Main pages"></i></li>
								<li><a href="index.html"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li>
									<a href="#" class="has-ul"><i class="icon-stack2"></i> <span>Course</span></a>
									<ul class="hidden-ul">
										<li><a href="<?=Url::to(['course/create'])?>">Add</a></li>
										<li><a href="<?=Url::to(['course/index'])?>">View</a></li>
									</ul>
								</li>
								<li>
									<a href="#" class="has-ul"><i class="icon-copy"></i> <span>Skill</span></a>
									<ul class="hidden-ul">
										<li><a href="<?=Url::to(['skill/create'])?>" id="layout1">Add</a></li>
										<li><a href="<?=Url::to(['skill/index'])?>" id="layout1">View</a></li>
									</ul>
								</li>
								<li>
									<a href="#" class="has-ul"><i class="icon-droplet2"></i> <span>Industry</span></a>
									<ul class="hidden-ul">
										<li><a href="<?=Url::to(['industry/create'])?>">Add</a></li>
										<li><a href="<?=Url::to(['industry/index'])?>">View</a></li>
									</ul>
								</li>
								<li>
									<a href="#" class="has-ul"><i class="icon-stack"></i> <span>Job Category</span></a>
									<ul class="hidden-ul">
										<li><a href="<?=Url::to(['job-category/create']);?>">Add</a></li>
										<li><a href="<?=Url::to(['job-category/index']);?>">View</a></li>
									</ul>
								</li>
								<li>
									<a href="#" class="has-ul"><i class="icon-stack"></i> <span>Position</span></a>
									<ul class="hidden-ul">
										<li><a href="<?=Url::to(['position/create']);?>">Add</a></li>
										<li><a href="<?=Url::to(['position/index']);?>">View</a></li>
									</ul>
								</li>
								
								
								 <li class="navigation-header"><span style=" font-weight: bold;font-size: 14px; text-align: center;">   Candidate List</span> <i class="icon-menu" title="" data-original-title="Extensions"></i></li>
								 
									<li><a href="#"><i class="icon-home4"></i> <span> Upload Resume   </span></a></li> 
									<li><a href="<?=Url::to(['report/candidatelist']);?>"><i class="icon-home4"></i> <span> Candidate List     </span></a></li>  
                                                                        <li><a href="<?=Url::to(['report/contactuslist']);?>"><i class="icon-home4"></i> <span> Contactus Details     </span></a></li>  
								 
   
   
									
					               <li class="navigation-header"><span style=" font-weight: bold;font-size: 14px; text-align: center;"> Company List</span> <i class="icon-menu" title="" data-original-title="Extensions"></i></li>
								 
									<li><a href="<?=Url::to(['report/companylist']);?>"><i class="icon-width"></i> <span>Total Company List</span></a></li> 
								<!-- /main -->
								
								
								
								
								   <li class="navigation-header"><span style=" text-align: center; font-weight: bold;font-size: 14px;"> Campuse Zone</span> <i class="icon-menu" title="" data-original-title="Extensions"></i></li>
								  
									<li><a href="#"><i class="icon-width"></i> <span>Total Campus Zone</span></a></li>
								<!-- /main -->
							 
								
								    <li class="navigation-header"><span style="text-align: center; font-weight: bold;font-size: 14px;">  Paymeny List </span> <i class="icon-menu" title="" data-original-title="Extensions"></i></li>
							
								 
											<li><a href="#"><i class="icon-copy"></i> <span>   Candidate Payment List   </span></a></li>
											<li><a href="#"><i class="icon-copy"></i> <span>   Company Payment List   </span></a></li>
											<li><a href="#"><i class="icon-copy"></i> <span>   Campus Payment List   </span></a></li>
											<li><a href="#"><i class="icon-copy"></i> <span> Company Total Invoice  </span></a></li> 
											<li><a href="#"><i class="icon-copy"></i> <span> Need To renewal  </span></a></li> 
											<li><a href="#"><i class="icon-copy"></i> <span> Expired  </span></a></li> 

  
  
								   <li class="navigation-header"><span> Home page Job  </span> <i class="icon-menu" title="" data-original-title="Extensions"></i></li>
								 
									<li><a href="#"><i class="icon-stack"></i> <span> Total Job  </span></a></li>
									<li><a href="#"><i class="icon-stack"></i> <span> Total Job Opening  </span></a></li> 

 
 
 
								  <li class="navigation-header"><span>Home page Advertisement</span> <i class="icon-menu" title="" data-original-title="Extensions"></i></li>
								
								  <li> <a href="index.html"><i class="icon-puzzle4"></i> <span>    Advertisement Block 1</span></a> </li>
								  <li> <a href="index.html"><i class="icon-puzzle4"></i> <span>  Advertisement Block 2</span></a> </li>
								
								
								
								
								<li class="navigation-header"><span>Home page Bottom</span> <i class="icon-menu" title="" data-original-title="Extensions"></i></li>
							      
								 <li> <a href="index.html"><i class="icon-puzzle4"></i> <span>  Candidate Step</span></a> </li>
								 <li> <a href="index.html"><i class="icon-puzzle4"></i> <span>Companies Logo Block </span></a> </li>
								 <li> <a href="index.html"><i class="icon-puzzle4"></i> <span>  People Say Block</span></a> </li>
								
								
								<!-- Extensions -->
								<li class="navigation-header"><span>Footer</span> <i class="icon-menu" title="" data-original-title="Extensions"></i></li>
								<li> <a href="index.html"><i class="icon-puzzle4"></i> <span>First Block</span></a> </li>
								<li> <a href="#"><i class="icon-puzzle4"></i> <span>Second Block</span></a> </li>
								<li><a href="index.html"><i class="icon-puzzle4"></i> <span>Third Block</span></a></li>
								<li><a href="index.html"><i class="icon-puzzle4"></i> <span>  Contact Us</span></a></li>
								<li><a href="index.html"><i class="icon-puzzle4"></i> <span>Social Icons</span></a></li> 
								<li><a href="index.html"><i class="icon-puzzle4"></i> <span>Copy Right</span></a></li> 
								<li><a href="index.html"><i class="icon-puzzle4"></i> <span>Social Icons</span></a></li> 
							    <li><a href="index.html"><i class="icon-puzzle4"></i> <span>  Developed Block</span></a></li> 
									
								  

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">
				<?= Alert::widget() ?>
				<?= $content ?>
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


	<!-- Footer -->
	<div class="navbar navbar-default navbar-fixed-bottom footer">
		<ul class="nav navbar-nav visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="footer">
			<div class="navbar-text">
				&copy; 2015. <a href="#" class="navbar-link">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" class="navbar-link" target="_blank">Eugene Kopyov</a>
			</div>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li><a href="#">About</a></li>
					<li><a href="#">Terms</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /footer -->
	<script type="text/javascript">
		function alertload() {
		setTimeout(function() {
            $('.alert').fadeOut('fast');
            }, 3000); // <-- time in milliseconds
        }
	</script>
</body>

<?php $this->endBody() ?>
<?php $this->endPage() ?>