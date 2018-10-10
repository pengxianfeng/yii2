<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\Menu;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    $module = Yii::$app->controller->module->id;
    $controller = Yii::$app->controller->id;
    $action = Yii::$app->controller->action->id;

    $productActive = ($controller == 'product') ? true : false;
    $solutionActive = ($controller == 'solution') ? true : false;
    $caseActive = ($controller == 'case') ? true : false;
    $docActive = ($controller == 'doc') ? true : false;
    $aboutActive = ($controller == 'about') ? true : false;

    $consoleActive = ($controller == 'consoleActive') ? true : false;

    
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => '首页', 'url' => ['/back/base/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    echo Nav::widget([
	    'options' => ['class' => 'navbar-nav navbar-right'],
	    'items' => [
		    ['label' => '添加账号', 'url' => ['/site/signup'],'visible'=>!Yii::$app->user->isGuest],
		    Yii::$app->user->isGuest ? (
		    ['label' => '登录', 'url' => ['/site/login']]
		    ) :
                ('<li class="dropdown">'
			    . '<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    菜单栏
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="?r=back/user/index">账户信息</a></li>
                        <li><a href="#">订单列表</a></li>
                        <li class="divider"></li>
                        <li><a href="#">用户列表</a></li>
                           <li class="divider"></li>
                        <li><a href="#">分类列表</a></li>
                           <li class="divider"></li>
                        <li><a href="#">商品列表</a></li>
                        <li class="divider"></li>
                        <li><a href="/site/logout">退出系统</a></li>
                    </ul></li>'
		    )
	    ],
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
