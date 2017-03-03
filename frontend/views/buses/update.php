<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Buses */
/* @var $buses array */
/* @var $characteristicsBusesModel \common\models\CharacteristicsBuses */
/* @var $characteristicsBusesData array \common\models\CharacteristicsBuses */

$this->title = 'Update Buses: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Buses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="buses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'                     => $model,
        'buses'                     => $buses,
        'characteristicsBusesModel' => $characteristicsBusesModel,
        'characteristicsBusesData'  => $characteristicsBusesData,
    ]) ?>

</div>
