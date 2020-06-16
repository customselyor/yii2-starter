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
        'static/css/style.css',
    ];
    public $js = [
        'ckeditor/ckeditor.js',
        'jquery-menu-editor.min.js',
        'bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js',
        'bootstrap-iconpicker/js/bootstrap-iconpicker.min.js',
        'static/js/scripts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'common\assets\AdminLte',
        'common\assets\Html5shiv',
    ];
}
