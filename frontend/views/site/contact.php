<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\widgets\MaskedInput;
use yii\bootstrap\Modal;

$this->title = 'Контакты';
?>

<?php
Modal::begin([
    'header' => '<h2>' .  Html::encode($this->title) . '</h2>',
    'id' => 'contact-modal',
]);
?>
<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' => '/site/contact']); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'number')->widget(MaskedInput::className(), [
            'mask' => '(999) 999-9999'
        ]) ?>

        <?= $form->field($model, 'body')->textarea(['rows' => 3]) ?>

        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить заявку', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
Modal::end();

?>
