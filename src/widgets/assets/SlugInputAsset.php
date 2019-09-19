<?php
/**
 * Файл класса SlugInputAsset
 *
 * @copyright Copyright (c) 2018, Oleg Chulakov Studio
 * @link http://chulakov.com/
 */

namespace chulakov\view\widgets\assets;

use yii\web\AssetBundle;

class SlugInputAsset extends AssetBundle
{
    public $sourcePath = '@vendor/oleg-chulakov-studio/yii2-view/src/widgets/assets/slug-input';
    public $js = [
        'slug-input.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
