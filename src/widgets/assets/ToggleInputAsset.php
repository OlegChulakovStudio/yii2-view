<?php
/**
 * Файл класса ToogleAsset
 *
 * @copyright Copyright (c) 2018, Oleg Chulakov Studio
 * @link http://chulakov.com/
 */

namespace chulakov\view\widgets\assets;

use yii\web\AssetBundle;

class ToggleInputAsset extends AssetBundle
{
    public $sourcePath = '@vendor/oleg-chulakov-studio/yii2-view/src/widgets/assets/toggle';
    public $css = [
        'css/toogle-input.css',
    ];
    public $js = [
        'js/toogle-input.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
