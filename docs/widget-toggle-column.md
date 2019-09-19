# Виджет "Переключатель" ToggleColumn

Колонка для GridView выводящая виджет-переключатель.
При смене состояния происходит AJAX-запрос по URL-адресу, полученному из `[[value]]`.

## Использование

```php
<?= \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'class' => 'chulakov\view\grid\ToggleColumn',
            'attribute' => 'is_active',
            'value' => function (Model $model) {
                return ['active', 'id' => $model->id];
            }
        ],
    ],
]); ?>
```
