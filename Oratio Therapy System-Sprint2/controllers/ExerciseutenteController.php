<?php

namespace app\controllers;

use app\models\Exercisesvolto;
use app\models\ExerciseutenteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Exercise;


/**
 * ExercisesutenteController implements the CRUD actions for Exercisesvolto model.
 */
class ExerciseutenteController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return 
            array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Exercisesvolto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ExerciseutenteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Exercisesvolto model.
     * @param int $IdAssegn Id Assegn
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IdAssegn)
    {
        $model = $this->findModel($IdAssegn);
        if (isset($_POST['PreviewButton']))
        {
            $model->attributes=$_POST['Exercisesvolto'];
            $model->svolto=1; 
            $gt = Exercise::findone(['idEsercizio'=>$model->idEsercizio]);
            if ($gt['rispCorretta']=="parola1")  $t=0;
            if ($gt['rispCorretta']=="parola2")  $t=1;
            if ($model->PunteggioOtt==$t) 
            {
            $model->PunteggioOtt =1;
            $gt->efficacia++;
            $gt->save();             
            }
            else $model->PunteggioOtt =0;
            $model->dataAss = date("Y-m-d",strtotime($model->dataAss)); 
            $model->dataSvolg = date("Y-m-d",strtotime($model->dataSvolg)); 

            $co = Exercisesvolto::find()->where(['idEsercizio'=>$model->idEsercizio])->count();  
            print_r($gt->efficacia );
            print_r($co);
            $per = ($gt->efficacia/$co) *100;
            {
                 if ($model->save()) {
                   return $this->render('valuta', [
                    'model' => $this->findModel($IdAssegn),
                    'per' => $per,
                ]);
                               }
            }
         
     } else {
        return $this->render('view', [
            'model' => $this->findModel($IdAssegn),
        ]);
     }          
    }


     public function actionValuta($IdAssegn)
     {
        $model= $this->findModel($IdAssegn);
        return $this->render('valuta', [
            'model' => $this->findModel($IdAssegn),
        ]);
     }

   
    protected function findModel($IdAssegn)
    {
        if (($model = Exercisesvolto::findOne(['IdAssegn' => $IdAssegn])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
