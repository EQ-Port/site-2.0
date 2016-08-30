<?php
/**
 * @var \common\models\Article $model
 */
?>
<div class="col-md-12 well-lg">
    <div class="row">
        <div class="col-md-4">
            <a href="<?= Yii::$app->urlManager->createUrl(['article/detail', 'code' => $model->code]) ?>">
                <img src="<?= $model->image->crop(220, 130)->getUrl() ?>" alt="<?= \yii\helpers\Html::encode($model->name) ?>"/>
            </a>
        </div>
        <div class="col-md-8">
                <h3>
                    <a href="<?= Yii::$app->urlManager->createUrl(['article/detail', 'code' => $model->code]) ?>">
                        <?= \yii\helpers\Html::encode($model->name) ?>
                    </a>
                </h3>
        </div>
    </div>


</div>
