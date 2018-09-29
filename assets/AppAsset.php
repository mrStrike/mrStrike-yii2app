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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    	//CSS для работы респонсивных таблиц
    	//Документация  тут :http://gergeo.se/RWD-Table-Patterns/
    	'css/rwd-table.min.css',
    	'css/strike.css',
    ];
    public $js = [
    		'js/strike.js',
    		//JS для работы респонсивных таблиц
    		//Документация  тут :http://gergeo.se/RWD-Table-Patterns/    		
    		'js/rwd-table.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',    	
    ];
}
