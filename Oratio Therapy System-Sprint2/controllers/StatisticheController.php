<?php

namespace app\controllers;

use Yii;
use yii\data\SqlDataProvider;

class StatisticheController extends \yii\web\Controller
{
   
    public function actionIndex()
    {
        $cfUtAssociato=addslashes(Yii::$app->user->identity->codFisc);
        $totale = Yii::$app->db->createCommand('select count(*) from exercisesvolto group by idEsercizio')->queryScalar();
        $query='select exercise.efficacia, exercisesvolto.idEsercizio,cast(avg(IndiceGradimento)as decimal(10,2)) as media from exercisesvolto join exercise on exercise.idEsercizio=exercisesvolto.idEsercizio where cfLog='."'".$cfUtAssociato."'" .' and exercisesvolto.svolto=1 group by idEsercizio' ;
        $dataProvider = new SqlDataProvider([
            'sql' => $query,
            'totalCount' => $totale,
            'sort' =>false,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

}
