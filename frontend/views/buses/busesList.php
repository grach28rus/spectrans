<?php

use yii\helpers\Html;
use common\models\CharacteristicsBuses;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BusesSearch */
/* @var $typesEquipment array */

$this->title = 'Цены';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="buses-index" style="margin-top: 10px">
    <div class="row hidden-sm hidden-xs" style="margin-top: 10px">
        <div class="col-md-12" style="background: white;">
            <b>
                <?= Html::a('Скачать прайс', '/uploads/files/price.xlsx'); ?> <i class="fa fa-download"></i>
            </b>
        </div>
        <?php foreach ($typesEquipment as $typeEquipmentName => $buses) : ?>
            <div class="col-md-12" style="background: #505050; color: white">
                <h2>
                    <?= $typeEquipmentName ?>
                </h2>
            </div>
            <?php
            $maxLengthBusName = 0;
            foreach ($buses as $bus) {
                $currentLength = mb_strlen($bus->name);
                if ($currentLength > $maxLengthBusName) {
                    $maxLengthBusName = $currentLength;
                }
            }
            ?>
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
                                            <?php
                                                $countSpace = $maxLengthBusName - mb_strlen($bus->name);
                                                $space = '';
                                                for ($i = 0; $i < $countSpace; $i++) {
                                                    $space = $space . '&nbsp';
                                                }
                                            ?>
                                            <?= $bus->name . $space ?>
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
        <?php endforeach; ?>
    </div>

    <div class="row hidden-md hidden-lg" style="margin-top: 10px">
        <?php foreach ($typesEquipment as $typeEquipmentName => $buses) : ?>
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
        <?php endforeach; ?>
    </div>
</div>


