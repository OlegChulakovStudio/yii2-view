<?php
/**
 * Файл класса ImageColumnWidget
 *
 * @copyright Copyright (c) 2019, Oleg Chulakov Studio
 * @link http://chulakov.com/
 */

namespace chulakov\view\widgets;

use yii\base\Model;
use yii\base\Widget;
use yii\helpers\Html;
use chulakov\filestorage\models\BaseFile;

class ImageColumnWidget extends Widget
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
     * @var int
     */
    public $maxHeight;

    /**
     * @inheritDoc
     */
    public function run()
    {
        if (empty($this->model->{$this->attribute})) {
            return null;
        }

        $url = $this->model->{$this->attribute};
        if ($url instanceof BaseFile) {
            $url = $url->getUrl();
        }

        $img = Html::img($url, ['style' => "max-height: {$this->maxHeight}px;"]);

        return Html::a($img, $url, [
            'target' => '_blank',
        ]);
    }
}
