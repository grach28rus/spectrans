<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TypesEquipment */
/* @var $category array */

$this->title = 'Создание типа техники';
$this->params['breadcrumbs'][] = ['label' => 'Types Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ibox-content types-equipment-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model'    => $model,
        'category' => $category,
    ]) ?>

</div>
