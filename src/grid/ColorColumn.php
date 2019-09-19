<?php
/**
 * Файл класса ColorColumn
 *
 * @copyright Copyright (c) 2019, Oleg Chulakov Studio
 * @link http://chulakov.com/
 */

namespace chulakov\view\grid;

use yii\base\Model;
use yii\helpers\Html;
use yii\grid\DataColumn;
use chulakov\view\widgets\ColorColumnWidget;

class ColorColumn extends DataColumn
{
    /**
     * В каком формате значение каждой модели данных будет отображаться
     * 
     * @var string 
     */
    public $format = 'raw';
    /**
     * Атрибуты HTML для тега ячейки данных
     * 
     * @var array 
     */
    public $contentOptions = ['class' => 'text-center'];

    /**
     * @inheritDoc
     */
    public function renderDataCellContent($model, $key, $index)
    {
        if ($this->content === null) {
            return static::render($model, $this->attribute);
        }
        return parent::renderDataCellContent($model, $key, $index);
    }

    /**
     * Рендеринг колонки
     *
     * @param Model $model
     * @param string $attribute
     * @return string
     */
    public static function render(Model $model, string $attribute): string
    {
        return ColorColumnWidget::widget([
            'model' => $model,
            'attribute' => $attribute,
        ]);
    }
}
