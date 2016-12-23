<?php
$this->title = 'Edit Company Profile Pages';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
$url=str_replace('frontend','backend',(str_replace('web','',Yii::$app->getUrlManager()->getBaseUrl())));
?>
<style>
  .editcontainer{
    width: 20px;
    height: 20px;
    padding: 4px;
    float: right;
    cursor: pointer;
}
.select-wrapper {
    background: url(images/edit.png) no-repeat;
    background-size: cover;
    display: block;
    position: relative;
    width: 15px;
    height: 15px;
}
#image_src {
    width: 15px;
    height: 15px;
    margin-right: 100px;
    opacity: 0;
    filter: alpha(opacity=0); /* IE 5-7 */
}
</style>
	<div id="wrapper"><!-- start main wrapper -->
	 
		 
		<div class="inner_page second">
			<div class="container">
			  <div  id="profile-desc">
			<?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>		        
			   <div class="col-md-2 col-sm-2 col-xs-12">
			                 <div class="user-profile">
                                    <img src="<?php echo $url.$employer->logo->Doc ;?>" alt="<?php echo $employer->Name ;?>" class="img-responsive center-block ">	<div class="editcontainer">
					<span class="select-wrapper">
					  <input type="file"  name="AllUser[LogoId]" id='image_src'/>
					</span>
				      </div>
				    
                                    <h3><input type="text" class="form-control" required name="AllUser[Name]" id="Name" value="<?php echo $employer->Name ;?>" placeholder="Name"></h3>
                                </div> 
			      	</div>
			 <div class="col-md-10 col-sm-10 col-xs-12"> 
                            <div class="job-short-detail" id="edit_profile_page">
                                <div class="heading-inner">
                                    <p class="title"> Company / Consultant details</p>
									
									<!--<a href="#">  <i class="fa fa-floppy-o orange"></i> Save Changes  </a>-->
									<a href="#"> <i class="fa fa-floppy-o orange"></i> <input type="submit" value="Save Changes " style="border-color: #333;background-color: #333;padding: 5px 0px 5px 3px;height: 40px;width: 115px;margin-top: -10px; margin-right: -13px;"></a>
                                </div>
								 
                                <dl>
                                     
                                    <dt>Company Type</dt>
                                    <dd><select name="AllUser[IndustryId]" required class="form-control">
                    
										<option selected="selected" value="">- Select an Industry -</option>
										<?php foreach($industry as $key=>$value){?>
										<option value="<?php echo $key;?>" <?php if($key==$employer->IndustryId){ echo "selected"; } ?> ><?=$value;?></option>
										<?php } ?>
								</select>
				    </dd>


                                   <dt> Company Email </dt>
                                   <dd><input type="text" class="form-control" readonly required name="AllUser[Email]" id="Email" value="<?php echo $employer->Email ;?>" placeholder="Enter your Email"></dd>
				   <dt>Address:</dt>
                                   <dd><input type="text" class="form-control" required name="AllUser[Address]" id="Address" value="<?php echo $employer->Address ;?>" placeholder="Address"></dd>
				   <dt> Mobile Number  </dt> 
				   <dd><input type="text" class="form-control" required name="AllUser[MobileNo]" id="MobileNo" onkeypress="return numbersonly(event)" onblur="return IsMobileno(this.value);" value="<?php echo $employer->MobileNo ;?>" placeholder="MobileNo"></dd>
				   <dt>  Contact Number </dt>
				   <dd><input type="text" class="form-control"required name="AllUser[ContactNo]" id="ContactNo" value="<?php echo $employer->ContactNo ;?>" placeholder="ContactNo"></dd>
				   
                   <dt>  Country </dt>
				   <dd><input type="text" class="form-control"required name="AllUser[Country]" id="Country" value="<?php echo $employer->Country; ?>" placeholder="Country"></dd>
				   
                   <dt>  State </dt>
				   <dd><input type="text" class="form-control"required name="AllUser[State]" id="State" value="<?php echo $employer->State ;?>" placeholder="State"></dd>
				   
                   <dt>  City </dt>
				   <dd><input type="text" class="form-control"required name="AllUser[City]" id="City" value="<?php echo $employer->City ;?>" placeholder="City"></dd>
				   
                   <dt>Pincode:</dt>
                   
				   <dd><input type="text" class="form-control"  name="AllUser[PinCode]" value="<?php echo  $employer->PinCode; ?>"  id="email" placeholder="Pincode"></dd>
				 
				 <dt>Description:</dt>
                 
				 <dd><textarea type="text" class="form-control" rows="10" name="AllUser[CompanyDesc]" id="CompanyDesc" placeholder="Company Description"><?php echo  html_entity_decode($employer->CompanyDesc); ?></textarea></dd>
                 </dl>
                            </div>
 
                        </div>
			<?php ActiveForm::end(); ?>			 
	 <div class="clearfix"> </div>
	
						
				<div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="resume-box">
                                <div class="heading-inner">
                                    <p class="title">  Company Description </p>
                                </div>
                                <div class="row education-box">
                                    
                                    <div class="col-xs-12 col-md-12 col-sm-12">
                                        <div class="degree-info">
                                            <p><?php echo  html_entity_decode($employer->CompanyDesc); ?></p>
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