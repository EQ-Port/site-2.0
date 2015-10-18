<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Issue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= \common\widgets\ImagePreview\ImagePreviewWidget::widget([
            'model'     => $model,
            'attribute' => 'coverId',
            'source' => (!is_null($model->cover)) ? $model->cover : null,
        ]) ?>

    <?= $form->field($model, 'announceDate')->widget(DateTimePicker::className(), []) ?>

    <?= $form->field($model, 'publishDate')->widget(DateTimePicker::className(), []) ?>

    <?= $form->field($model, 'lead')->widget(CKEditor::className(), ['preset' => 'full']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
