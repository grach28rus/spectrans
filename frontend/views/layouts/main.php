<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use common\widgets\Alert;

AppAsset::register($this);

$typesEquipment = [];
foreach ($this->context->typesEquipment as $type) {
    $typesEquipment[] = [
        'label' => $type->name,
        'url' => ['/buses/buses-list', 'id' => $type->id]
    ];
}
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
<?= \lavrentiev\widgets\toastr\NotificationFlash::widget([
    'options' => [
        "closeButton" => true,
        "debug" => false,
        "newestOnTop" => false,
        "progressBar" => false,
        "positionClass" => "toast-top-right",
        "preventDuplicates" => false,
        "onclick" => null,
        "showDuration" => "300",
        "hideDuration" => "1000",
        "timeOut" => "5000",
        "extendedTimeOut" => "1000",
        "showEasing" => "swing",
        "hideEasing" => "linear",
        "showMethod" => "fadeIn",
        "hideMethod" => "fadeOut"
    ]
]) ?>
<div class="wrap">
    <header>

    </header>
    <div id="float-nav-bar">
        <div class="anchor"></div>
        <?php
        NavBar::begin([
            'brandLabel' => 'РентПромТранс',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-static-top ',
                'id'    => 'nav-trans'
            ],
        ]);
        $menuItems = [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Техника', 'items' => $typesEquipment],
            ['label' => 'Цены', 'url' => ['/buses/buses-list']],
            ['label' => 'О компании', 'url' => ['/site/about']],
        ];
        $menuItems[] = "<li style=\"padding-top: 8px\">
                            <button type=\"button\" class=\"btn btn-md btn-block btn-info\" data-toggle=\"modal\" data-target=\"#contact-modal\">
                                Сделать заказ
                            </button>
                        </li>";

        if (!Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Тип спецтехники', 'url' => ['/types-equipment/index']];
            $menuItems[] = ['label' => 'Спец техника', 'url' => ['/buses/index']];
            $menuItems[] = ['label' => 'Характиристики', 'url' => ['/characteristics-buses/index']];
            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }
        ?>

        <?php
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
    </div>
<!--    <div id="float-nav-bar">-->
<!--        <div class="anchor"></div>-->
<!--        <nav id="nav-trans" class="navbar-inverse navbar-static-top border-none navbar" role="navigation">-->
<!--            <div class="container">-->
<!--                <div class="navbar-header">-->
<!--                    <a class="navbar-brand" href="/">РентПромТранс</a>-->
<!--                </div>-->
<!--                <div id="nav-trans-collapse" class="collapse navbar-collapse">-->
<!--                    <ul id="w0" class="navbar-nav navbar-right nav">-->
<!--                        --><?php //foreach ($menuItems as $menuItem) : ?>
<!--                            --><?php
//                                $classItem = $menuItem['url'] == $currentUrl ? 'active' : '';
//                            ?>
<!--                            --><?php //if (isset($menuItem['items'])) : ?>
<!--                                <li class="dropdown">-->
<!--                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">-->
<!--                                        --><?//= $menuItem['label'] ?>
<!--                                        <b class="caret"></b>-->
<!--                                    </a>-->
<!--                                    <ul id="w1" class="dropdown-menu">-->
<!--                                        --><?php //foreach ($menuItem['items'] as $item) : ?>
<!--                                            <li>-->
<!--                                                <a href="/buses/buses-list?id=--><?//= $item['id'] ?><!--" tabindex="-1">-->
<!--                                                    --><?//= $item['label'] ?>
<!--                                                </a>-->
<!--                                            </li>-->
<!--                                        --><?php //endforeach; ?>
<!--                                    </ul>-->
<!--                                </li>-->
<!--                            --><?php //else : ?>
<!--                                <li class="--><?//= $classItem ?><!--">-->
<!--                                    <a href="--><?//= $menuItem['url'] ?><!--">--><?//= $menuItem['label'] ?><!--</a>-->
<!--                                </li>-->
<!--                            --><?php //endif; ?>
<!--                        --><?php //endforeach; ?>
<!--                        <li style="padding-top: 8px">-->
<!--                            <button type="button" class="btn btn-md btn-block btn-info" data-toggle="modal" data-target="#contact-modal">-->
<!--                                Сделать заказ-->
<!--                            </button>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </nav>-->
<!--    </div>-->
    <div class="container">
        <?= $content ?>
    </div>
    <?= $this->render('../site/contact', [
        'model' => new \frontend\models\ContactForm()
    ])?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; РентПромТранс <?= date('Y') ?></p>

        <p class="pull-right">+7 (495) 642-44-02</p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
