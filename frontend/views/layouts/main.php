<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
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
            ['label' => 'Контакты', 'url' => ['/site/contact']],
        ];
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
        <p class="pull-left">&copy; РентПромТранс <?= date('Y') ?></p>

        <p class="pull-right">+7 (495) 642-44-02</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
