# Виджет показа превью изображения

Виджет предназначен для вывода превью для загруженных изображений с возможностью их открытия в новой вкладке при клике, тем самым лишая необходимости каждый раз вручную настраивать вывод картинок. 

## Использование

Подключение для вывода превью для списка элементов:

```php
<?= \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'class' => \chulakov\view\grid\ImageColumn::class,
            'attribute' => 'image',
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
            'attribute' => 'image',
            'format' => 'raw',
            'value' => \chulakov\view\grid\ImageColumn::render($model, 'image'),
        ],
    ],
]); ?>
```

**Свойства:**

- `model` - array|object типа `yii\base\Model`
- `attribute` - Название свойства модели, содержащего зачение типа image
- `format` - формат отображения данных
- `maxHeight` - Максимальная высота превью изображение, по умолчанию 27px
