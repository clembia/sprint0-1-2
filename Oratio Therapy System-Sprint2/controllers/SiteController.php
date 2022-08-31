<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\ContactForm;
use app\models\UtentiSearch1;


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



}
