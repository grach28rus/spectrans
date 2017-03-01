<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TypesEquipment */
/* @var $uploadForm common\models\UploadForm */

$this->title = 'Update Types Equipment: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Types Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="types-equipment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'      => $model,
        'uploadForm' => $uploadForm,
    ]) ?>

</div>
