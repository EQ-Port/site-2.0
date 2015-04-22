<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class BasicAsset extends AssetBundle
{
    public $sourcePath = '@app/src';
    public $baseUrl = '@web';

    public $css = [
        'style/style.less',
    ];
}