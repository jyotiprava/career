<?php
$this->title = 'Thankyou';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$imageurl=Yii::$app->getUrlManager()->getBaseUrl().'/';
?>

<div id="wrapper"><!-- start main wrapper -->

		<div class="inner_page second">
			<div class="container" style="border: 5px solid #f2f2f2;text-align: center;padding: 30px;">
			  <div  id="profile-desc">
			   <img src="<?=$imageurl;?>images/thankyou.png" style="width: 120px;"/>
               <br/><br/>
               <h4>Thank you for register with us.</h4>
			  </div>
            </div>
       </div>

</div>

<script type="text/javascript">
    <?php
    if(isset(Yii::$app->session['Employeeid']))
    {
    ?>
    setTimeout(function(){window.location.href="<?= Url::toRoute(['site/profilepage'])?>"},5000);
    <?php
    }elseif(isset(Yii::$app->session['Employerid']))
    {
    ?>
    setTimeout(function(){window.location.href="<?= Url::toRoute(['site/companyprofile'])?>"},5000);
    <?php
    }
    ?>
</script>