<?php
/**
 * Файл класса BoxFilterWidget
 *
 * @copyright Copyright (c) 2019, Oleg Chulakov Studio
 * @link http://chulakov.com/
 */

namespace chulakov\view\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\base\ViewContextInterface;

class BoxFilterWidget extends Widget implements ViewContextInterface
{
    /**
     * @var string
     */
    public $title;
    /**
     * @var string|array
     */
    public $resetUrl = ['index'];
    /**
     * @var boolean
     */
    public $collapsed = true;
    /**
     * @var array
     */
    public $options = ['class' => 'box box-solid'];
    /**
     * @var string
     */
    public $headerLayout = 'header';
    /**
     * @var string
     */
    public $footerLayout = 'footer';

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();
        if (empty($this->title)) {
            $this->title = Yii::t('ch/all', 'Filters');
        }
        if ($this->collapsed) {
            Html::addCssClass($this->options, 'collapsed-box');
        }
        ob_start();
        ob_implicit_flush(false);
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        $content = ob_get_clean();

        $result = [];
        $result[] = Html::beginTag('div', $this->options);

        $result[] = $this->render($this->headerLayout, [
            'title' => $this->title,
            'collapsed' => $this->collapsed,
        ]);
        $result[] = Html::tag('div', $content, ['class' => 'box-body']);
        $result[] = $this->render($this->footerLayout, [
            'resetUrl' => $this->resetUrl,
        ]);
        $result[] = Html::endTag('div');

        return implode("\n", array_filter($result));
    }
}
