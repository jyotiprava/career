<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'bootstrap/css/bootstrap.min.css',
        
        'css/style.css',
        
        'font-awesome/css/font-awesome.css',
        
        'css/owl.carousel.css',
        'css/owl.theme.css',
        'css/owl.transitions.css',
        
        'css/jslider.css',
        'css/jslider.round.css'
    ];
    public $js = [
        'js/jquery.min.js',
        
        'bootstrap/js/bootstrap.min.js',
        
        'js/jquery.easytabs.min.js',
        'js/modernizr.custom.49511.js',
        'js/owl.carousel.js',
        
        'js/jshashtable-2.1_src.js',
        'js/jquery.numberformatter-1.2.3.js',
        'js/tmpl.js',
        'js/jquery.dependClass-0.1.js',
        'js/draggable-0.1.js',
        'js/jquery.slider.js',
        
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
