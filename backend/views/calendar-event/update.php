<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CalendarEvent */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Calendar Event',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Calendar Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="calendar-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
