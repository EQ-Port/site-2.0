<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\models\User;

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
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin(
        [
            'brandLabel' => 'Админка EQ',
            'brandUrl'   => Yii::$app->homeUrl,
            'options'    => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]
    );

    if (Yii::$app->user->isGuest) {
        $menuItems = [['label' => 'Login', 'url' => ['/site/login']]];
    } else {
        $menuItems = [
            [
                'label'   => Yii::t('app', 'Articles'),
                'url'     => ['/article/index'],
                'active'  => Yii::$app->controller->id == 'article',
                'visible' => Yii::$app->user->identity->hasRole(User::ROLE_ARTICLE_MANAGER),
            ],
            [
                'label'   => Yii::t('app', 'Events'),
                'url'     => ['/event/index'],
                'active'  => Yii::$app->controller->id == 'event',
                'visible' => Yii::$app->user->identity->hasRole(User::ROLE_EVENT_MANAGER),
            ],
            [
                'label'   => Yii::t('app', 'Issues'),
                'url'     => ['/issue/index'],
                'active'  => Yii::$app->controller->id == 'issue',
                'visible' => Yii::$app->user->identity->hasRole(User::ROLE_ISSUE_MANAGER),
            ],
            [
                'label'   => Yii::t('app', 'Users'),
                'url'     => ['/user/index'],
                'active'  => Yii::$app->controller->id == 'user',
                'visible' => Yii::$app->user->identity->hasRole(User::ROLE_USER_MANAGER),
            ],
            [
                'label'   => Yii::t('app', 'Calendar'),
                'url'     => ['/calendar-event/index'],
                'active'  => Yii::$app->controller->id == 'calendar-event',
                'visible' => Yii::$app->user->identity->hasRole(User::ROLE_EVENT_MANAGER),
            ],
        ];

        $menuItems[] = [
            'label'       => 'Выйти (' . Yii::$app->user->identity->username . ')',
            'url'         => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget(
        [
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items'   => $menuItems,
        ]
    );
    NavBar::end();
    ?>

    <div class="container">
        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; EQUILIBRIUM <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
