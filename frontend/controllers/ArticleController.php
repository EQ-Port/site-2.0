<?php

namespace frontend\controllers;


use common\models\Article;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\HttpException;

class ArticleController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()->where(['active' => true]),
            'pagination' => [
                'pageSize' => 18,
                'defaultPageSize' => 18,
            ]
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionDetail($code)
    {
        $article = Article::findOne(['code' => $code]);

        if (is_null($article)) {
            throw new HttpException(404, 'Статья не найдена');
        }

        return $this->render('detail', ['article' => $article]);
    }
}
 