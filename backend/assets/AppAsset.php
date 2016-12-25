<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
     'bassets/css/icons/icomoon/styles.css',
	 'bassets/css/bootstrap.css',
	 'bassets/css/core.css',
	 'bassets/css/components.css',
	 'bassets/css/colors.css',
	 
	 
    ];
    public $js = [
		//'bassets/js/pages/dashboard.js',
        'bassets/js/plugins/loaders/pace.min.js',
		//'bassets/js/core/libraries/jquery.min.js',
		'bassets/js/core/libraries/bootstrap.min.js',
		'bassets/js/plugins/loaders/blockui.min.js',
		'bassets/js/core/app.js',
		'bassets/js/plugins/visualization/d3/d3.min.js',
		'bassets/js/plugins/visualization/d3/d3_tooltip.js',
		'bassets/js/plugins/forms/styling/switchery.min.js',
		'bassets/js/plugins/forms/styling/uniform.min.js',
		'bassets/js/plugins/forms/selects/bootstrap_multiselect.js',
		'bassets/js/plugins/ui/moment/moment.min.js',
		'bassets/js/plugins/pickers/daterangepicker.js',
		
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
