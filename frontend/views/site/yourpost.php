<?php
$this->title = 'My Post';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
?>
<div id="wrapper"><!-- start main wrapper -->

		<div class="inner_page">
			<div class="container">

					 <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12"  id="mobile_design">

					   <h4><i class="glyphicon glyphicon-briefcase"></i> My Post</h4>

		<?php
				foreach($allpost as $key=>$value)
				{
						if($value->JobStatus==0)
						{
								$status='Open';
								$background='green';
						}
						else
						{
								$status='Closed';
								$background='red';
						}
						?>
						
		<div class="item-list">
                <a href="<?= Url::toRoute(['site/postdetail','JobId'=>$value->JobId])?>">
                <div class="col-sm-12 add-desc-box">
						<div class="applied_job" style="background: <?=$background;?>">
								<p><?=$status;?></p>
							  </div>
						
                  <div class="add-details">
                    <h5 class="add-title"><?=$value->JobTitle;?></h5>
                    <div class="info"> 
                      <span class="category"><?=$value->position->Position;?></span> -
                      <span class="item-location"><i class="fa fa-map-marker"></i> <?=$value->Location;?></span> <br>
                    <span> <strong><?=$value->CompanyName;?></strong> </span>
					</div>
                    <div class="info bottom">
					    <div class="col-sm-3 col-xs-3">
					    	<span class="styl">Experience : </span>  
					    </div>
						<div class="col-sm-9 col-xs-9 left-text">
							<span class="category"><?php if($value->Experience!='Fresher'){ echo $value->Experience.' Year';}else{echo $value->Experience;}?></span>  
                      </div>
					 </div> 
					  <div class="info bottom">
					     <div class="col-sm-3 col-xs-3">
					    	<span class="styl">Keyskills : </span>  
					    </div>
						<div class="col-sm-9 col-xs-9 left-text">
							<span class="category">
								<?php
								$skill='';
								foreach($value->jobRelatedSkills as $k=>$v)
								{
								$skill.=$v->skill->Skill.' , ';
								}
								echo $skill;
								?>
							</span>  
                      </div>
					 </div>
					 
					   <div class="info bottom">
					    <div class="col-sm-3 col-xs-3">
					    	<span class="styl">Job Description : </span>  
					    </div>
						<div class="col-sm-9 col-xs-9 left-text">
							<span class="category"><?=substr(htmlspecialchars_decode($value->JobDescription),0,150);?></span>  
                      </div>
					 </div>
					 
					  <div class="info bottom">
					    <div class="col-sm-3 col-xs-3">
					    	<span class="styl">Salary Range </span>  
					    </div>
						<div class="col-sm-9 col-xs-9 left-text">
							<span class="category"><?=$value->Salary;?></span>  
                      </div>
					 </div> 
					 
					<div class="info bottom"> 
						<span class="category" style="text-align:right">    Posted By <?=Yii::$app->session['EmployerName'].' ('.date('d M Y, h:i A',strtotime($value->OnDate)).')';?></span> 
                    </div> 
                  </div>
                </div>
                </a>
              </div>
 <?php
				}
				?>
 
  
                        </div>
      </div>
		    </div>
		 
		
		
		<div class="border"></div>