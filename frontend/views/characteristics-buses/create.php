<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CharacteristicsBuses */
/* @var $buses array */

$this->title = 'Create Characteristics Buses';
$this->params['breadcrumbs'][] = ['label' => 'Characteristics Buses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ibox-content characteristics-buses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'buses' => $buses,
    ]) ?>

</div>
