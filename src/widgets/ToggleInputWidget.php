<?php
/**
 * Файл класса ToggleInputWidget
 *
 * @copyright Copyright (c) 2018, Oleg Chulakov Studio
 * @link http://chulakov.com/
 */

namespace chulakov\view\widgets;

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\InputWidget;
use yii\base\InvalidConfigException;
use chulakov\view\widgets\assets\ToggleInputAsset;

/**
 * Реализует логику работы виджета-переключателя взамен некрасивого чекбокса.
 * При смене состояния происходит AJAX-запрос по URL-адресу, полученному из [[updateRoute]].
 *
 * Пример конфигурации для поля изменения активности:
 * ```php
 *      <?= \common\widgets\toggle\ToggleInputWidget::widget([
 *             'model' => $model,
 *             'attribute' => 'is_active',
 *             'updateRoute' => ['active', 'id' => $model->id]
 *      ]); ?>
 * ```
 */
class ToggleInputWidget extends InputWidget
{
    /**
     * @var string
     */
    public $updateRoute;

    /**
     * {@inheritdoc}
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();

        if (!$this->updateRoute) {
            throw new InvalidConfigException("Роут для обновления состояния 'updateRoute' должен быть задан");
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        ToggleInputAsset::register($this->getView());
        return $this->renderInputHtml('checkbox');
    }

    /**
     * @inheritdoc
     */
    public function renderInputHtml($type)
    {
        $options = [];

        if ($this->hasModel()) {
            $options = [
                'checked' => (bool) $this->model->{$this->attribute}
            ];
        }

        $this->options = array_merge($this->options, $options);

        $isChecked = isset($this->options['checked']) && $this->options['checked'];

        $checkbox = parent::renderInputHtml($type)  . Html::tag('div', '', [
            'class' => 'toggle',
        ]);

        return Html::tag('div', $checkbox, [
            'class' => 'switch' . ($isChecked ? ' on' : ' off'),
            'data' => [
                'url' => Url::to($this->updateRoute)
            ]
        ]);
    }
}
