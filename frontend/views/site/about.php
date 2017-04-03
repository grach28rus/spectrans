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
<!--            --><?//= Html::a('Скачать прайс', '/uploads/files/price.xlsx'); ?><!-- <i class="fa fa-download"></i>-->
        </b>
    </div>
    <div class="col-md-12 no-padding">
        <p>
            Компания ООО «РентПромТранс» специализируется на оказании услуг по аренде спецтехники в г. Москве и Московской области.
        </p>
        <p>Мы предлагаем обширный выбор спецтехники и оборудования для решения строительных, монтажных и транспортных задач.</p>
        <p>ООО «РентПромТранс» имеет большой опыт, в своём направление по предоставлении специализированной технике, доставке данных машин и оборудования на строительные объекты.</p>
        <p>Для управления механизмами, оборудованием и техникой компания ООО «РентПромТранс» допускает к эксплуатации ТОЛЬКО опытных операторов и машинистов.</p>
        <a href="http://rentpromtrans.ru" class="pull-right" target="_blank"><img src="http://qrcoder.ru/code/?BEGIN%3AVCARD%0AFN%3A%C0%ED%F2%EE%ED+%C2%E8%EA%F2%EE%F0%EE%E2%E8%F7%0AORG%3A%D0%E5%ED%F2%CF%F0%EE%EC%D2%F0%E0%ED%F1%0ATEL%3A%2B74956424402%0AURL%3Ahttp%3A%2F%2Frentpromtrans.ru%0AEMAIL%3Ainfo%40rentpromtrans.ru%0ANOTE%3A%C0%F0%E5%ED%E4%E0+%F1%EF%E5%F6%F2%E5%F5%ED%E8%EA%E8%0AEND%3AVCARD&3&0" width="66" height="66" border="0" title="QR код"></a>
        <a href="http://rentpromtrans.ru" target="_blank"><img src="http://rentpromtrans.ru/images/qr-code.gif" width="66" height="66" border="0" title="QR код"></a>
    </div>
</div>
