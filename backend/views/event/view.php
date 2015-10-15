<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Event */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'code',
            [
                'label' => Yii::t('app', 'Poster'),
                'format' => 'image',
                'value' => !is_null($model->poster) ? $model->poster->fit(300, 1000)->getUrl() : null,
            ],
            [
                'label' => Yii::t('app', 'Type'),
                'format' => 'text',
                'value' => \common\models\Event::typeList()[$model->type],
            ],
            'description',
            'startDate',
            'endDate',
            'place',
            'address',
        ],
    ]) ?>

</div>
