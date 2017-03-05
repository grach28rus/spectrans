<?php

namespace frontend\components;

use Yii;
use common\models\TypesEquipment;

class Controller extends \yii\web\Controller{

    public $typesEquipment;

    public function init()
    {
       $this->typesEquipment = TypesEquipment::find()->all();
        parent::init();
    }

    public function generateResponse($template = null, $dataForTemplate = [])
    {
        if (Yii::$app->request->isAjax) {
            $actionTemplate = $template ? self::renderAjax($template, $dataForTemplate) : $template;
            if ($this->addMessage) {
                $actionTemplate = json_encode([
                    'actionTemplate' => $actionTemplate,
                    'success'        => $this->success ? $this->success : false,
                    'messages'       => $this->messages ? $this->messages : Yii::t('app', 'Operation has been performed!'),
                ]);
            }
        } else {
            $actionTemplate = $template ? $this->render($template, $dataForTemplate) : $template;
        }

        return $actionTemplate;
    }
}
