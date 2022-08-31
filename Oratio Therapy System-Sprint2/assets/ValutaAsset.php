<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ValutaAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js_a/jquery_valuta.js',
        'js_a/nicepage_valuta.js'
    ];
    public $css = [
       'css_a/nicepage_valuta.css',
        'css_a/Home_valuta.css',
    ];
}
