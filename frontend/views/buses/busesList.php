<?php

use yii\helpers\Html;
use common\models\CharacteristicsBuses;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BusesSearch */
/* @var $buses \common\models\Buses */
/* @var $typesEquipment \common\models\TypesEquipment */

$this->title = $typesEquipment->name ? $typesEquipment->name : 'Все';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="buses-index" style="margin-top: 10px">
    <div class="ibox-content">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>

    <?php foreach ($buses as $bus) : ?>
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>
                                <?= $bus->name ?>
                            </h2>
                        </div>
                        <div class="col-md-6">
                            <dl class="dl-horizontal">
                                <?php $characteristicsBusesData = CharacteristicsBuses::findAll(['buses_id' => $bus->id]); ?>
                                <?php foreach ($characteristicsBusesData as $characteristicBusesData) : ?>
                                    <dt><?= $characteristicBusesData->name ?>:</dt>
                                    <dd><?= $characteristicBusesData->value ?></dd>
                                <?php endforeach; ?>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="dl-horizontal">
                                <dt>Стоимость в час:</dt>
                                <dd><?= $bus->cost_in_h ?></dd>
                                <dt>Стоимость за смену:</dt>
                                <dd><?= $bus->cost_in_period ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>


