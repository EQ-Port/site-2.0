<?php

namespace common\widgets\ImagePreview;

use \Yii;
use Faker\Provider\Image;
use yii\bootstrap\Html;
use yii\widgets\InputWidget;


class ImagePreviewWidget extends InputWidget
{
    public $uploadUrl;
    public $dir = 'default';
    public $source;

    public function init()
    {
        $this->uploadUrl = Yii::$app->urlManager->createUrl('file/upload');
    }

    public function run()
    {
        $view = $this->getView();

        ImagePreviewAsset::register($view);
        $id = $this->id;

        echo '<div class="form-group">';
        echo Html::activeLabel($this->model, $this->attribute);
        echo Html::activeHiddenInput($this->model, $this->attribute, ['id' => $id]);
        echo Html::fileInput($id . '-file', null, ['accept' => 'image/jpeg,image/png,image/gif', 'id' => $id . '-file']);

        $src = ($this->source instanceof \common\models\Image) ? $this->source->getUrl() : '';
        $display = $src == '' ? 'display:none;' : 'display:block;';

        echo Html::img($src, ['id' => $id . '-img', 'style' => $display . 'max-width: 200px;']);
        echo '</div>';

        $js = ";ImagePreview.init('$id', '{$this->uploadUrl}');";

        $view->registerJs($js);
    }
}
 