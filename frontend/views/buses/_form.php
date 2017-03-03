<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Buses */
/* @var $form yii\widgets\ActiveForm */
/* @var $typesEquipment array */
/* @var $characteristicsBusesModel \common\models\CharacteristicsBuses */
/* @var $characteristicsBusesData array \common\models\CharacteristicsBuses */

?>

<div class="row">

    <div class="col-md-6">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'types_equipment_id')->widget(Select2::classname(), [
            'data' => $typesEquipment,
            'language' => 'ru',
            'options' => ['placeholder' => Yii::t('app', 'Select type flow') . '...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'cost_in_h')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cost_in_period')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <div class="col-md-6">
        <h2><?= Html::encode('Добавить характеристику') ?></h2>
        <?php if (!$model->isNewRecord) : ?>
        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
            'action'  => '/characteristics-buses/create'
        ]) ?>

            <?= $form->field($characteristicsBusesModel, 'buses_id')->hiddenInput(['value' => $model->id]) ?>

            <?= $form->field($characteristicsBusesModel, 'name')->textInput(['maxlength' => true]) ?>


            <?= $form->field($characteristicsBusesModel, 'value')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end() ?>
        <?php endif; ?>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>
                    Имя
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tbody>
            <?php foreach ($characteristicsBusesData as $characteristicsBuses) : ?>
                <tr>
                    <td>
                        <?= $characteristicsBuses->name?>
                    </td>
                    <td>
                        <?= $characteristicsBuses->value?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
