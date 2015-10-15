<?php

namespace backend\components;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Json;


class Controller extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'create', 'update', 'view', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    protected function jsonResponse($data)
    {
        echo Json::encode($data);
        die;
    }
}
 