<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) . ' | ' . Yii::$app->name ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <div class="logo"><a href="/" title="На главную"></a></div>
            </div>
            <div class="col-md-2 col-md-offset-7 col-xs-12">
                <div class="user">
                    <div class="profile">
                        <img src="http://blackforest.su/sites/default/files/default_avatar.png">

                        <div class="more">
                            <ul>
                                <li><a href="#">Профиль</a></li>
                                <li><a href="#">Настройки</a></li>
                                <li><a href="#">Выйти</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav>
    <div class="container">
        <form class="search">
            <input type="search" placeholder="поиск" autocomplete="off"/>
        </form>
        <?=
        \yii\widgets\Menu::widget(
            array(
                'items'   => array(
                    array('label' => 'Статьи', 'url' => array('/article')),
                    array('label' => 'Мероприятия', 'url' => array('/event')),
                    array('label' => 'Contact', 'url' => array('/site/contact')),
                    array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::$app->user->isGuest),
                ),
                'options' => array('class' => 'menu nav'),
            )
        ) ?>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-9 content">
            <?php if (isset($this->breadcrumbs)): ?>
                <?php /*$this->widget('zii.widgets.CBreadcrumbs', array(
                'links' => $this->breadcrumbs,
            )); */
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>
        </div>
        <div class="col-xs-12 col-md-3" style="margin-top: 30px;">
            <div class="col-md-12 navigation">
                <h4>Навигация</h4>
            </div>
            <div class="col-md-12 face">
                <h4>Наши лица</h4>
            </div>
        </div>
    </div>


</div>
<div class="clearfix"></div>
<footer>
    <div class="container">
        <small id="copyright">© Радио EQUILIBRIUM 2009 - <?= date('Y') ?></small>
    </div>
</footer>
<div id="overlay"></div>
<div id="modal_window">
    <div id="modal_close">X</div>
    <div id="modal_content"></div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
