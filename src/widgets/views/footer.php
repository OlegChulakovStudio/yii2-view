<?php
/**
 * Файл шаблона footer
 *
 * @copyright Copyright (c) 2019, Oleg Chulakov Studio
 * @link http://chulakov.com/
 *
 * @var string|array $resetUrl
 */

use yii\helpers\Url;

?>

<div class="box-footer">
    <button type="submit" class="btn btn-primary">
        <i class="fa fa-search"></i> <?= \Yii::t('ch/all', 'Search'); ?>
    </button>
    <a class="btn btn-default" href="<?= Url::to($resetUrl); ?>">
        <i class="fa fa-times"></i> <?= \Yii::t('ch/all', 'Reset'); ?>
    </a>
</div>
