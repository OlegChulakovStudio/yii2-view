# Виджет "Переключатель активности"

Реализует логику работы виджета-переключателя взамен некрасивого чекбокса.
При смене состояния происходит AJAX-запрос по URL-адресу, полученному из `[[updateRoute]]`.
Пример конфигурации для поля изменения активности:

## Использование

```php
<?= \chulakov\view\widgets\ToggleInputWidget::widget([
    'model' => $model,
    'attribute' => 'is_active',
    'updateRoute' => ['active', 'id' => $model->id],
]); ?>
```