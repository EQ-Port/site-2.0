<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Search\CalendarEvent */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Calendar Events');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendar-event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Calendar Event'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'image',
                'label' => Yii::t('app', 'Image'),
                'format' => 'raw',
                'value' => function($model) {
                        return !is_null($model->image) ? Html::img($model->image->crop(150, 150)->getUrl()) : null;
                    }
            ],
            [
                'attribute' => 'date',
                'label' => Yii::t('app', 'Date'),
                'format' => 'date',
                'filter' => \dosamigos\datepicker\DatePicker::widget(
                        [
                            'model' => $searchModel,
                            'attribute' => 'date',
                            'template' => '<div class="input-group date" style="width: 150px;">{input}{addon}</div>',
                            'clientOptions' => [
                                'autocolse' => true,
                                'format' => 'yyyy-mm-dd',
                                'width' => 50,
                            ]
                        ]
                    ),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
