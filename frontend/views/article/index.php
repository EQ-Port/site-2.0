<?
use yii\helpers\Html;
use common\models\Article;

$this->title = "Интересные материалы";
/**
 * @var Article[] $articles
 * @var \yii\web\View $this
 */
?>

    <h2>Интересные материалы</h2>
<div class="row">
    <? foreach ($articles as $article) { ?>
        <div class="col-xs-12 col-md-4">
            <a href="<?= Yii::$app->urlManager->createUrl(['article/detail', 'code' => $article->code]) ?>">
                <img src="<?= $article->image->crop(220, 130)->getUrl() ?>" alt="<?= Html::encode($article->name) ?>"/>
            </a>

            <h3>
                <a href="<?= Yii::$app->urlManager->createUrl(['article/detail', 'code' => $article->code]) ?>">
                    <?= Html::encode($article->name) ?>
                </a>
            </h3>
        </div>
    <? } ?>
</div>
