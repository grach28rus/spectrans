<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $typesEquipment array \common\models\TypesEquipment */

$this->title = 'Аренда Автокрана | Аренда спецтехники | Срочно Москва и Московская область - ООО РентПромТранс';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Аренда Автокрана | Аренда спецтехники | Срочно Москва и Московская область - ООО РентПромТранс'
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Аренда Автокрана, Аренда спецтехники, Срочно Москва и Московская область'
]);
$this->registerMetaTag([
    'name' => 'robots',
    'content' => 'index,follow'
]);
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
    <?php foreach ($typesEquipment as $typeEquipment) : ?>
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content product-box" style="position: relative; ">

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
                    </div>
                    <div class="m-t text-right" style="position: absolute; bottom: 10px; right: 10px">
                        <a href="/buses/buses-list?id=<?= $typeEquipment->id ?>" class="btn btn-sm btn-outline btn-primary">
                            Подробнее
                            <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>

