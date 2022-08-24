<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CostruzioneAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js_a/jquery_costruzione.js',
        'js_a/nicepage_costruzione.js'
    ];
    public $css = [
       'css_a/nicepage_costruzione.css',
        'css_a/Home_costruzione.css',
    ];
}
