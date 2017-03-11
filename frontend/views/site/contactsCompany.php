<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about ibox-content">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-md-8">
        <h3>
            <?= Html::encode('Общество с ограниченной ответственностью «РЕНТПРОМТРАНС»') ?>
        </h3>
    </div>
    <div class="col-md-4">
        <b>
            <?= Html::a('Скачать реквизиты', '/uploads/files/cartRPT.docx'); ?> <i class="fa fa-download"></i>
        </b>
    </div>
    <table class="table table-hover">
        <tbody>
        <tr>
            <td>
                <h4>
                    Юридический адрес
                </h4>
            </td>

            <td>
                127576, РОССИЯ, МОСКВА, УЛ ИЛИМСКАЯ, 3, Г, ОФ 405
            </td>
        </tr>
        <tr>
            <td>
                <h4>
                    Почтовый адрес
                </h4>
            </td>

            <td>
                127576, РОССИЯ, МОСКВА, УЛ ИЛИМСКАЯ, 3, Г, ОФ 405
            </td>
        </tr>
        <tr>
            <td>
                <h4>
                    Телефон, e-mail
                </h4>
            </td>

            <td>
                8-495-642-44-02, info@rentpromtrans.ru
            </td>
        </tr>
        <tr>
            <td>
                <h4>
                    ОГРН
                </h4>
            </td>

            <td>
                1177746029636
            </td>
        </tr>
        <tr>
            <td>
                <h4>
                    Идентификационный номер (ИНН)
                </h4>
            </td>

            <td>
                9715289370
            </td>
        </tr>
        <tr>
            <td>
                <h4>
                    КПП
                </h4>
            </td>

            <td>
                771501001
            </td>
        </tr>
        <tr>
            <td>
                <h4>
                    Код по ОКПО
                </h4>
            </td>

            <td>
                06292593
            </td>
        </tr>
        <tr>
            <td>
                <h4>
                    Дата регистрации
                </h4>
            </td>

            <td>
                17.01.2017
            </td>
        </tr>
        <tr>
            <td>
                <h4>
                    Полное наименование учреждения банка клиента
                </h4>
            </td>

            <td>
                АО "ТИНЬКОФФ БАНК"
            </td>
        </tr>
        </tbody>
    </table>
</div>
