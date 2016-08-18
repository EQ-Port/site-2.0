<?php
/**
 * @var \common\models\Article $model
 */
?>
<div class="col-xs-12 col-md-4">
    <a href="<?= Yii::$app->urlManager->createUrl(['article/detail', 'code' => $model->code]) ?>">
        <img src="<?= $model->image->crop(220, 130)->getUrl() ?>" alt="<?= \yii\helpers\Html::encode($model->name) ?>"/>
    </a>

    <h3>
        <a href="<?= Yii::$app->urlManager->createUrl(['article/detail', 'code' => $model->code]) ?>">
            <?= \yii\helpers\Html::encode($model->name) ?>
        </a>
    </h3>
</div>