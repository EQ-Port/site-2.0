<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CalendarEvent */

$this->title = Yii::t('app', 'Create Calendar Event');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Calendar Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendar-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
