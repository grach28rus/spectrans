<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

AppAsset::register($this);

$menuDropDown = $this->render('subMenu', [
    'category'    => $this->context->categories,
    'dataForMenu' => $this->context->dataForMenu,
]);
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
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter44462200 = new Ya.Metrika({
                    id:44462200,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/44462200" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
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
    <div class="social-networks hidden-xs hidden-sm">
        <div class="col-md-12 no-padding">
            <a href="https://www.facebook.com/groups/rentpromtrans.ru" target="_blank">
                <?= Html::img('/images/FB.png', ['class' => 'img-responsive']) ?>
            </a>
        </div>
        <div class="col-md-12 no-padding" style="margin-top: 5px">
            <a href="https://ok.ru/group/58266159218733" target="_blank">
                <?= Html::img('/images/Odnoklasniki.png', ['class' => 'img-responsive']) ?>
            </a>
        </div>
        <div class="col-md-12 no-padding" style="margin-top: 5px">
            <a href="https://vk.com/rentpromtrans" target="_blank">
                <?= Html::img('/images/VK.png', ['class' => 'img-responsive']) ?>
            </a>
        </div>
    </div>
    <header>
        <div class="pull-right back">
            <p>
                +7 (495) 642-44-02
            </p>
            <p>
                +7 (977) 899-39-55
            </p>
            <p class="logo" style="font-size: 18px">
                <a href="mailto:info@rentpromtrans.ru" rel=“nofollow“ style="color: #474646">
                    <b>
                        info@rentpromtrans.ru
                    </b>
                </a>
            </p>
        </div>
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
            ['label' => 'Главная', 'url' => ['/site/index']]
        ];
        $menuItems[] = $menuDropDown;
        $menuItems[] = ['label' => 'Цены', 'url' => ['/buses/buses-list']];
        $menuItems[] = ['label' => 'О компании', 'url' => ['/site/about']];
        $menuItems[] = ['label' => 'Контакты', 'url' => ['/site/contacts-company']];

        $menuItems[] = "<li style=\"padding-top: 8px\">
                            <button type=\"button\" class=\"btn btn-md btn-block btn-info\" data-toggle=\"modal\" data-target=\"#contact-modal\">
                                Расчёт стоимости
                            </button>
                        </li>";

        if (!Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Категории', 'url' => ['/category/index']];
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
