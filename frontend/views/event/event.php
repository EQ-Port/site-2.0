<?php
use yii\helpers\Html;

$this->title = Html::encode($event->name);

/**
 * @var \common\models\Event $event
 */
?>
<h2><?= Html::encode($event->name) ?></h2>
<div class="preview">
    <img src="<?= $event->poster->fit(640, 640)->getUrl() ?>" alt="<?= $event->name ?>"/>
</div>
<div class="full-text">
    Начало: <?= $event->startDate ?>
    <br>
    Адрес: <?= $event->address ?>
    <?= $event->description ?>
</div>