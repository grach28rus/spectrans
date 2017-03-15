<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'О компании';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about ibox-content row" style="font-size: 15px; line-height: 26px;">
    <div class="col-md-8">
        <h1>
            <?= Html::encode($this->title) ?>
        </h1>
    </div>
    <div class="col-md-4">
        <b>
            <?= Html::a('Скачать прайс', '/uploads/files/price.xlsx'); ?> <i class="fa fa-download"></i>
        </b>
    </div>
    <div class="col-md-12 no-padding">
        <p>
            Компания ООО «РентПромТранс» специализируется на оказании услуг по аренде спецтехники в г. Москве и Московской области.
        </p>
        <p>Мы предлагаем обширный выбор спецтехники и оборудования для решения строительных, монтажных и транспортных задач.</p>
        <p>ООО «РентПромТранс» имеет большой опыт, в своём направление по предоставлении специализированной технике, доставке данных машин и оборудования на строительные объекты.</p>
        <p>Для управления механизмами, оборудованием и техникой компания ООО «РентПромТранс» допускает к эксплуатации ТОЛЬКО опытных операторов и машинистов.</p>
        <a href="http://rentpromtrans.ru" target="_blank"><img src="http://rentpromtrans.ru/images/qr-code.gif" width="66" height="66" border="0" title="QR код"></a>
    </div>
</div>
