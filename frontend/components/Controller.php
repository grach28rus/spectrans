<?php

namespace frontend\components;

use Yii;
use common\models\TypesEquipment;
use common\models\Category;
use yii\helpers\ArrayHelper;

class Controller extends \yii\web\Controller{

    public $dataForMenu;
    public $categories;

    public function init()
    {
        $categories = Category::find()->all();
        $categories = ArrayHelper::map($categories, 'id', 'name');
        $typesEquipment = TypesEquipment::find()->all();
        $typesEquipment = ArrayHelper::index($typesEquipment, 'id');
        $dataForMenu = [];
        foreach ($categories as $categoryId => $categoryName) {
            foreach ($typesEquipment as $typeEquipmentId => $typeEquipment) {
                if ($categoryId == $typeEquipment->category_id) {
                    $dataForMenu[$categoryId][] = $typeEquipment;
                    ArrayHelper::remove($typesEquipment, $typeEquipmentId);
                }
            }
        }
        $dataForMenu = ArrayHelper::merge($dataForMenu, $typesEquipment);
        $this->dataForMenu = $dataForMenu;
        $this->categories = $categories;
        parent::init();
    }
}
