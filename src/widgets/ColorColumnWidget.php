<?php
/**
 * Файл класса ColorColumnWidget
 *
 * @copyright Copyright (c) 2019, Oleg Chulakov Studio
 * @link http://chulakov.com/
 */

namespace chulakov\view\widgets;

use yii\base\Model;
use yii\base\Widget;
use yii\helpers\Html;

class ColorColumnWidget extends Widget
{
    /**
     * @var Model
     */
    public $model;
    /**
     * @var string
     */
    public $attribute;

    /**
     * @inheritDoc
     */
    public function run()
    {
        $color = (string) $this->model->{$this->attribute};
        return Html::tag('div', '', [
            'style' => "background: {$color}; padding: 13px;",
        ]);
    }
}
