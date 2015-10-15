<?php

namespace common\components;

use common\models\Image;
use yii\web\UploadedFile;
use \yii\helpers\FileHelper as YiiFileHelper;


class FileHelper
{
    public static function upload(UploadedFile $uploadedFile, $dir = 'default')
    {
        $dir = $_SERVER['DOCUMENT_ROOT']
            . DIRECTORY_SEPARATOR . '../..' . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . $dir;

        if (!file_exists($dir)) {
            YiiFileHelper::createDirectory($dir, 0774, true);
        }

        $newFileName = md5($uploadedFile->name);
        $subDir = $dir . DIRECTORY_SEPARATOR . substr($newFileName, 0, 3);

        if (!file_exists($subDir)) {
            YiiFileHelper::createDirectory($subDir, 0774, true);
        }

        $fullPath = $subDir . DIRECTORY_SEPARATOR . $newFileName . '.' . strtolower($uploadedFile->extension);

        copy($uploadedFile->tempName, $fullPath);
        chmod($fullPath, 0774);

        $image= new Image();
        $image->path = str_replace($_SERVER['DOCUMENT_ROOT'] . '/../../upload', '', $fullPath);
        $image->save();

        return $image;
    }
}
 