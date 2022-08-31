<?php

namespace app\controllers;

use app\models\Verifica;
use app\models\VerificaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use app\models\Tempo;
use yii\web\Response;
use yii\widgets\ActiveForm;


/**
 * VerificaController implements the CRUD actions for Verifica model.
 */
class VerificaController extends Controller
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
               
            ], 
            
        );
    }

    /**
     * Lists all Verifica models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VerificaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Verifica model.
     * @param int $idTest Id Test
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idTest)
    {
        return $this->render('view', [
            'model' => $this->findModel($idTest),
        ]);
    }


    /**
     * Creates a new Verifica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    
    
    
     public function actionCreate()
    {   
        $model = new Verifica();
        $temp = new Tempo();
        $start = microtime(true);
        $temp->time_begin  =  Yii::$app->formatter->asDatetime($start, 'php:Y/m/d H:i:s');
        $xc = Tempo::find(['time_begin'])->count();
        if ($xc==1) 
        {    
            $xc1 = Tempo::find(['time_begin'])->one(); 
            $xc1->delete();
            $temp->save();
        }
        if ($xc==0) $temp->save();
        

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
          } 
          else if ($model->load(Yii::$app->request->post())) {
            
          }
          
        



        if (isset($_POST['PreviewButton']))
            {
                $model->attributes=$_POST['Verifica'];
                $model->risp1 = 2;
                $model->risp2 = 1;
                $model->risp3 = 2;
                $model->risp4 = 1;
                $model->risp5 = 1;
                $cont=0;
                if ($model->risp1 == $model->ut1)  $cont++; 
                if ($model->risp2 == $model->ut2)  $cont++; 
                if ($model->risp3 == $model->ut3)  $cont++; 
                if ($model->risp4 == $model->ut4)  $cont++; 
                if ($model->risp5 == $model->ut5)  $cont++; 
                $model->nr_corrette = $cont;
                if ($model->load($this->request->post())) {
                    $end = microtime(true);
                    $xc = Tempo::find(['time_begin'])->one();
                    $model->time_begin= $xc->time_begin;
                    $model->time_end = Yii::$app->formatter->asDatetime($end, 'php:Y/m/d H:i:s');
                    $xc ->delete();
                    if ($model->save())
                            return $this->render('risultato', [
                                                'cont' => $cont,
                                            ]);
                    else
                    return $this->render('create', [
                        'model' => $model,
                    ]);              
                 }
           }
        if (isset($_POST['Verifica']) ) 
            $model->attributes=$_POST['Verifica'];
         return $this->render('create', [
            'model' => $model,
        ]);
       
    }


        public function actionRisultato()
        {
            $model = new Verifica();
            return $this->render('risultato', [
                'model' => $model,
        ]);
        }


    /**
     * Updates an existing Verifica model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idTest Id Test
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idTest)
    {
        $model = $this->findModel($idTest);
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTest' => $model->idTest]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Verifica model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idTest Id Test
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idTest)
    {
        $this->findModel($idTest)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Verifica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idTest Id Test
     * @return Verifica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idTest)
    {
        if (($model = Verifica::findOne(['idTest' => $idTest])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
