<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
//use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UtentiSearch1;
//use app\models\UploadForm;
//use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

   
   
    /**
     * Login action.
     *
     * @return Response|string
     */
 /*   public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if (!Yii::$app->user->isGuest) {
            return $this->goProfile();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
*/
    /**
     * Logout action.
     *
     * @return Response
     */
  /*  public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    } */


    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionRecapiti()
    {
        $searchModel = new UtentiSearch1();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere([ 'role_id' => 3]);
        return $this->render('recapiti', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

 
    /**
     * Displays pre login page.
     *
     * @return string
     */
 /*   public function actionPrelogin()
    {
        return $this->render('sceltaLogin');
    } */

    /**
     * Displays page of a logopedista.
     *
     * @return string
     */
    public function actionHomelogopedista()
    {
        return $this->render('logopedista');
    }

    /**
     * Displays page of a user.
     *
     * @return string
     */
    public function actionHomeutente()
    {
        return $this->render('utente');
    }

    /**
     * Displays page of a caregiver.
     *
     * @return string
     */
    public function actionHomecaregiver()
    {
        return $this->render('caregiver');
    }

    public function actionCreastoria()
    {
        return $this->render('creastoria');
    }

    
    
  /*  public function actionRisultato()
    {
        return $this->render('risultato' );
    } */


    public function actionComunica()
    {
        return $this->render('comunica');
    }


  /* public function actionUpload() {
        $base_path = Yii::getAlias('@app');
        $web_path = Yii::getAlias('@web');
        $model = new UploadForm();
    
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstanceByName('file');
    
            if ($model->validate()) {
                $model->file->saveAs($base_path . '/web/uploads/' . $model->file->baseName . '.' . $model->file->extension);
            }
        }
    
        // Get file link
        $res = [
            'link' => $web_path . '/uploads/' . $model->file->baseName . '.' . $model->file->extension,
        ];
    
        // Response data
        Yii::$app->response->format = Yii::$app->response->format = Response::FORMAT_JSON;
        return $res;
    }*/
}
