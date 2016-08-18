<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use dosamigos\datetimepicker\DateTimePicker;
use \dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'previewText')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fullText')->widget(CKEditor::className(), [
            'preset' => 'full'
        ]) ?>

    <?= \common\widgets\ImagePreview\ImagePreviewWidget::widget([
            'model'     => $model,
            'attribute' => 'imageId',
            'source' => (!is_null($model->image)) ? $model->image : null,
        ]) ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <?= $form->field($model, 'activeFrom')->widget(DateTimePicker::className(), []) ?>

    <?= $form->field($model, 'activeTo')->widget(DateTimePicker::className(), []) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
