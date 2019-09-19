<?php
/**
 * Файл класса ActionColumn
 *
 * @copyright Copyright (c) 2019, Oleg Chulakov Studio
 * @link http://chulakov.com/
 */

namespace chulakov\view\grid;

use Yii;
use yii\helpers\Html;

/**
 * Расширенный класс колонки действий.
 * Кроме возможности добавить по умолчанию кнопки сортировки указанием из в $template,
 * реализована возможность переопределить сообщение подтверждения удаления без боли
 * и иконки перерисованы с Bootstrap на FontAwesome.
 */
class ActionColumn extends \yii\grid\ActionColumn
{
    /**
     * @var string Сообщения для кнопки удаления
     */
    public $deleteMessage;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (empty($this->deleteMessage)) {
            $this->deleteMessage = Yii::t('yii', 'Are you sure you want to delete this item?');
        }
        parent::init();
    }

    /**
     * Initializes the default button rendering callbacks.
     */
    protected function initDefaultButtons()
    {
        $this->initDefaultButton('up', 'arrow-up', [
            'data-method' => 'post',
        ]);
        $this->initDefaultButton('down', 'arrow-down', [
            'data-method' => 'post',
        ]);
        $this->initDefaultButton('view', 'eye');
        $this->initDefaultButton('update', 'pen');
        $this->initDefaultButton('delete', 'trash', [
            'data-confirm' => $this->deleteMessage,
            'data-method' => 'post',
        ]);
    }

    /**
     * Initializes the default button rendering callback for single button.
     *
     * @param string $name Button name as it's written in template
     * @param string $iconName The part of FontAwesome icons class that makes it unique
     * @param array $additionalOptions Array of additional options
     * @since 2.0.11
     */
    protected function initDefaultButton($name, $iconName, $additionalOptions = [])
    {
        if (!isset($this->buttons[$name]) && strpos($this->template, '{' . $name . '}') !== false) {
            $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions) {
                switch ($name) {
                    case 'view':
                        $title = Yii::t('yii', 'View');
                        break;
                    case 'update':
                        $title = Yii::t('yii', 'Update');
                        break;
                    case 'delete':
                        $title = Yii::t('yii', 'Delete');
                        break;
                    default:
                        $title = ucfirst($name);
                }
                $options = array_merge([
                    'title' => $title,
                    'aria-label' => $title,
                    'data-pjax' => '0',
                ], $additionalOptions, $this->buttonOptions);
                $icon = Html::tag('span', '', ['class' => "fa fa-$iconName"]);
                return Html::a($icon, $url, $options);
            };
        }
    }
}
