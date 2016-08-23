<?php
/**
 * @var \common\models\Event $model
 */
?>
<div class="col-xs-12 col-md-4">
    <a href="<?= Yii::$app->urlManager->createUrl(['article/detail', 'code' => $model->code]) ?>">
        <img src="<?= $model->poster->fit(220, 300)->getUrl() ?>" alt="<?= \yii\helpers\Html::encode($model->name) ?>"/>
    </a>

    <h3>
        <a href="<?= Yii::$app->urlManager->createUrl(['event/detail', 'code' => $model->code]) ?>">
            <?= \yii\helpers\Html::encode($model->name) ?>
        </a>
    </h3>
</div>