<?php
$this->title = 'Company Profile';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
$url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
?>
	<div id="wrapper"><!-- start main wrapper -->
		 
	
		 
		<div class="inner_page second">
			<div class="container">
			  <div  id="profile-desc">
			   <div class="col-md-2 col-sm-2 col-xs-12">
			                 <div class="user-profile">
					
                                    <img src="<?php echo $url.$employer->logo->Doc ;?>" alt="<?php echo $employer->Name ;?>" class="img-responsive center-block ">
                                    <h3><?php echo $employer->Name ;?></h3>
                                </div> 
			      	</div>
		         <div class="col-md-10 col-sm-10 col-xs-12"> 
                            <div class="job-short-detail">
                                <div class="heading-inner">
                                    <p class="title"> Company / Consultant details</p>
					<a href="<?= Url::toRoute(['site/companyprofileeditpage'])?>">  <i class="fa fa-pencil-square-o orange"></i> Edit Profile</a>
                                </div>
								
                                <dl>
                                     
                                    <dt>Company Type</dt>
                                    <dd><?php echo  $employer->industry->IndustryName; ?> </dd>

                                    <dt> Company Email </dt>
                                    <dd><?php echo  $employer->Email; ?></dd>
 
                                    <dt>Address:</dt>
                                    <dd><?php echo  $employer->Address; ?> </dd>
									
				    <dt> Mobile Number  </dt>
                                    <dd> <?php echo  $employer->MobileNo; ?>    </dd>
									
									
				    <dt>  Contact Number</dt>
                                    <dd> <?php echo  $employer->ContactNo; ?>   </dd>

                                    <dt>City:</dt>
                                    <dd><?php echo  $employer->City; ?> </dd>

                                    <dt>State:</dt>
                                    <dd><?php echo  $employer->State; ?> </dd>

                                    <dt>Country:</dt>
                                    <dd><?php echo  $employer->Country; ?>  </dd>
									
				    <dt>Pincode</dt>
                                    <dd> <?php echo  $employer->PinCode; ?>  </dd>
                                </dl>
                            </div>
 
                        </div>
						 
	 <div class="clearfix"> </div>
	
						
				<div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="resume-box">
                                <div class="heading-inner">
                                    <p class="title">  Company Description </p>
                                </div>
                                <div class="row education-box">
                                    
                                    <div class="col-xs-12 col-md-12 col-sm-12">
                                        <div class="degree-info">
                                            <p><?php echo  html_entity_decode($employer->CompanyDesc); ?> </p>
                                             </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
						 
						 <div class="clearfix"> </div>
						 
						  
  </div>
            </div>
       </div>
		 
		
		
		
		<div class="border"></div>
</div>