# Расширенный класс ActionColumn

Расширенный класс колонки действий.
Кроме возможности добавить по умолчанию кнопки сортировки указанием из в `$template`,
реализована возможность переопределить сообщение подтверждения удаления без боли
и иконки перерисованы с Bootstrap на FontAwesome.

## Использование

```php
<?= \yii\grid\GridView::widget([
'dataProvider' => $dataProvider,
'columns' => [
    ...
    [
        'class' => 'chulakov\components\widgets\ActionColumn',
        'template' => '{up} {down} {customized} {view}',
        'deleteMessage' => 'It will delete all related data. Are you sure?',
        'buttons' => [
            'customized' => function ($url, $model, $id) {
                ...
            },
        ]
    ],
]); ?>
```

**Свойства:**

- `deleteMessage` - Позволяет задавать пользоватлеьское сообщение подтверждения при удалении.
- `template` - Шаблон дейтсвий, добавлена возможность указать кнопки сортировки по умолчанию.

