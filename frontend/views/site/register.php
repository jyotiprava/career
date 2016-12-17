<?php
use yii\helpers\Url;
?>
<div id="wrapper"><!-- start main wrapper -->
 
	  
		<div class="headline_inner">
				<div class="row"> 
			       <div class=" container"><!-- start headline section --> 
						 <h2>Register   </h2>
						<div class="clearfix"></div>
					</div>
			</div><!-- end headline section -->
    	</div>
	
		 
		<div class="inner_page">
			 
						<div class="container" >
							<div class="row main" id="register">
							 
							<div class="col-lg-6  col-md-6 col-sm-6 col-xs-12">
								  <h2>
								     <a  href="<?= Url::toRoute(['site/jobseekersregister'])?>" > 
								      <img class="normal" src="images/job_seekers.png">
								   	  <img class="img_white" src="images/job_seekers_white.png"> 
								    </a> 
								  </h2>
								 
							</div>
							<div class="col-lg-6  col-md-6 col-sm-6 col-xs-12">
								  <h2> <a  href="<?= Url::toRoute(['site/employersregister'])?>" >
										 <img class="normal"  src="images/company.png">
										 <img class="img_white" src="images/company_white.png">
										 </a> 	
								  </h2>
								 
							</div>
						</div>

             </div>
    </div>
		 <div class="clearfix"></div>
		<div class="border"></div>
</div>