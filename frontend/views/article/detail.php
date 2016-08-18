<?php
use common\models\Article;
use yii\helpers\Html;

/**
 * @var Article $article
 * @var \yii\web\View $this
 */
$this->title = $article->name;
?>
<h2><?= Html::encode($article->name) ?></h2>
<div class="preview">
    <?= Html::encode($article->previewText) ?>
    <img src="<?= $article->image->crop(640, 480)->getUrl() ?>" alt="<?= $article->name ?>"/>
</div>
<div class="full-text">
    <?= $article->fullText ?>
</div>
