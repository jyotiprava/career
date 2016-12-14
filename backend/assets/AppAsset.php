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
        'css/site.css',
        'css/bootstrap.min.css',
        'css/font-awesome/4.2.0/css/font-awesome.min.css',
        'css/jquery-ui.custom.min.css',
        'css/chosen.min.css',
	'css/datepicker.min.css',
	'css/bootstrap-timepicker.min.css',
	'css/daterangepicker.min.css',
        'css/bootstrap-multiselect.min.css',
	'css/bootstrap-datetimepicker.min.css',
	'css/colorpicker.min.css',
        'fonts/fonts.googleapis.com.css',
        'css/jquery-ui.custom.min.css',
        'css/fullcalendar.min.css',
        'css/ace.min.css',
        'css/ace-part2.min.css',
        'css/ace-rtl.min.css',
        'css/ace-ie.min.css',
        'css/bootstrap-responsive-tabs.css',
        'css/style.css',
        'css/responsive.css',
	'css/jquery-ui.css'
    ];
    public $js = [
        'js/html5shiv.min.js',
          'js/respond.min.js',
          //'js/jquery.2.1.1.min.js',
          'js/jquery.bootstrap-responsive-tabs.min.js',
          'js/bootstrap.min.js',
          'js/excanvas.min.js',
          'js/jquery-ui.custom.min.js',
		'js/jquery.ui.touch-punch.min.js',
			'js/chosen.jquery.min.js',
			'js/fuelux.spinner.min.js',
                'js/bootstrap-multiselect.min.js',
                'js/select2.min.js',
		'js/bootstrap-datepicker.min.js',
		'js/bootstrap-timepicker.min.js',
		'js/moment.min.js',
		'js/fullcalendar.min.js',
		'js/daterangepicker.min.js',
		'js/bootstrap-datetimepicker.min.js',
		'js/bootstrap-colorpicker.min.js',
		'js/jquery.knob.min.js',
		'js/jquery.autosize.min.js',
		'js/jquery.inputlimiter.1.3.1.min.js',
		'js/jquery.maskedinput.min.js',
		'js/bootstrap-tag.min.js',
                'js/jquery.dataTables.min.js',
		'js/jquery.dataTables.bootstrap.min.js',
		'js/dataTables.tableTools.min.js',
		'js/dataTables.colVis.min.js',
                
                'js/ace-elements.min.js',
                'js/ace.min.js',
                'js/ace-extra.min.js',

        //'js/main.js',
		'js/user.js',
		'js/custom.js',
                'js/bootbox.min.js',
       // 'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
