<?php
$this->title = 'Career Bugs';
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
$url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
?>
<!-- start main wrapper --> 
	<div id="wrapper">
		<div class="headline">
			<div class=" container"><!-- start headline section -->
					<div class="row" >
						<div class="col-md-12 bg-full">
						
						<h2 class="banner_heading">Find a <span>Job </span> You Will <span>  Love </span> </h2>
				<div class="sticky">
				<form class="offset-top-10 offset-sm-top-30 " id="home_page_form">
                        <div class="group-sm group-top">
                         
						 <div  class="group-item col-md-5 col-xs-12">
                            <div class="form-group"> 
							<input type="text" class="form-control" name="name" id="name" placeholder="Job title, skills, or company">
                             
                            </div>
                          </div>
						  
						  <div  class="group-item col-md-2 col-xs-12">
                            <div class="form-group"> 
							<input type="text" class="form-control" name="name" id="name" placeholder="Location"> 
                            </div>
                          </div>
						  
						  
						  
						  <div   class="group-item col-md-2 col-xs-6">
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
						  
                          <div  class="group-item col-md-2 col-xs-6">
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
						   
                          <div class=" group-item reveal-block reveal-lg-inline-block col-md-1 col-xs-12">
                            <button type="button" style="" class="btn btn-primary element-fullwidth">Search  </button>
                          </div>
						  
                        </div>
                      </form>
					 </div>
						</div>
						<div class="col-md-12 align-left">
							<h4>Need a Job ?   </h4>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using</p>
							<p><a href="#" class="btn btn-default btn-light" >Post a Job</a></p>
						</div>
						<div class="clearfix"></div>
					</div>
			</div><!-- end headline section -->
	</div>
	
		<div class="recent-job"><!-- Start Recent Job -->
			<div class="container">
				<div class="row">
				  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			 
			 <div class="col-lg-6 col-md-5 col-sm-5 col-xs-6">
						<h4><i class="glyphicon glyphicon-briefcase"></i> Recent Job</h4>
					 </div>	 
					  <div class="col-lg-6 col-md-7 col-sm-7 col-xs-6" id="landing_select">
					  		 	
							<div class="width-10" id="select_per_page">	
                            <div class="form-groups">
							<div class="col-sm-8">
						      <label>Result Per page </label>
							 </div>
						<div class="col-sm-4">
                              <select id="form-filter-location" name="location" data-minimum-results-for-search="Infinity" class="form-control23 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
								<option value="1">10</option>
                                <option value="2">  20  </option>
                                <option value="3">  30 </option>
                                <option value="4">  40  </option>
								<option value="4">  50  </option> 
                              </select> 
                            </div>
							 </div>
                          </div> 
 </div>	 
 <div class="clearfix"></div>
		
		<?php
		if($alljob)
		{
		foreach($alljob as $jkey=>$jvalue)
		{
		?>
		 <div class="item-list">
                <a href="<?= Url::toRoute(['site/jobdetail','JobId'=>$jvalue->JobId])?>">
                <div class="col-sm-12 add-desc-box">
                  <div class="add-details">
                    <h5 class="add-title"><?=$jvalue->JobTitle;?></h5>
                    <div class="info"> 
                      <span class="category"><?=$jvalue->position->Position;?></span> -
                      <span class="item-location"><i class="fa fa-map-marker"></i><?=$jvalue->Location;?></span> <br>
                    <span> <strong><?=$jvalue->CompanyName;?></strong> </span>
					</div>
                    <div class="info bottom">
					    <div class="col-sm-3 col-xs-3">
					    	<span class="styl">Experience : </span>  
					    </div>
						<div class="col-sm-9 col-xs-9 left-text">
							<span class="category"><?php if($jvalue->Experience!='Fresher'){ echo $jvalue->Experience.' Year';}else{echo $jvalue->Experience;}?></span>  
                      </div>
					 </div> 
					  <div class="info bottom">
					     <div class="col-sm-3 col-xs-3">
					    	<span class="styl">Keyskills : </span>  
					    </div>
						<div class="col-sm-9 col-xs-9 left-text">
							<span class="category">
								<?php
								$jskill='';
								foreach($jvalue->jobRelatedSkills as $k=>$v)
								{
								$jskill.=$v->skill->Skill.' , ';
								}
								echo $jskill;
								?>
							</span>  
                      </div>
					 </div>
					 
					   <div class="info bottom">
					    <div class="col-sm-3 col-xs-3">
					    	<span class="styl">Job Description : </span>  
					    </div>
						<div class="col-sm-9 col-xs-9 left-text">
							<span class="category"><?=substr(htmlspecialchars_decode($jvalue->JobDescription),0,150).'...';?></span>  
                      </div>
					 </div>
					 
					  <div class="info bottom">
					    <div class="col-sm-3 col-xs-3">
					    	<span class="styl">Salary Range </span>  
					    </div>
						<div class="col-sm-9 col-xs-9 left-text">
							<span class="category"><?=$jvalue->Salary;?></span>  
                      </div>
					 </div> 
					 
					<div class="info bottom"> 
						<span class="category" style="text-align:right">    Posted By <?=$jvalue->employer->Name.' ('.date('d M Y, h:i A',strtotime($jvalue->OnDate)).')';?></span> 
                    </div> 
                  </div>
                </div>
                </a>
              </div>
		<?php
		}
		}
		?>
			
							<ul class="pagination" style="display: none;">
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
							  </ul>
			  
					 
						<div class="spacer-2"></div>
					</div>
					 
					
					
					
					<div class="col-lg-3  col-md-3 col-sm-3 col-xs-12"  id="right-side">
								<div class="job-oppening-title-right"> <h4> Top Jobs </h4></div>
				 
						  <div class="rsw"> 
                            <aside> 
                                <div class="widget">
                                    
                                    <ul class="related-post">
										<?php
										if($topjob)
										{
										foreach($topjob as $tkey=>$tvalue)
										{
											?>
                                        <li>
                                            <a href="<?= Url::toRoute(['site/jobdetail','JobId'=>$tvalue->JobId])?>"> <?=$tvalue->CompanyName;?>  </a>
											<span><i class="fa fa-suitcase"></i>Position:  <?=$tvalue->position->Position;?></span>
											<span><i class="fa fa-calendar"></i>Place:  <?=$tvalue->Location;?> </span>
											<span><i class="fa fa-clock-o"></i>Post Time: <?=date('h:i A',strtotime($tvalue->OnDate));?> </span>
                                        </li>
                                        <?php
										}
										}
										?>
                                    </ul>
                                </div>

                            </aside>
                        </div>
					  	<div id="job-opening">
							<div class="job-opening-top"> 
							<div class="widget-heading fl-left"><span class="title">Top Job Opening</span></div>
					    
								<div class="job-opening-nav">
									<a class="btn prev"></a>
									<a class="btn next"></a>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="clearfix"></div>
							<br/>
							<div id="job-opening-carousel" class="owl-carousel">
							
								<div class="item-home">
									<div class="job-opening">
										<img src="images/upload/dummy-job-open-1.png" class="img-responsive" alt="dummy-job-opening" />
										
										<div class="job-opening-content">
											HR Manager
											<p>
												Place for worlds best shipping company and work with great level efficiency to break trough in new career.
											</p>
										</div>
										
										<div class="job-opening-meta clearfix">
											<div class="meta-job-location meta-block"><i class="fa fa-map-marker"></i>San Fransisco</div>
											<div class="meta-job-type meta-block"><i class="fa fa-user"></i>Full Time</div>
										</div>
									</div>
								</div>
								
								<div class="item-home">
									<div class="job-opening">
										<img src="images/upload/dummy-job-open-2.png" class="img-responsive" alt="dummy-job-opening" />
										
										<div class="job-opening-content">
											Head Shop Manager
											<p>
												Place for worlds best shipping company and work with great level efficiency to break trough in new career.
											</p>
										</div>
										
										<div class="job-opening-meta clearfix">
											<div class="meta-job-location meta-block"><i class="fa fa-map-marker"></i>Denver</div>
											<div class="meta-job-type meta-block"><i class="fa fa-user"></i>Full Time</div>
										</div>
									</div>
								</div>
								<div class="item-home">
									<div class="job-opening">
										<img src="images/upload/dummy-job-open-1.png" class="img-responsive" alt="dummy-job-opening" />
										
										<div class="job-opening-content">
											Head Shop Manager
											<p>
												Place for worlds best shipping company and work with great level efficiency to break trough in new career.
											</p>
										</div>
										
										<div class="job-opening-meta clearfix">
											<div class="meta-job-location meta-block"><i class="fa fa-map-marker"></i>San Fransisco</div>
											<div class="meta-job-type meta-block"><i class="fa fa-user"></i>Washington</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						 
						 
						<div class="spacer-4"></div> 
						<div class="widget-heading"><span class="title">Hot Categories </span></div>
						<div class="spacer-5"></div> 
						<div class="widget"> 
							<ul class="categories-module">
								<?php
								if($hotcategory)
								{
								foreach($hotcategory as $hkey=>$hvalue)
								{
								?>
								<li> <a href="<?= Url::toRoute(['site/jobsearch','JobCategoryId'=>$hvalue->JobCategoryId])?>"> <?=$hvalue->CategoryName;?> <span>(<?=$hvalue->cnt;?>)</span> </a> </li>
								<?php
								}
								}
								?>
							</ul>
						</div>
                                  
								  
								   
					            	<div class="spacer-4"></div> 
								  	<div class="widget-heading"><span class="title">Job Recommendations </span></div>
									<div class="spacer-5"></div> 
									
								       <div class="post-resume-container">
									   <p>No job recommendations yet, but opportunity is out there!</p>
									 <p>  To start getting recommendations, 
							<a href="" class="btn-default  type=" button"="" data-toggle="modal" data-target="#myModal_buy_a_plan"> <i class="fa fa-download"></i>    Upload a Resume </a>
							 
							 </a>   
						         or complete a job application. </p>
							</div>
							
							
		 <div class="modal add-resume-modal" id="myModal_buy_a_plan" tabindex="-1" role="dialog" aria-labelledby="">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add New Resume</h4>
                    </div>
                    <div class="modal-body">
                        <div class="input-group image-preview form-group ">
                            <input type="text" class="form-control image-preview-filename" disabled="disabled">
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                <span class="glyphicon glyphicon-remove"></span> Clear
                            </button>
                            <div class="btn btn-default image-preview-input upload_btn">
                              <i class="fa fa-file" aria-hidden="true"></i>
                                <span class="image-preview-input-title">Browse</span>
                                <input type="file" accept="file_extension" name="input-file-preview" />
                            </div>
                            </span>
                        </div>
                        <p>Only pdf and doc files are accepted</p>
                    </div>
                    <div class="modal-footer">
                        <a href="" type="button" class="btn btn-default">Save Resume</a>
                    </div>
                </div>
            </div>
        </div>
 
  
  
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
		 
		 
		 
		 	<div class="upload_resume_main">
			        <div class="container">      
      					<div class="col-sm-7 col-xs-12">
						<p>Upload  your resume and let your next job find you.</p>  
					 	</div>
						<div class="col-sm-3 col-xs-12">
						  <a href="<?= Url::toRoute(['site/jobseekersregister'])?>">
							<button type="button" class="post-resume-button">Upload Your Resume<i class="icon-upload grey"></i></button></a>
					 	</div>
						<div class="col-sm-2 col-xs-12">
							</div>
							</div></div>
					
						
						
						
		<div class="step-to">
			<div class="container">
				<h1>Easiest Way To Use for Candidate</h1>
				<p>
					At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas mo
				</p>
	
				<div class="step-spacer"></div>
				<div id="step-image">
					<div class="step-by-container">
						<div class="step-by">
							 <a  href="login.html">
							<div class="step-by-inner">
								<div class="step-by-inner-img">
									<img src="images/step-icon-1.png" alt="step" />
								</div>
							</div>
							</a>
							<h5>Create an Account </h5>
						</div>
								
						<div class="step-by">
							 
							 <a  href="<?= Url::toRoute(['site/login'])?>"><div class="step-by-inner">
								<div class="step-by-inner-img">
									<img src="images/step-icon-2.png" alt="step" />
								</div>
							</div>	</a>
							<h5>Create your profile</h5>
						</div>
								
						<div class="step-by">
							 
							 <a  href="<?= Url::toRoute(['site/login'])?>"><div class="step-by-inner">
								<div class="step-by-inner-img">
									<img src="images/step-icon-3.png" alt="step" />
								</div>
							</div>	</a>
							<h5>Send your Resume</h5>
						</div>
								
						<div class="step-by">
							 
							 <a  href="<?= Url::toRoute(['site/jobsearch'])?>"><div class="step-by-inner">
								<div class="step-by-inner-img">
									<img src="images/step-icon-4.png" alt="step" />
								</div>
							</div>	</a>
							<h5>Get your Job</h5>
						</div>
								
					</div>
				</div>
				<div class="step-spacer"></div>
			</div>
		</div>
		
	
		
		
		
						
		<div class="developed_by_e-developed_technology"  id="company-post" >
	      <div class="row">
		  <h1>Companies Who Have Posted Jobs  </h1>
		  
			  <div id="company-post-list" class="owl-carousel company-post">
				<?php
				if($allcompany)
				{
				foreach($allcompany as $ckey=>$cvalue)
				{
					?>
					<a href="<?=$cvalue->Website;?>" target="_blank"><div class="company" style="background: #fff;">
						<img src="<?=$url.$cvalue->docDetail->Doc;?>" class="img-responsive" alt="company-post" />
					</div></a>
				<?php
				}
				}
				?>
				</div>
		   </div>
		</div>
		
		 
		
		
		
		
		
		 
		
		
		<div class="testimony">
			<div class="container">
				<h1>What People Say About Us</h1>
				<p>
					At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas mo
				</p>
					
			</div>
			<div id="sync2" class="owl-carousel">
				<div class="testimony-image">
					<img src="images/upload/testimony-image-1.jpg" class="img-responsive" alt="testimony"/>
				</div>
				<div class="testimony-image">
					<img src="images/upload/testimony-image-2.jpg" class="img-responsive" alt="testimony"/>
				</div>
				<div class="testimony-image">
					<img src="images/upload/testimony-image-3.jpg" class="img-responsive" alt="testimony"/>
				</div>
				<div class="testimony-image">
					<img src="images/upload/testimony-image-4.jpg" class="img-responsive" alt="testimony"/>
				</div>
				<div class="testimony-image">
					<img src="images/upload/testimony-image-5.jpg" class="img-responsive" alt="testimony"/>
				</div>
				<div class="testimony-image">
					<img src="images/upload/testimony-image-6.jpg" class="img-responsive" alt="testimony"/>
				</div>
				<div class="testimony-image">
					<img src="images/upload/testimony-image-7.jpg" class="img-responsive" alt="testimony"/>
				</div>
				<div class="testimony-image">
					<img src="images/upload/testimony-image-8.jpg" class="img-responsive" alt="testimony"/>
				</div>
				<div class="testimony-image">
					<img src="images/upload/testimony-image-9.jpg" class="img-responsive" alt="testimony"/>
				</div>
				<div class="testimony-image">
					<img src="images/upload/testimony-image-10.jpg" class="img-responsive" alt="testimony"/>
				</div>
				
			</div>
			
			<div id="sync1" class="owl-carousel">
				<div class="testimony-content container">
					<p>
						"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum .
						
					</p>
					<p>
						John Grasin, CEO, IT-Planet
					</p>
					<div class="media-testimony">
						<a href="#" target="blank"><i class="fa fa-twitter twit"></i></a>
						<a href="#" target="blank"><i class="fa fa-linkedin linkedin"></i></a>
						<a href="#" target="blank"><i class="fa fa-facebook fb"></i></a>
					</div>
				</div>
				<div class="testimony-content container">
					<p>
						"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum .
						
					</p>
					<p>
						John Grasin, CEO, IT-Planet
					</p>
					<div class="media-testimony">
						<a href="#" target="blank"><i class="fa fa-twitter twit"></i></a>
						<a href="#" target="blank"><i class="fa fa-linkedin linkedin"></i></a>
						<a href="#" target="blank"><i class="fa fa-facebook fb"></i></a>
					</div>
				</div>
				<div class="testimony-content container">
					<p>
						"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum .
						
					</p>
					<p>
						John Grasin, CEO, IT-Planet
					</p>
					<div class="media-testimony">
						<a href="#" target="blank"><i class="fa fa-twitter twit"></i></a>
						<a href="#" target="blank"><i class="fa fa-linkedin linkedin"></i></a>
						<a href="#" target="blank"><i class="fa fa-facebook fb"></i></a>
					</div>
				</div>
				<div class="testimony-content container">
					<p>
						"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum .
						
					</p>
					<p>
						John Grasin, CEO, IT-Planet
					</p>
					<div class="media-testimony">
						<a href="#" target="blank"><i class="fa fa-twitter twit"></i></a>
						<a href="#" target="blank"><i class="fa fa-linkedin linkedin"></i></a>
						<a href="#" target="blank"><i class="fa fa-facebook fb"></i></a>
					</div>
				</div>
				<div class="testimony-content container">
					<p>
						"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia.
						
					</p>
					<p>
						John Grasin, CEO, IT-Planet
					</p>
					<div class="media-testimony">
						<a href="#" target="blank"><i class="fa fa-twitter twit"></i></a>
						<a href="#" target="blank"><i class="fa fa-linkedin linkedin"></i></a>
						<a href="#" target="blank"><i class="fa fa-facebook fb"></i></a>
					</div>
				</div>
				<div class="testimony-content container">
					<p>
						"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate.
						
					</p>
					<p>
						John Grasin, CEO, IT-Planet
					</p>
					<div class="media-testimony">
						<a href="#" target="blank"><i class="fa fa-twitter twit"></i></a>
						<a href="#" target="blank"><i class="fa fa-linkedin linkedin"></i></a>
						<a href="#" target="blank"><i class="fa fa-facebook fb"></i></a>
					</div>
				</div>
				<div class="testimony-content container">
					<p>
						"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum .
						
					</p>
					<p>
						John Grasin, CEO, IT-Planet
					</p>
					<div class="media-testimony">
						<a href="#" target="blank"><i class="fa fa-twitter twit"></i></a>
						<a href="#" target="blank"><i class="fa fa-linkedin linkedin"></i></a>
						<a href="#" target="blank"><i class="fa fa-facebook fb"></i></a>
					</div>
				</div>
				<div class="testimony-content container">
					<p>
						"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum . At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum .
						
					</p>
					<p>
						John Grasin, CEO, IT-Planet
					</p>
					<div class="media-testimony">
						<a href="#" target="blank"><i class="fa fa-twitter twit"></i></a>
						<a href="#" target="blank"><i class="fa fa-linkedin linkedin"></i></a>
						<a href="#" target="blank"><i class="fa fa-facebook fb"></i></a>
					</div>
				</div>
				<div class="testimony-content container">
					<p>
						"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti.	
					</p>
					<p>
						John Grasin, CEO, IT-Planet
					</p>
					<div class="media-testimony">
						<a href="#" target="blank"><i class="fa fa-twitter twit"></i></a>
						<a href="#" target="blank"><i class="fa fa-linkedin linkedin"></i></a>
						<a href="#" target="blank"><i class="fa fa-facebook fb"></i></a>
					</div>
				</div>
				<div class="testimony-content container">
					<p>
						"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.
						
					</p>
					<p>
						John Grasin, CEO, IT-Planet
					</p>
					<div class="media-testimony">
						<a href="#" target="blank"><i class="fa fa-twitter twit"></i></a>
						<a href="#" target="blank"><i class="fa fa-linkedin linkedin"></i></a>
						<a href="#" target="blank"><i class="fa fa-facebook fb"></i></a>
					</div>
				</div>
			</div>
		</div>
		
		
		
	
			
		<div class="advertise_your_post">
		  
		         <div class="col-lg-4  col-md-4 col-sm-4 col-xs-12">
				  <img src="images/business.png">
		   	          <p>Company  </p>
                    <a href="<?= Url::toRoute(['site/jobseekersregister'])?>">Register  </a>
				  </div>	
					  <div class="col-lg-4  col-md-4 col-sm-4 col-xs-12 new">
		   	        <img src="images/employee.png">
					 <p>Employee  </p>
                    <a href="<?= Url::toRoute(['site/employersregister'])?>">  Register</a>
				  </div>	
				    <div class="col-lg-4  col-md-4 col-sm-4 col-xs-12">
				  	  <img src="images/campus.png">
		   	          <p>Campus Zone  </p>
                    <a href="">Register  </a>
				  </div>				  
		  
		</div>
		
		
		 

	
</div><!-- end main wrapper -->