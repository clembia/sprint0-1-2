<?php

namespace app\controllers;

use app\models\Exercisesvolto;
use app\models\ExercisesvoltoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use amnah\yii2\user\models\User;
use yii;
use app\models\Exercise;
use yii\helpers\ArrayHelper;

/**
 * ExercisesvoltoController implements the CRUD actions for Exercisesvolto model.
 */
class ExercisesvoltoController extends Controller
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
        $searchModel = new ExercisesvoltoSearch();
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
        return $this->render('view', [
            'model' => $this->findModel($IdAssegn),
        ]);
    }

    /**
     * Creates a new Exercisesvolto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Exercisesvolto;
        $user = new User;
        $g = $user->OttieniutentiLog(Yii::$app->user->identity->codFisc);
        $eserc = new Exercise;
        $h1=$eserc->OttienEserciziLogopedista(Yii::$app->user->identity->codFisc);
        $h=ArrayHelper::map($h1, 'idEsercizio','idEsercizio'  );
        $model->dataAss = date("d-m-Y");
        $model->svolto=0;
        $model->PunteggioOtt=0;
        $model->IndiceGradimento=0;
        $model->convalida=0;
        $model->dataSvolg=NULL;
                   
       
           
       
           if (isset($_POST['PreviewButton']))
           {
            $model->attributes=$_POST['Exercisesvolto'];
            
            $model->setAttributes($model);
            if ($model->save()) {

                return $this->redirect(['view', 'IdAssegn' => $model->IdAssegn]);
            }

        } else {
            if (isset($_POST['Exercisesvolto']) ) 
            $model->attributes=$_POST['Exercisesvolto'];
                return $this->render('create', [
                'model' => $model,
                'g' => $g,
                'h' => $h,
            ]);
        }
    
    }



    /**
     * Updates an existing Exercisesvolto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $IdAssegn Id Assegn
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IdAssegn)
    {
        $model = $this->findModel($IdAssegn);
        $user = new User;
        $g = $user->OttieniutentiLog(Yii::$app->user->identity->codFisc);
        $eserc = new Exercise;
        $h1=$eserc->OttienEserciziLogopedista(Yii::$app->user->identity->codFisc);
        $h=ArrayHelper::map($h1, 'idEsercizio','idEsercizio'  );
        
        
        $model->setAttributes($model);
           if (isset($_POST['PreviewButton']))
           { 
           $model->attributes=$_POST['Exercisesvolto'];

            if ($model->save()) {
                return $this->redirect(['view', 'IdAssegn' => $model->IdAssegn]);
            }
            
        } else {
            if (isset($_POST['Exercisesvolto']) ) 
            $model->attributes=$_POST['Exercisesvolto'];
                return $this->render('update', [
                'model' => $model,
                'g' => $g,
                'h' => $h,
            ]);
        }
    
    }





    /**
     * Deletes an existing Exercisesvolto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $IdAssegn Id Assegn
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IdAssegn)
    {
        $this->findModel($IdAssegn)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Exercisesvolto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $IdAssegn Id Assegn
     * @return Exercisesvolto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdAssegn)
    {
        if (($model = Exercisesvolto::findOne(['IdAssegn' => $IdAssegn])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
