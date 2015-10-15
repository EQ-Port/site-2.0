<?php

namespace common\widgets\ImagePreview;


use yii\web\AssetBundle;

class ImagePreviewAsset extends AssetBundle
{
    public $sourcePath = '@common/widgets/ImagePreview/assets';
    public $baseUrl = '@web';
    public $js = [
        'ImagePreview.js'
    ];
}
 