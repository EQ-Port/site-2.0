<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Articles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Article'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'previewText:ntext',
            'active:boolean',
            [
                'label' => Yii::t('app', 'Author'),
                'value' => function($model) {
                        return $model->author->firstName . ' ' . $model->author->lastName;
                    },
            ],
            //'activeFrom',
            //'activeTo',
            //'authorId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
