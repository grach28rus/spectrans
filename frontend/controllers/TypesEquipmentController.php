<?php

namespace frontend\controllers;

use Yii;
use common\models\TypesEquipment;
use frontend\models\TypesEquipmentSearch;
use frontend\components\Controller;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\UploadForm;
use common\models\Category;

/**
 * TypesEquipmentController implements the CRUD actions for TypesEquipment model.
 */
class TypesEquipmentController extends Controller
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
     * Lists all TypesEquipment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TypesEquipmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TypesEquipment model.
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
     * Creates a new TypesEquipment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TypesEquipment();
        $category = Category::find()->all();
        $category = ArrayHelper::map($category, 'id', 'name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model'    => $model,
                'category' => $category,
            ]);
        }
    }

    /**
     * Updates an existing TypesEquipment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $category = Category::find()->all();
        $category = ArrayHelper::map($category, 'id', 'name');
        $uploadForm = new UploadForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        }

        return $this->render('update', [
            'model'      => $model,
            'uploadForm' => $uploadForm,
            'category'   => $category,
        ]);
    }

    /**
     * Deletes an existing TypesEquipment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TypesEquipment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TypesEquipment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TypesEquipment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
