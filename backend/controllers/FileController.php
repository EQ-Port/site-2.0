<?php

namespace backend\controllers;

use common\components\FileHelper;
use \Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class FileController extends \backend\components\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['upload'],
                        'allow'   => true,
                    ],
                ],
            ]
        ];
    }

    public function actionUpload()
    {
        if (!$dir = Yii::$app->request->get('dir')) {
            $dir = 'default';
        }

        $image = FileHelper::upload(UploadedFile::getInstanceByName('image'), $dir);

        $response = [
            'id'   => $image->id,
            'path' => $image->path,
            'url'  => $image->getUrl(),
        ];

        $this->jsonResponse($response);
    }
}
