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
        $dataForMenu = [];
        foreach ($categories as $categoryId => $categoryName) {
            $dataForMenu[$categoryId] = TypesEquipment::findAll(['category_id' => $categoryId]);
        }
        $this->dataForMenu = $dataForMenu;
        $this->categories = $categories;
        parent::init();
    }
}
