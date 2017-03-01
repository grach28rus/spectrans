<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CharacteristicsBuses */

$this->title = 'Update Characteristics Buses: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Characteristics Buses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="characteristics-buses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
