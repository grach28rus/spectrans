<?php
namespace frontend\controllers;

use Yii;
use frontend\components\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\UploadForm;
use yii\web\UploadedFile;
use common\models\TypesEquipment;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'upload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [

                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $typesEquipment = TypesEquipment::find()->all();

        return $this->render('index', [
            'typesEquipment' => $typesEquipment
        ]);
    }


    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (1) {
                $a = $model->sendEmail(Yii::$app->params['adminEmail']);
                Yii::$app->session->setFlash('success', 'Ваше сообщение было отправленно!' . $a);
            } else {
                Yii::$app->session->setFlash('error', 'произошла ошибка во время отправки');
            }


        } else {
            Yii::$app->session->setFlash('error', 'произошла ошибка во время отправки');
        }

        return $this->redirect('index');
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionUpload($id)
    {
        $uploadForm = new UploadForm();
        $model = TypesEquipment::findOne($id);
        if (Yii::$app->request->isPost) {
            $uploadForm->imageFile = UploadedFile::getInstance($uploadForm, 'imageFile');
            if ($uploadForm->upload()) {
                $model->image_path = $uploadForm::FILE_IMAGE_PATH . $uploadForm->imageFile->baseName . '.' . $uploadForm->imageFile->extension;
                $model->save();
            }
        }

        return $this->redirect(['/types-equipment/update', 'id' => $model->id]);
    }
}
