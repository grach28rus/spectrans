<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TypesEquipment */
/* @var $uploadForm common\models\UploadForm */
/* @var $category array */

$this->title = 'Обновление типа техники: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Types Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ibox-content types-equipment-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model'      => $model,
        'uploadForm' => $uploadForm,
        'category'   => $category,
    ]) ?>

</div>
