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
        'vendor/fontawesome-free/css/all.min.css',
        'css/sb-admin-2.min.css',
        'css/leaflet.css',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
    ];
    public $js = [
        //  "vendor/jquery/jquery.min.js",
        // 'https://releases.jquery.com/git/jquery-3.x-git.slim.min.js',
        "vendor/bootstrap/js/bootstrap.bundle.min.js",
        "vendor/jquery-easing/jquery.easing.min.js",
        "js/sb-admin-2.min.js",
        "vendor/chart.js/Chart.min.js",
        // "js/demo/chart-area-demo.js",
        // "js/demo/chart-pie-demo.js",
        "js/leaflet.js",
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
