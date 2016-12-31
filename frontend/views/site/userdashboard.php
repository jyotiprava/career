<?php
$this->title = 'Dashboard';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
?>
<div id="wrapper"><!-- start main wrapper -->

		<div class="inner_page">
			<div class="container">
                  <div  id="profile-desc">
                    <div class="col-md-2 col-sm-2 col-xs-12">
			                 <div class="user-profile">
					
                                    <img src="<?php echo Yii::$app->session['EmployeeDP'] ;?>" alt="<?php echo Yii::$app->session['EmployeeName'] ;?>" class="img-responsive center-block ">
                                    <h3><?php echo Yii::$app->session['EmployeeName'] ;?></h3>
                                </div> 
			      	</div>
		         <div class="col-md-10 col-sm-10 col-xs-12">
						<div class="col-md-3">
								<div style="border-radius: 3px; box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05); margin-bottom: 20px;background-color: #26a69a;border-color: #26a69a;color: #fff;height: 120px;">
										<a href="<?= Url::toRoute(['site/appliedjob'])?>"><div style="padding: 20px;">
												<h3 style="font-size: 21px;color: #fff;margin: 0px;"><?=$appliedjob;?></h3>
												<div style="font-size:12px;color: #fff;">Total Applied</div>
												
										</div></a>
								</div>
						</div>
						<div class="col-md-3">
								<a href="<?= Url::toRoute(['site/bookmarkjob'])?>"><div style="border-radius: 3px; box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05); margin-bottom: 20px;background-color: #ec407a;border-color: #ec407a;color: #fff;height: 120px;">
										<div style="padding: 20px;">
												<h3 style="font-size: 21px;color: #fff;margin: 0px;"><?=$bookmarked;?></h3>
												<div style="font-size:12px;">Total Bookmark</div>
										</div>
								</div></a>
						</div>
						
                 </div>
                  </div>
				  
					 <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12"  id="mobile_design">
					   
                     </div>
      </div>
		    </div>
		 
		
		
		<div class="border"></div>