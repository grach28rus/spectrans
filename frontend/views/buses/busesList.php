<?php

use yii\helpers\Html;
use common\models\CharacteristicsBuses;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BusesSearch */
/* @var $typesEquipment array */
/* @var $title string */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
$lengthOneSymbol = 11;

?>
<div class="buses-index" style="margin-top: 10px">
    <?php if (count($typesEquipment) != 1) : ?>
    <h1 style="margin: 0; font-size: 20px">
        <?= $title ?>
    </h1>
    <?php endif; ?>
    <div class="row hidden-sm hidden-xs" style="margin-top: 10px">
        <div class="col-md-12" style="background: white;">
            <b>
<!--                --><?//= Html::a('Скачать прайс', '/uploads/files/price.xlsx'); ?><!-- <i class="fa fa-download"></i>-->
            </b>
        </div>
        <?php foreach ($typesEquipment as $typeEquipmentName => $buses) : ?>
            <div class="col-md-12" style="background: #505050; color: white">
                <?php if (count($typesEquipment) == 1) : ?>
                    <h1 style="font-size: 24px">
                        <?= $typeEquipmentName ?>
                    </h1>
                <?php else : ?>
                    <h2>
                        <?= $typeEquipmentName ?>
                    </h2>
                <?php endif; ?>
            </div>
            <?php $width = 0; ?>
            <?php foreach ($buses as $bus) {
                $strLenName = iconv_strlen($bus->name, 'UTF-8');
                $newWidth = $lengthOneSymbol * $strLenName;
                if ($width < $newWidth) {
                    $width = $newWidth;
                }
            }?>
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
                                    <td style="width:<?= $width ?>px">
                                        <h2 style="font-size: 16px; font-weight: 600">
                                            <?= $bus->name ?>
                                        </h2>
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
                                    <h2 style="font-size: 16px;">
                                        <?= $bus->name ?>
                                    </h2>
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


