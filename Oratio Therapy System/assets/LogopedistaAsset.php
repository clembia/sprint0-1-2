<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LogopedistaAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js_a/jquery_logopedista.js',
        'js_a/nicepage_logopedista.js'
    ];
    public $css = [
        //Richiamo css homepage logopedista
        'css_a/Home_logopedista.css',
        'css_a/nicepage_logopedista.css',
    ];
}
