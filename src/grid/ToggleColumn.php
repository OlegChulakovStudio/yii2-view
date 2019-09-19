<?php
/**
 * Файл класса ToggleColumn
 *
 * @copyright Copyright (c) 2019, Oleg Chulakov Studio
 * @link http://chulakov.com/
 */

namespace chulakov\view\grid;

use chulakov\view\widgets\ToggleInputWidget;
use yii\base\Model;
use yii\grid\DataColumn;
use yii\db\ActiveRecord;

/**
 * Колонка для GridView выводящая виджет-переключатель.
 * При смене состояния происходит AJAX-запрос по URL-адресу, полученному из [[value]].
 *
 * Пример конфигурации для поля изменения активности:
 * ```php
 *      <?= GridView::widget([
 *          'dataProvider' => $dataProvider,
 *          'columns' => [
 *              ...
 *              [
 *                  'class' => 'chulakov\view\grid\ToggleColumn',
 *                  'attribute' => 'is_active',
 *                  'value' => function (Model $model) {
 *                      return ['active', 'id' => $model->id];
 *                  }
 *              ],
 *              ...
 *      ]); ?>
 * ```
 */
class ToggleColumn extends DataColumn
{
    /**
     * Подготовка элемента для вывода
     *
     * @param array|Model|ActiveRecord $model
     * @param mixed $key
     * @param int $index
     * @return string
     * @throws \Exception
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        if ($this->content === null) {
            return static::render(
                $model,
                $this->attribute,
                $this->getDataCellValue($model, $key, $index)
            );
        }
        return parent::renderDataCellContent($model, $key, $index);
    }

    /**
     * Рендеринг колонки
     *
     * @param Model $model
     * @param string $attribute
     * @param string $route
     * @return string
     * @throws \Exception
     */
    public static function render(Model $model, string $attribute, string $route): string
    {
        return ToggleInputWidget::widget([
            'model' => $model,
            'attribute' => $attribute,
            'updateRoute' => $route,
        ]);
    }
}
