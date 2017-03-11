<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Buses */
/* @var $typesEquipment array */

$this->title = 'Создание техники';
$this->params['breadcrumbs'][] = ['label' => 'Buses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ibox-content buses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'          => $model,
        'typesEquipment' => $typesEquipment
    ]) ?>

</div>
