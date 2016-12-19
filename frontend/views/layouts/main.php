<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="images/icons/favicon.png"/>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!---------------------------------------------- Header Start ----------------------------------------------> 
    
 <!--Sidebar_contact--> 
	<div class="need_help">
		 <span style="cursor:pointer" onclick="openNav2()"> <img src="images/need_help.png"></span> 
		  
			<div class="contact_form" id="right_side_form">
			   <h2 class="banner_heading">How we can <small> Help you ? </small>     </h2>  
			   <div class="closed">
			      <a href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true"></i></a>
			   </div> 
				<input type="text" class="form-control" name="name" id="name" placeholder="Name">  
				<input type="text" class="form-control" name="name" id="name" placeholder="Contact Number"> 
				<input type="text" class="form-control" name="name" id="name" placeholder="Email Id"> 
				  <select id="form-filter-location" name="location" data-minimum-results-for-search="Infinity" class="form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
					<option value="1">Select  </option>
					<option value="1">Fresher  </option>
					<option value="1">Experience  </option>
					<option value="2">Company  </option>
					<option value="3">Consultancy </option>
					<option value="4"> Collage / Institute  </option>
					<option value="4">  Others  </option> 
				  </select> 
		         <textarea class="form-control textarea1" placeholder="Message"></textarea>
				 <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
			  </div>  
	 </div> 
 <!--Sidebar_contact--> 
		 
		 
		 
  <!--top_nav--> 
<div id="mySidenav1" class="top_nav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a> 
		  <!-- Main Navigation --> 
		   <div class="navbar navbar-default " role="navigation">  
		   <div class="collapse navbar-collapse" style="display:block"> 
			<ul class="nav navbar-nav"> 
					<li> <a href="<?= Url::toRoute(['site/jobsearch'])?>">Job Search</a></li>
					<li><a   href="<?= Url::toRoute(['sitel/hirecandidate'])?>" >   Hire Candidate</a></li>  
					<li><a   href="<?= Url::toRoute(['site/login'])?>" >Post a Resume</a></li>   
					 <li><a   href="<?= Url::toRoute(['site/login'])?>"   > <i class="fa fa-upload" aria-hidden="true"></i>  &nbsp Upload CV </a></li>
					 <li><a   href="<?= Url::toRoute(['site/employerslogin'])?>" > <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp  Employer Login</a></li>  
					<li><a   href="<?= Url::toRoute(['site/login'])?>"  class="log" > <i class="fa fa-sign-in" aria-hidden="true"></i>  &nbsp Login</a></li>
                        </ul>
                        <ul style="display: none;" class="nav navbar-nav"> 
		          	<li><img style="" src="images/users/12.jpg" alt="" class="riht_side_img">
					   <p class="title_profile"> Rohit Jaiwal</p>
							 </li>
			                 <li><a href="#">Dashboard</a></li>  
							<li><a href="your_post.html">Your Post</a></li> 
						    <li><a  href="<?= Url::toRoute(['site/postajob'])?>"  >New Post</a></li>   
                        </ul>
                              
                   
                   <div class="clearfix"></div> 
	</div>	 
</div> 		 
</div>
<!--top_nav-->
  
  
 <!--sidebar search--> 
<div id="mySidenav" class="sidenav">
   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <div class="group-sm group-top" id="top_side_fixed">
					 <h2 class="banner_heading">Find a <span>Job </span> You Will <span>  Love </span> </h2>
					 <div class="spacer1"></div>
					 <div  class="group-item col-md-12 col-xs-12">
						<div class="form-group"> 
						<input type="text" class="form-control" name="name" id="name" placeholder="Job title, skills, or company"> 
						</div>
					  </div> 
					  <div  class="group-item col-md-12 col-xs-12">
						<div class="form-group"> 
						<input type="text" class="form-control" name="name" id="name" placeholder="Location"> 
						</div>
					  </div> 
					  <div   class="group-item col-md-12 col-xs-6">
						<div class="form-group">
						  <select id="form-filter-location" name="location" data-minimum-results-for-search="Infinity" class="form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
							<option value="1">Experience</option>
							<option value="2"> > 1 Year   </option>
							<option value="3">   2 Year  </option>
							<option value="4">   3 Year  </option>
							<option value="4">   4 Year  </option>
							<option value="4">   5 Year  </option>
							<option value="4">   6 Year  </option>
							<option value="4">   7 Year  </option>
						  </select> 
						</div>
					  </div>
					  
					  <div  class="group-item col-md-12 col-xs-6">
						<div class="form-group">
						  <select id="form-filter-location" name="location" data-minimum-results-for-search="Infinity" class="form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
							<option value="1">Salary</option>
							<option value="2"> > 1 Lakh  </option>
							<option value="3"> 1</option>
							<option value="4"> 2  </option>
							<option value="4"> 3  </option>
							<option value="4"> 4  </option>
							<option value="4"> 5  </option>
						  </select> 
						</div>
					  </div>
					   
					  <div class=" group-item reveal-block reveal-lg-inline-block col-md-12 col-xs-12">
						<button type="button" style="" class="btn btn-primary element-fullwidth">Search  </button>
					  </div>
            </div>   
	   </div> 
  <!--sidebar search--> 
  
  
 <!-- Head Top--> 
<div id="head">
  <div class="container">
			  <div class="row">  
			          <!--mobile -->
							<div class="col-xs-2 col-sm-1  menu_humb">
							<div class="  _login">
								 <a href="#"  onclick="openNav1()">	<span class="fa fa-bars"></span></a>
								</div>
							 
						</div>		
						<!--mobile -->	 
					<div class="col-lg-4  col-md-4 col-sm-6 col-xs-7 top-main"><!-- logo -->
						<a  href="<?= Url::toRoute(['site/index'])?>"  title="Job Board" rel="home">
							<img class="main-logo" src="images/logo.png" alt="Career Bugs" />
						</a>
					</div><!-- logo --> 
					<div class="col-lg-8  col-md-8 col-sm-6 col-xs- 2 main-nav"><!-- Main Navigation -->  
                       <?php
					if(isset(Yii::$app->session['Employeeid']))
					{
					?>
					 <div class="navbar navbar-default " role="navigation"> 
                       <div class="collapse navbar-collapse"> 
				           <ul class="nav navbar-nav"> 
						
						<!-- It will display when customer paid  for that -->		
							<li class="no-need"> 
							   <a href="search_candidate.html" class="dropdown-toggle  orange_bg new_style">  <b class="fa fa-file-text orange"></b> <br>   Company List </a>
							</li>  
						<!-- It will display when customer paid  for that -->	

						<li class="no-need">
								<a href="#" class="dropdown-toggle brdr  orange_bg new_style" data-toggle="dropdown"><b class="fa fa-bell orange"></b> <br>  Notification </a> 
								<!--<ul class="dropdown-menu">
								    <li class=""><a target="_blank" href="#"><span class="notiLabel">Job Recommendations</span> <span class="notiCount">08</span> <p><span class="noti_Description fullWidth">HR Manager Position at Innofied Solution, Kolkata</span><span class="status"></span></p></a></li> 
									 <li class=""><a target="_blank" href="#"><span class="notiLabel">Job Recommendations</span> <span class="notiCount">08</span> <p><span class="noti_Description fullWidth">HR Manager Position at Innofied Solution, Kolkata</span><span class="status"></span></p></a></li> 
								</ul>-->
							</li>
							
							<li class="no-need prfl_img">
								<a href="#" class="dropdown-toggle brdr orange_bg new_style" data-toggle="dropdown">    
   								<img style="width: 43px;height: 43px;" src="images/user.png" alt="" class="img-responsive center-block "><?=Yii::$app->session['EmployeeName'];?>  </a> 
								<ul class="dropdown-menu"> 
									<li class=""><a href="<?= Url::toRoute(['site/profilepage'])?>"> <b class="fa fa-user"></b>  My Profile</a></li> 
									<li class=""><a href="edit_profile.html"><b class="fa fa-pencil-square-o"></b>   Edit Profile</a></li>  
									<li class=""><a href="change_password.html"> <b class="fa fa-lock"></b> Change Password  </a></li> 
									<li class=""><a href="<?= Url::toRoute(['site/employeelogout'])?>"> <b class="fa fa-power-off"></b> Log Out  </a></li>  
								</ul>
							</li> 
				      </ul> 
                </div><!--/.nav-collapse --> 
					<?php
					}
					elseif(isset(Yii::$app->session['Employerid'])){
				        ?>
					<div class="navbar navbar-default " role="navigation"> 
					 <div class="collapse navbar-collapse"> 
				           <ul class="nav navbar-nav"> 
						
						<!-- It will display when customer paid  for that -->		
							<li class="no-need"> 
							   <a href="search_candidate.html" class="dropdown-toggle  orange_bg new_style">  <b class="fa fa-file-text orange"></b> <br>   Company List </a>
							</li>  
						<!-- It will display when customer paid  for that -->	

						<li class="no-need">
								<a href="#" class="dropdown-toggle brdr  orange_bg new_style" data-toggle="dropdown"><b class="fa fa-bell orange"></b> <br>  Notification </a> 
								<!--<ul class="dropdown-menu">
								    <li class=""><a target="_blank" href="#"><span class="notiLabel">Job Recommendations</span> <span class="notiCount">08</span> <p><span class="noti_Description fullWidth">HR Manager Position at Innofied Solution, Kolkata</span><span class="status"></span></p></a></li> 
									 <li class=""><a target="_blank" href="#"><span class="notiLabel">Job Recommendations</span> <span class="notiCount">08</span> <p><span class="noti_Description fullWidth">HR Manager Position at Innofied Solution, Kolkata</span><span class="status"></span></p></a></li> 
								</ul>-->
							</li>
							
							<li class="no-need prfl_img">
								<a href="#" class="dropdown-toggle brdr orange_bg new_style" data-toggle="dropdown">    
   								<img style="width: 43px;height: 43px;" src="images/user.png" alt="" class="img-responsive center-block "><?php echo Yii::$app->session['EmployerName']; ?>  </a> 
								<ul class="dropdown-menu"> 
									<li class=""><a href="<?= Url::toRoute(['site/companyprofile'])?>"> <b class="fa fa-user"></b>  My Profile</a></li> 
									<li class=""><a href="<?= Url::toRoute(['site/employereditprofile'])?>"><b class="fa fa-pencil-square-o"></b>   Edit Profile</a></li>  
									<li class=""><a href="<?= Url::toRoute(['site/employerchangepassword'])?>"> <b class="fa fa-lock"></b> Change Password  </a></li> 
									<li class=""><a href="<?= Url::toRoute(['site/employerlogout'])?>"> <b class="fa fa-power-off"></b> Log Out  </a></li>  
								</ul>
							</li> 
				      </ul> 
				    </div><!--/.nav-collapse --> 
					<?php
					}
					else
					{
					?>
                       <div class="head_right"> 
						       <ul>  
								   <li class=""> <strong> Are you recruiting?</strong> <a  href="how_we_can_help.html"> 
									  <span>How we can help</span>  </a></li>  
								   <li><a class="btn-123"  href="<?= Url::toRoute(['site/searchcandidate'])?>"   >Search Candidates</a></li>
						       </ul>
                      </div><!--/.nav-collapse -->
					<?php
					}
					?>
                </div>  
				<div class="col-xs-3  col-sm-2  ds"> 
			   <div class="dropdown _login">
				 <a  href="<?= Url::toRoute(['site/login'])?>" >	<span class="fa fa-user"></span></a>
				</div>	
			 </div> 		 
			<div class="clear"></div>
		</div><!-- Main Navigation --> 
  </div>
</div> 
  <!-- Head -->   
  </div>
  
<!-- Start main header Menu -->
 <?php
					if(isset(Yii::$app->session['Employeeid']))
					{
					?>
 	   <div id="header"><!-- start main header --> 
					<div class="container"><!-- container -->
						<div class="row">  
							    <div class="col-lg-8  col-md-8 col-sm-8 col-xs-12 main-nav"><!-- Main Navigation --> 
					              <div class="navbar navbar-default " role="navigation"> 
								   <div class="collapse navbar-collapse"> 
									 <ul class="nav navbar-nav float-left">
										<li><a href="#">Dashboard</a></li>   
										<li><a href="post_a_job.html" > Bookmark Jobs  </a></li>   
										  <li><a href="post_a_job.html" > Applied Job  <span class="total">0</span></a></li>  
											</ul>
									</div><!--/.nav-collapse --> 
								   </div>
								   
									<div  class="clear"></div>
								</div><!-- Main Navigation -->
					
					<div class="clearfix"></div>
				</div>
			</div><!-- container --> 
		</div><!-- end main header -->
			   <?php
					}elseif(isset(Yii::$app->session['Employerid'])){
				        ?>
					 <div id="header"><!-- start main header --> 
					<div class="container"><!-- container -->
						<div class="row">  
							    <div class="col-lg-8  col-md-8 col-sm-8 col-xs-12 main-nav"><!-- Main Navigation --> 
					              <div class="navbar navbar-default " role="navigation"> 
								   <div class="collapse navbar-collapse"> 
									 <ul class="nav navbar-nav float-left">
										 <li><a href="#">Dashboard</a></li>  
										 <li><a href="<?= Url::toRoute(['site/yourpost'])?>">Your Post</a></li> 
										 <li><a href="<?= Url::toRoute(['site/postajob'])?>" >New Post</a></li>
									 </ul>
									</div><!--/.nav-collapse --> 
								   </div>
								   
									<div  class="clear"></div>
								</div><!-- Main Navigation -->
					
					<div class="clearfix"></div>
				</div>
			</div><!-- container --> 
		</div><!-- end main header -->
			
					<?php
					}
					else
					{
					?>
 <div id="header">
		 <div class="find_a_job">
		     <span style="cursor:pointer" onclick="openNav()"> <img src="images/find-icon.png"></span> 
         </div>
			<div class="container"><!-- container -->
			  <div class="row"> 
					  <div class="col-lg-8  col-md-7 col-sm-7 col-xs-12 main-nav"><!-- Main Navigation --> 
					   <div class="navbar navbar-default " role="navigation"> 
                       <div class="collapse navbar-collapse"> 
						<ul class="nav navbar-nav"> 
								<li><a   href="<?= Url::toRoute(['site/jobsearch'])?>" >Job Search</a></li>
								<li><a   href="<?= Url::toRoute(['site/hirecandidate'])?>" >   Hire Candidate</a></li>  
								<li><a   href="<?= Url::toRoute(['site/jobseekersregister'])?>" >Post a Resume</a></li>   
								
						</ul>
                       </div><!--/.nav-collapse -->  
                      </div>  
						<div  class="clear"></div>
					</div><!-- Main Navigation -->
					
					<div class="col-lg-4  col-md-5 col-sm-5 col-xs-12 main-nav"><!-- Main Navigation --> 
					   <div class="navbar navbar-default " role="navigation"> 
                        <div class="collapse navbar-collapse no_pad"> 
						 <ul class="nav navbar-nav right_algn"> 
						      
									 <li><a   href="<?= Url::toRoute(['site/employerslogin'])?>" > <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp  Campus Zone</a></li>  
								 <li><a   href="<?= Url::toRoute(['site/employerslogin'])?>" > <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp  Employer Login</a></li>  
								<li><a   href="<?= Url::toRoute(['site/login'])?>"  class="log" > <i class="fa fa-sign-in" aria-hidden="true"></i>  &nbsp Login</a></li>
						</ul>
                    </div><!--/.nav-collapse --> 
                  </div> 
						<div  class="clear"></div>
					</div><!-- Main Navigation -->
					<div class="clearfix"></div>
				</div>
				 
			</div><!-- container --> 
	</div>
<!-- end main header -->
<?php
					}
					?>

  
 <!---------------------------------------------- Header End ----------------------------------------------> 
  
 
 
 
<!---------------------- Container Start ------------------------>
<?= Alert::widget() ?>
        <?= $content ?>
<!---------------------- Container End ------------------------>


<!---------------------- Footer Start ------------------------>

<div id="footer"><!-- Footer -->
			<div class="container"><!-- Container -->
				<div class="row">
					 
					<div class="col-lg-3  col-md-3 col-sm-3 col-xs-12  footer-widget"><!-- Footer Menu Widget -->
						<h6 class="widget-title">Hot Categories</h6>
						<div class="footer-widget-nav">
							<ul>
								<li><a href="#">Computer And IT</a></li>
								<li><a href="#"> Construction / Facilities</a></li>
								<li><a href="#">Telecommunications</a></li>
								<li><a href="#">Real Estate</a></li>
								<li><a href="#">Computer And IT</a></li>
								<li><a href="#"> Construction / Facilities</a></li>
								<li><a href="#">Telecommunications</a></li>
								<li><a href="#">Real Estate</a></li>
							 
							</ul>
						</div>
					</div><!-- Footer Menu Widget -->
					 
                       <div class="col-lg-3  col-md-3 col-sm-3 col-xs-12  footer-widget"><!-- Footer Menu Widget -->
						<h6 class="widget-title">Jobseeker    </h6>
						<div class="footer-widget-nav">
							<ul>
								<li><a href="#">Computer And IT</a></li>
								<li><a href="#"> Construction / Facilities</a></li>
								<li><a href="#">Telecommunications</a></li>
								<li><a href="#">Real Estate</a></li>
								<li><a href="#">Computer And IT</a></li>
								<li><a href="#"> Construction / Facilities</a></li>
								<li><a href="#">Telecommunications</a></li>
								<li><a href="#">Real Estate</a></li>
							 
							</ul>
						</div>
					</div>  
					 <div class="col-lg-3  col-md-3 col-sm-3 col-xs-12  footer-widget"><!-- Footer Menu Widget -->
						<h6 class="widget-title">Recruiter  </h6>
						<div class="footer-widget-nav">
							<ul>
								<li><a href="#">Computer And IT</a></li>
								<li><a href="#"> Construction / Facilities</a></li>
								<li><a href="#">Telecommunications</a></li>
								<li><a href="#">Real Estate</a></li>
								<li><a href="#">Computer And IT</a></li>
								<li><a href="#"> Construction / Facilities</a></li>
								<li><a href="#">Telecommunications</a></li>
								<li><a href="#">Real Estate</a></li>
							 
							</ul>
						</div>
					</div>  
					
					<div class="col-lg-3  col-md-3 col-sm-3 col-xs-12  footer-widget"> 
					
					 <div id="contact_details">
					  <h6 class="widget-title"> Contact Us</h6> 
					      <p> <i class="fa fa-envelope colored"></i>  <a href="">  Email: info@careerbugs.com  </p>
						  <p> <i class="fa fa-envelope colored opac"></i>  <a href=""> &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp career@careerbugs.com</a></p>
						  <p> <i class="fa fa-phone"></i> Phone: 1800 200 245 </a></p>
						  <p> <i class="fa fa-map-marker colored"></i>Address: Cf 318 Sector Saltlake </a></p>
						  
					  </div>
					  
						<h6 class="widget-title sig1">Singn For news Letter</h6>
							
							<div class="single-widget"> 
										<input autocomplete="off" name="keyword" type="text" class="col-xs-15 subscribeInputBox" placeholder="Your email address">
										<button class="col-xs-7 btn btn-theme-secondary subscribeBtn reset-padding">Subscribe</button> 
								 <div class="clearfix"></div>
					      	</div>
						
						
					  <p>Register now to get updates on latest Vacancy.</p>
					  
					 
			
			          </div><!-- News Leter Widget -->
					<div class="clearfix"></div>
				</div>

				 
				
			</div><!-- Container -->
		</div><!-- Footer -->
		
		
		
		
		
		<div id="footer"><!-- Footer -->
			<div class="container"><!-- Container -->
				<div class="row">
					 
					   <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
						 <li><a href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                    </ul>
				 
				</div>
			</div><!-- Container -->
		</div>
		
		
		
		
		<div class="developed_by_e-developed_technology">
	      <div class="row">
			 <div class="col-md-6">
			   <p>	2017 © <a href="">Career Bugs</a>. All Rights Reserved.</p>
			   </div>
			  <div class="col-md-6">
			   <a href="" target="_blank">Designed by <span> E-developed Technology </span></a>
			   </div>
		   </div>
		</div>

<!---------------------- Footer End ------------------------->s
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
