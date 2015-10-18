<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Search\Issue */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Issues');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Issue'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'code',
            [
                'attribute' => 'cover',
                'label' => Yii::t('app', 'Cover'),
                'format' => 'raw',
                'content' => function($model) {
                        return !is_null($model->cover) ? Html::img($model->cover->fit(120, 500)->getUrl()) : null;
                    }
            ],
            [
                'attribute' => 'announceDate',
                'label' => Yii::t('app', 'Announce Date'),
                'format' => 'date',
                'filter' => \dosamigos\datepicker\DatePicker::widget(
                        [
                            'model' => $searchModel,
                            'attribute' => 'announceDate',
                            'template' => '<div class="input-group date" style="width: 150px;">{input}{addon}</div>',
                            'clientOptions' => [
                                'autocolse' => true,
                                'format' => 'yyyy-mm-dd',
                                'width' => 50,
                            ]
                        ]
                    ),
            ],
            [
                'attribute' => 'publishDate',
                'label' => Yii::t('app', 'Announce Date'),
                'format' => 'date',
                'filter' => \dosamigos\datepicker\DatePicker::widget(
                        [
                            'model' => $searchModel,
                            'attribute' => 'publishDate',
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
