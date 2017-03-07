<?php

use yii\helpers\Html;
use common\models\CharacteristicsBuses;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BusesSearch */
/* @var $buses \common\models\Buses */
/* @var $typesEquipment \common\models\TypesEquipment */

$this->title = isset($typesEquipment->name) ? $typesEquipment->name : 'Все';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="buses-index" style="margin-top: 10px">
    <div class="ibox-content">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
    <div class="row hidden-sm hidden-xs" style="margin-top: 10px">
        <?php foreach ($buses as $bus) : ?>
            <div class="col-md-12">
                <div class="ibox" style="margin-bottom: 2px">
                    <div class="ibox-content">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th></th>
                                <?php $characteristicsBusesData = CharacteristicsBuses::findAll(['buses_id' => $bus->id]); ?>
                                <?php foreach ($characteristicsBusesData as $characteristicBusesData) : ?>

                                    <th><?= $characteristicBusesData->name ?></th>

                                <?php endforeach; ?>
                                <th>
                                    Стоимость в час
                                </th>
                                <th>
                                    Стоимость за смену
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <h3>
                                        <?= $bus->name ?>
                                    </h3>
                                </td>
                                <?php foreach ($characteristicsBusesData as $characteristicBusesData) : ?>

                                    <td><?= $characteristicBusesData->value ?></td>

                                <?php endforeach; ?>
                                <td><?= $bus->cost_in_h ?></td>
                                <td><?= $bus->cost_in_period ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="row hidden-md hidden-lg" style="margin-top: 10px">
    <?php foreach ($buses as $bus) : ?>
        <div class="col-md-12">
            <div class="ibox" style="margin-bottom: 10px">
                <div class="ibox-content">
                    <?php $characteristicsBusesData = CharacteristicsBuses::findAll(['buses_id' => $bus->id]); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>
                                <?= $bus->name ?>
                            </h3>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <tbody>
                                <?php foreach ($characteristicsBusesData as $characteristicBusesData) : ?>
                                <tr>
                                    <td><b><?= $characteristicBusesData->name ?>:</b></td>
                                    <td><?= $characteristicBusesData->value ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td><b>Стоимость в час:</b></td>
                                    <td><?= $bus->cost_in_h ?></td>
                                </tr>
                                <tr>
                                    <td><b>Стоимость за смену:</b></td>
                                    <td><?= $bus->cost_in_period ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>


