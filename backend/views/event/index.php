<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Events');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Event'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'code',
            [
                'attribute' => 'type',
                'value' => function($model) {
                        return \common\models\Event::typeList()[$model->type];
                    }
            ],
            [
                'attribute' => 'poster',
                'label' => Yii::t('app', 'Poster'),
                'format' => 'raw',
                'value' => function($model) {
                        return !is_null($model->poster) ? Html::img($model->poster->fit(120, 1000)->getUrl()) : null;
                    }
            ],
            'startDate:datetime',
            'endDate:datetime',
            'place',
            // 'address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
