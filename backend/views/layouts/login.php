<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
$url=Yii::$app->getUrlManager()->getBaseUrl();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login-layout" style="background:#fff;">
<?php $this->beginBody() ?>

<div class="wrap">
   <div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1" style="margin-top:5%;">
						<div class="login-container">
							<div class="center" >
								<img src="<?= $url ?>/images/logo.png" width="250" >
                                                        </div>

							<div class="space-6"></div>

        <?= $content ?>
 
</div>
                      



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
