<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TypesEquipment */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadForm common\models\UploadForm */
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <?php if (!$model->isNewRecord) : ?>
            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data'],
                'action'  => '/site/upload?id=' . $model->id
            ]) ?>

            <?= $form->field($uploadForm, 'imageFile')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton($model->image_path ? 'Изменить фаил' : 'Добавить фаил', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end() ?>

        <?php endif ?>
        <?php if ($model->image_path) : ?>
            <div class="col-md-12">
                <?= Html::img('/' . $model->image_path, ['class' => 'img-thumbnail'])?>
            </div>
        <?php endif ?>
    </div>
</div>
