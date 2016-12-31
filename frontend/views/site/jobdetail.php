<?php
$this->title = $allpost->JobTitle;

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
$url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
?>


	<div id="wrapper"><!-- start main wrapper -->
 
		<div class="headline_inner">
				<div class="row"> 
			       <div class=" container"><!-- start headline section --> 
						 <h2> <?=$allpost->JobTitle;?>   </h2>
						<div class="clearfix"></div>
					</div>
			</div><!-- end headline section -->
    	</div>
	
		 
		<div class="inner_page">
			<div class="container">
	 
					 <div class="row">
                   <div class="col-lg-3  col-md-4 col-sm-4 col-xs-12">
				    <aside>
                                 <div class="apply-job">
                                 <a href="<?= Url::toRoute(['site/bookmark','JobId'=>$allpost->JobId])?>"><i class="fa fa-star"></i>Bookmark</a>
				 </div>
                                <div class="company-detail">
                                    <div class="company-img">
										<?php
										if($allpost->docDetail)
										{
											$doc=$url.$allpost->docDetail->Doc;
										}
										else
										{
											$doc=$imageurl.'images/user.png';
										}
										?>
                                        <img src="<?=$doc;?>" class="img-responsive" alt="">
                                    </div>
                                    <div class="company-contact-detail">
                                        <table>
                                            <tbody><tr>
                                                <th>Name:</th>
                                                <td><?=$allpost->CompanyName;?></td>
                                            </tr>
                                            <tr>
                                                <th>Email:</th>
                                                <td><?=$allpost->Email;?></td>
                                            </tr>
                                            <tr>
                                                <th>Phone:</th>
                                                <td> +<?=$allpost->Phone;?></td>
                                            </tr>
                                            <tr>
                                                <th>Website:</th>
                                                <td><?=$allpost->Website;?></td>
                                            </tr>
                                            <tr>
                                                <th>Address:</th>
                                                <td> <?=$allpost->City.' ,'.$allpost->State;?></td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                </div>
                            </aside>
							
                            <div class="widget">
                                <div class="widget-heading"><span class="title">Short Discription</span></div>
                                <ul class="short-decs-sidebar">
                                    <li>
                                        <div>
                                            <h4>Job Type:</h4></div>
                                        <div><i class="fa fa-bars"></i><?=$allpost->JobType;?></div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>Job Experience:</h4></div>
                                        <div><i class="fa fa-clock-o"></i><?php if($allpost->Experience!='Fresher'){ echo $allpost->Experience.' Year';}else{echo $allpost->Experience;}?></div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>Job Shift:</h4></div>
                                        <div><i class="fa fa-calendar"></i><?=$allpost->JobShift;?> </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>Posted On:</h4></div>
                                        <div><i class="fa fa-calendar"></i><?=date('d M, Y',strtotime($allpost->OnDate));?> </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>Location:</h4></div>
                                        <div><i class="fa fa-location-arrow"></i><?=$allpost->Location;?></div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>Expected Salary:</h4></div>
                                        <div><i class="fa fa-rupee"></i><?=$allpost->Salary;?> / Annum</div>
                                    </li>
                                </ul>
                            </div>
                        <?php
                        if(Yii::$app->session['Employeeid'])
                        {
                        ?>
                            <div class="apply-job">
                                 <a href="<?= Url::toRoute(['site/applyjob','JobId'=>$allpost->JobId])?>" class=""> <i class="fa fa-upload"></i>Apply For Position</a>
                            </div>
                        <?php
                        }else
                        {
                        ?>
                            <div class="apply-job">
                                 <a href="<?= Url::toRoute(['site/login','JobId'=>$allpost->JobId])?>" class=""> <i class="fa fa-upload"></i>Apply For Position</a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                        <div class="col-lg-9  col-md-8 col-sm-8 col-xs-12">
                            <div class="single-job-page-2 job-short-detail">
                                <div class="heading-inner">
                                    <p class="title">Job Description</p>
                                </div>
                                <div class="job-desc job-detail-boxes">
                                    <p class="margin-bottom-20">
                                        <?=htmlspecialchars_decode($allpost->JobDescription);?>
                                    </p>
                                    <div class="heading-inner">
                                        <p class="title">Job Specification:</p>
                                    </div>
                                    <p class="margin-bottom-20">
                                        <?=htmlspecialchars_decode($allpost->JobSpecification);?>
                                    </p>

                                    <div class="heading-inner">
                                        <p class="title">Technical Guidance:</p>
                                    </div>
                                    <p class="margin-bottom-20"><?=htmlspecialchars_decode($allpost->TechnicalGuidance);?></p>
                                </div>

                            </div>
                        </div>
                      
                </div>
				  

      </div>
		    </div>
		<div class="border"></div>