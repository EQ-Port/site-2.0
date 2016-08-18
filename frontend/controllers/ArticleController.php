<?php

namespace frontend\controllers;


use common\models\Article;
use yii\web\Controller;
use yii\web\HttpException;

class ArticleController extends Controller
{
    public function actionIndex()
    {
        $articles = Article::findAll(['active' => true]);

        return $this->render('index', ['articles' => $articles]);
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
 