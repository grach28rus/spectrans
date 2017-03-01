<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TypesEquipment */

$this->title = 'Create Types Equipment';
$this->params['breadcrumbs'][] = ['label' => 'Types Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="types-equipment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
