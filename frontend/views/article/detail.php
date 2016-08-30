<?php
use common\models\Article;
use yii\helpers\Html;

/**
 * @var Article $article
 * @var \yii\web\View $this
 */
$this->title = $article->name;
?>
<h1><?= Html::encode($article->name) ?></h1>
<div class="preview">
    <blockquote >
        <?= Html::encode($article->previewText) ?>
    </blockquote>
<div class="well-lg">
    <img src="<?= $article->image->crop(640, 480)->getUrl() ?>" alt="<?= $article->name ?>"/>    
</div>
</div>
<div class="full-text">
    <?= $article->fullText ?>
</div>
