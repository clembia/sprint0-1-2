<?php

namespace app\controllers;

use app\models\Exercise;
use app\models\ExerciseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use app\models\Parole;
use yii\helpers\ArrayHelper;

/**
 * ExerciseController implements the CRUD actions for Exercise model.
 */
class ExerciseController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
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
     * Lists all Exercise models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ExerciseSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Exercise model.
     * @param int $idEsercizio Id Esercizio
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idEsercizio)
    {
        return $this->render('view', [
            'model' => $this->findModel($idEsercizio),
        ]);
    }

  
    /**
     * Creates a new Exercise model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {   
        $model = new Exercise();
        $list= ArrayHelper::map(Parole::find() 
        ->orderBy('parola')
        ->all(),'id','parola');
        if (isset($_POST['PreviewButton']))
        {
         $model->attributes=$_POST['Exercise'];
         if ($model->save()) {
            return $this->redirect(['view', 'idEsercizio' => $model->idEsercizio]);
         }
     } else {
         if (isset($_POST['Exercise']) ) 
         $model->attributes=$_POST['Exercise'];
         return $this->render('create', [
            'model' => $model,
            'list' => $list,
        ]);
     }

    }


    /**
     * Updates an existing Exercise model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idEsercizio Id Esercizio
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idEsercizio)
    {
        $model = $this->findModel($idEsercizio);
        $list= ArrayHelper::map(Parole::find() 
        ->orderBy('parola')
        ->all(),'id','parola');
       // $cc=Exercisesvolto::find()->where(['idEsercizio' => $idEsercizio, 'svolto'=>1])->count();
        //if ($cc==0) 
        //{
                if (isset($_POST['PreviewButton']))
                {
                $model->attributes=$_POST['Exercise'];
                if ($model->save()) {
                    return $this->redirect(['view', 'idEsercizio' => $model->idEsercizio]);
                }
            } else {
                if (isset($_POST['Exercise']) ) 
                $model->attributes=$_POST['Exercise'];

                return $this->render('update', [
                    'model' => $model,
                    'list' => $list,
                ]);
            }
        //}
        //else

       // {
       //     return $this->redirect(['index']);
      //  }
    }

    /**
     * Deletes an existing Exercise model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idEsercizio Id Esercizio
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idEsercizio)
    {
       
            $this->findModel($idEsercizio)->delete();
            return $this->redirect(['index']);

    }

    /**
     * Finds the Exercise model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idEsercizio Id Esercizio
     * @return Exercise the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idEsercizio)
    {
        
        if (($model = Exercise::findOne(['idEsercizio' => $idEsercizio])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
