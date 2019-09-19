<?php
/**
 * Файл класса PerPageWidget
 *
 * @copyright Copyright (c) 2019, Oleg Chulakov Studio
 * @link http://chulakov.com/
 */

namespace chulakov\view\widgets;

use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\data\Pagination;

class PageSizeWidget extends Widget
{
    /**
     * @var Pagination;
     */
    public $pagination;
    /**
     * Значение шага или список каличества записей на странице
     *
     * @var int|array
     */
    public $pageSize;
    /**
     * Максимальное количество записей на странице
     *
     * @var integer
     */
    public $maxPageSize;

    /**
     * @var integer
     */
    protected $defaultMaxPageSize;

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();
        if (empty($this->pagination) || !($this->pagination instanceof Pagination)) {
            throw new InvalidConfigException('The "pagination" option is required.');
        }
        $this->defaultMaxPageSize = (int) end($this->pagination->pageSizeLimit);
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        $pageList = $this->generatePageSizeList();

        $select = Html::dropDownList($this->pagination->pageSizeParam, $this->getPerPage(),
            array_combine($pageList, $pageList), ['class' => 'form-control']
        );

        return Html::tag('div', $select, ['class' => 'pagesize']);
    }

    /**
     * Генерация списка каличества записей на странице
     *
     * @return array
     */
    protected function generatePageSizeList(): array
    {
        if (is_array($this->pageSize)) {
            return $this->pageSize;
        }
        return range(
            $this->pagination->defaultPageSize,
            $this->getMaxPageSize(),
            (int) $this->pageSize
        );
    }

    /**
     * Получение размера страницы
     *
     * @return int
     */
    protected function getPerPage(): int
    {
        $perPage = \Yii::$app->request->get($this->pagination->pageSizeParam);

        return $perPage ?? $this->pagination->defaultPageSize;
    }

    /**
     * Возвращает максимальное количество записей на странице
     *
     * @return int
     */
    protected function getMaxPageSize(): int
    {
        if (isset($this->maxPageSize) && $this->defaultMaxPageSize > $this->maxPageSize) {
            return $this->maxPageSize;
        }
        return $this->defaultMaxPageSize;
    }
}
