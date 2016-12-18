<div id="wrapper"><!-- start main wrapper -->
		 
			  
					 
	
		 
		<div class="inner_page second">
			<div class="container">
			  <div  id="profile-desc">
			   <div class="col-md-2 col-sm-2 col-xs-12">
			                 <div class="user-profile">
                                    <img src="images/user.png" alt="" class="img-responsive center-block ">
                                    <h3><?=$profile->Name;?></h3>
                                </div> 
			      	</div>
		         <div class="col-md-10 col-sm-10 col-xs-12"> 
                            <div class="job-short-detail">
                                <div class="heading-inner">
                                    <p class="title">Profile detail</p>
									
									<a href="">  <i class="fa fa-pencil-square-o orange"></i> Edit Profile</a>
                                </div>
								
								
								
                                <dl>
                                     
                                    <dt>Phone:</dt>
                                    <dd>+<?=$profile->MobileNo;?> </dd>

                                    <dt>Email:</dt>
                                    <dd><?=$profile->Email;?> </dd>
 
                                    <dt>Address:</dt>
                                    <dd><?=$profile->Address;?></dd>

                                    <dt>City:</dt>
                                    <dd><?=$profile->City;?></dd>

                                    <dt>State:</dt>
                                    <dd><?=$profile->State;?></dd>

                                    <dt>Country:</dt>
                                    <dd><?=$profile->Country;?></dd>
                                </dl>
                            </div>
 
                        </div>
						 
	 <div class="clearfix"> </div>
	
						
				<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="resume-box">
                                <div class="heading-inner">
                                    <p class="title">Educational Information  <span><?=$profile->educations[0]->DurationFrom;?> to <?=$profile->educations[0]->DurationTo;?></span></p>
                                </div>
                                <div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                           <i class="fa fa-file-text" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4>Higest Qualification</h4>
                                           
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4><?=$profile->educations[0]->HighestQualification;?></h4>
                                             </div>
                                    </div>
                                </div>
                                <div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                            <i class="fa fa-files-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4>Course</h4> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4><?=$profile->educations[0]->course->CourseName;?></h4>
                                             </div>
                                    </div>
                                </div>
                                <div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                              <i class="fa fa-briefcase" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4>University / College</h4>
                                           
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4><?=$profile->educations[0]->University;?></h4>
                                             </div>
                                    </div>
                                </div>
								
								 <div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                             <i class="fa fa-file-text" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4> 	Skills</h4>
                                             
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4><?=$profile->educations[0]->skill->Skill;?></h4>
                                             </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						 
						 <div class="clearfix"> </div>
						 
						 
						 
						 		
				<div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="resume-box">
                                <div class="heading-inner">
                                    <p class="title">  Work Experience  <span><?=$profile->experiences[0]->YearFrom;?> to <?=$profile->experiences[0]->YearTo;?></span></p>
                                </div>
                                <div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                           <i class="fa fa-file-text" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4>Company name</h4>
                                           
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4><?=$profile->experiences[0]->CompanyName;?></h4>
                                             </div>
                                    </div>
                                </div>
                                <div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                            <i class="fa fa-files-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4>Position</h4> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4><?=$profile->experiences[0]->position->Position;?></h4>
                                             </div>
                                    </div>
                                </div>
                                <div class="row education-box">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="resume-icon">
                                              <i class="fa fa-briefcase" aria-hidden="true"></i>
                                        </div>
                                        <div class="insti-name">
                                            <h4>Experience</h4>
                                           
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8 col-sm-8">
                                        <div class="degree-info">
                                            <h4><?=$profile->experiences[0]->Experience;?></h4>
                                             </div>
                                    </div>
                                </div>
								
								  
                            </div>
                        </div>
	
  </div>
            </div>
       </div>
		 
		
		
		
		<div class="border"></div>
</div>