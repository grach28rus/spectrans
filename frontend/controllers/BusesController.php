<?php

namespace frontend\controllers;

use Yii;
use common\models\Buses;
use frontend\models\BusesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\TypesEquipment;
use yii\helpers\ArrayHelper;
use common\models\CharacteristicsBuses;

/**
 * BusesController implements the CRUD actions for Buses model.
 */
class BusesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Buses models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BusesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Buses model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Buses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Buses();
        $typesEquipment = TypesEquipment::find()->all();
        $typesEquipment = ArrayHelper::map($typesEquipment, 'id', 'name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model'                     => $model,
            'typesEquipment'            => $typesEquipment,
        ]);
    }

    /**
     * Updates an existing Buses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $characteristicsBusesModel = new CharacteristicsBuses();
        $characteristicsBusesData = CharacteristicsBuses::findAll(['buses_id' => $id]);
        $typesEquipment = TypesEquipment::find()->all();
        $typesEquipment = ArrayHelper::map($typesEquipment, 'id', 'name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model'                     => $model,
                'typesEquipment'            => $typesEquipment,
                'characteristicsBusesData'  => $characteristicsBusesData,
                'characteristicsBusesModel' => $characteristicsBusesModel,
            ]);
        }
    }

    /**
     * Deletes an existing Buses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionBusesList($id = null)
    {
        $buses = Buses::find();
        $typesEquipment = TypesEquipment::findOne($id);
        if ($id) {
            $buses->where(['types_equipment_id' => $id]);
        }
        $buses = $buses->all();


        return $this->render('busesList', [
            'buses'          => $buses,
            'typesEquipment' => $typesEquipment
        ]);
    }

    /**
     * Finds the Buses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Buses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Buses::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
