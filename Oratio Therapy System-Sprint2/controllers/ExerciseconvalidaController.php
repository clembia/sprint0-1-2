<?php

namespace app\controllers;

use app\models\Exercisesvolto;
use app\models\ExerciseconvalidaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExercisesutenteController implements the CRUD actions for Exercisesvolto model.
 */
class ExerciseconvalidaController extends Controller
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
        $searchModel = new ExerciseconvalidaSearch();
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
    public function actionCreate($IdAssegn)
    {
        $model = $this->findModel($IdAssegn);
        if  ($this->request->isPost && $model->load($this->request->post())  && $model->save()) {
                return $this->redirect(['view', 'IdAssegn' => $model->IdAssegn]);  
            }
      else {
        return $this->render('create', [
            'model' => $this->findModel($IdAssegn),
        ]);
        }
            

    }


    public function actionView($IdAssegn)
    {
             return $this->render('view', [
            'model' => $this->findModel($IdAssegn),
        ]);
        }
            


        public function actionUpdate($IdAssegn)
        {
            $model = $this->findModel($IdAssegn);
            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'IdAssegn' => $model->IdAssegn]);
            }
            return $this->render('update', [
                'model' => $model,
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
