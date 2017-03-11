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
        'css/main/style.css',
        'css/main/animate.css',
        'css/main/font-awesome.css',
        'css/site.css',
        'css/main.css',
    ];
    public $js = [
        'js/main.js',
        'js/main/jquery.metisMenu.js',
        'js/main/jquery.slimscroll.js',
        'js/main/inspinia.js',
        'js/main/pace.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
