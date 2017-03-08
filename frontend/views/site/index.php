<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $typesEquipment array \common\models\TypesEquipment */

$this->title = 'My Yii Application';
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
    <?php foreach ($typesEquipment as $typeEquipment) : ?>
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content product-box">

                    <div class="product-imitation">
                        <a href="/buses/buses-list?id=<?= $typeEquipment->id ?>" class="product-name">
                            <?= Html::img('/' . $typeEquipment->image_path, ['alt' => 'image']) ?>
                        </a>
                    </div>
                    <div class="product-desc">
                        <a href="#" class="product-name"> <?= $typeEquipment->name ?></a>
                        <div class="small m-t-xs">
                            <?= $typeEquipment->description ?>
                        </div>
                        <div class="m-t text-right">
                            <a href="/buses/buses-list?id=<?= $typeEquipment->id ?>" class="btn btn-sm btn-outline btn-primary">Подробнее <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>

