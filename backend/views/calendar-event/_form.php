<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CalendarEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendar-event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=
    \common\widgets\ImagePreview\ImagePreviewWidget::widget(
        [
            'model' => $model,
            'attribute' => 'imageId',
            'source' => !is_null($model->image) ? $model->image : null,
        ]
    ) ?>

    <?= $form->field($model, 'date')->widget(\dosamigos\datepicker\DatePicker::className(), [
            'clientOptions' => [
                'format' => 'yyyy-mm-dd'
            ]
        ]) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
