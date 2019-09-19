# Виджет вывода цветовых значений

Виджет предназначен для вывода цветовых значений в формате их графичекого представления. Выводит элемент "иконку" цвета, вместо сложного для понимания шестнадцатиричного кода цвета.

## Использование

```php
<?= \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'class' => \chulakov\view\grid\ColorColumn::class,
            'attribute' => 'color',
        ],
    ],
]); ?>
```

Подключение для отдельного элемента:

```php
<?= \yii\widgets\DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'attribute' => 'color',
            'format' => 'raw',
            'value' => \chulakov\view\grid\ColorColumn::render($model, 'color'),
        ],
    ],
]); ?>
```

**Свойства:**

- `model` - array|object типа `yii\base\Model`
- `attribute` - Название свойства модели, содержащего зачение типа color
