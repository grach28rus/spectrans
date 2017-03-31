<?php

namespace frontend\controllers;

use frontend\components\Controller;
use Yii;
use yii\web\Response;
use common\models\Buses;

class SiteMapController extends Controller
{

    public function actionIndex()
    {
        $urls = [];
        if (!$xmlSiteMap = Yii::$app->cache->get('sitemap')) {
            $buses = Buses::find()->all();

            foreach ($buses as $bus) {
                $urls[] = [
                    Yii::$app->urlManager->createUrl(['/buses/buses-list?id=' . $bus->id])
                ];
            }
        }

        $xmlSiteMap = $this->renderPartial('index', array(
            'host' => Yii::$app->request->hostInfo,
            'urls' => $urls,
        ));
        Yii::$app->cache->set('sitemap', $xmlSiteMap, 3600*12);
        Yii::$app->response->format = Response::FORMAT_XML;

        return $xmlSiteMap;
    }
}