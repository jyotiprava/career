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

<body class="navbar-bottom">
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
						<span>Victoria</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><i class="icon-coins"></i> My balance</a></li>
						<li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
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
				<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
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
									<span class="media-heading text-semibold">Victoria Baker</span>
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
									<a href="#" class="has-ul"><i class="icon-stack2"></i> <span>Page layouts</span></a>
									<ul class="hidden-ul">
										<li><a href="layout_navbar_main_fixed.html">Fixed main navbar</a></li>
										<li><a href="layout_navbar_secondary_fixed.html">Fixed secondary navbar</a></li>
										<li><a href="layout_navbar_main_hideable.html">Hideable main navbar</a></li>
										<li><a href="layout_navbar_secondary_hideable.html">Hideable secondary navbar</a></li>
										<li><a href="layout_sidebar_sticky_custom.html">Sticky sidebar (custom scroll)</a></li>
										<li><a href="layout_sidebar_sticky_native.html">Sticky sidebar (native scroll)</a></li>
										<li><a href="layout_footer_fixed.html">Fixed footer</a></li>
										<li class="navigation-divider"></li>
										<li><a href="boxed_default.html">Boxed with default sidebar</a></li>
										<li><a href="boxed_mini.html">Boxed with mini sidebar</a></li>
										<li><a href="boxed_full.html">Boxed full width</a></li>
									</ul>
								</li>
								<li>
									<a href="#" class="has-ul"><i class="icon-copy"></i> <span>Layouts</span></a>
									<ul class="hidden-ul">
										<li><a href="http://demo.interface.club/limitless/layout_1/LTR/default/index.html" id="layout1">Layout 1</a></li>
										<li><a href="http://demo.interface.club/limitless/layout_2/LTR/default/index.html" id="layout2">Layout 2</a></li>
										<li><a href="index.html" id="layout3">Layout 3 <span class="label bg-warning-400">Current</span></a></li>
										<li><a href="http://demo.interface.club/limitless/layout_4/LTR/default/index.html" id="layout4">Layout 4</a></li>
										<li><a href="http://demo.interface.club/limitless/layout_5/LTR/default/index.html" id="layout5">Layout 5</a></li>
										<li class="disabled"><a href="http://demo.interface.club/limitless/layout_6/LTR/default/index.html" id="layout6">Layout 6 <span class="label label-transparent">Coming soon</span></a></li>
									</ul>
								</li>
								<li>
									<a href="#" class="has-ul"><i class="icon-droplet2"></i> <span>Color system</span></a>
									<ul class="hidden-ul">
										<li><a href="colors_primary.html">Primary palette</a></li>
										<li><a href="colors_danger.html">Danger palette</a></li>
										<li><a href="colors_success.html">Success palette</a></li>
										<li><a href="colors_warning.html">Warning palette</a></li>
										<li><a href="colors_info.html">Info palette</a></li>
										<li class="navigation-divider"></li>
										<li><a href="colors_pink.html">Pink palette</a></li>
										<li><a href="colors_violet.html">Violet palette</a></li>
										<li><a href="colors_purple.html">Purple palette</a></li>
										<li><a href="colors_indigo.html">Indigo palette</a></li>
										<li><a href="colors_blue.html">Blue palette</a></li>
										<li><a href="colors_teal.html">Teal palette</a></li>
										<li><a href="colors_green.html">Green palette</a></li>
										<li><a href="colors_orange.html">Orange palette</a></li>
										<li><a href="colors_brown.html">Brown palette</a></li>
										<li><a href="colors_grey.html">Grey palette</a></li>
										<li><a href="colors_slate.html">Slate palette</a></li>
									</ul>
								</li>
								<li>
									<a href="#" class="has-ul"><i class="icon-stack"></i> <span>Starter kit</span></a>
									<ul class="hidden-ul">
										<li><a href="starters/horizontal_nav.html">Horizontal navigation</a></li>
										<li><a href="starters/1_col.html">1 column</a></li>
										<li><a href="starters/2_col.html">2 columns</a></li>
										<li>
											<a href="#" class="has-ul">3 columns</a>
											<ul class="hidden-ul">
												<li><a href="starters/3_col_dual.html">Dual sidebars</a></li>
												<li><a href="starters/3_col_double.html">Double sidebars</a></li>
											</ul>
										</li>
										<li><a href="starters/4_col.html">4 columns</a></li>
										<li><a href="starters/layout_boxed.html">Boxed layout</a></li>
										<li class="navigation-divider"></li>
										<li><a href="starters/layout_navbar_fixed_main.html">Fixed main navbar</a></li>
										<li><a href="starters/layout_navbar_fixed_secondary.html">Fixed secondary navbar</a></li>
										<li><a href="starters/layout_navbar_fixed_both.html">Both navbars fixed</a></li>
										<li><a href="starters/layout_sidebar_sticky.html">Sticky sidebar</a></li>
									</ul>
								</li>
								
								
								 <li class="navigation-header"><span style=" font-weight: bold;font-size: 14px; text-align: center;">   Candidate List</span> <i class="icon-menu" title="" data-original-title="Extensions"></i></li>
								 
									<li><a href="#"><i class="icon-home4"></i> <span> Upload Resume   </span></a></li> 
									<li><a href="#"><i class="icon-home4"></i> <span> Candidate List     </span></a></li>  
								 
   
   
									
					               <li class="navigation-header"><span style=" font-weight: bold;font-size: 14px; text-align: center;"> Company List</span> <i class="icon-menu" title="" data-original-title="Extensions"></i></li>
								 
									<li><a href="#"><i class="icon-width"></i> <span>Total Company List</span></a></li> 
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

</body>

<?php $this->endBody() ?>
<?php $this->endPage() ?>