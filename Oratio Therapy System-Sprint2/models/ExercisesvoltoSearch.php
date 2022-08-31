<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Exercisesvolto;
use Yii;
/**
 * ExercisesvoltoSearch represents the model behind the search form of `app\models\Exercisesvolto`.
 */
class ExercisesvoltoSearch extends Exercisesvolto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdAssegn', 'idEsercizio', 'svolto', 'PunteggioOtt', 'IndiceGradimento', 'convalida'], 'integer'],
            [['cfUtente','dataAss','dataSvolg'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
      //  $query = Exercisesvolto::find()->joinWith(['exercisesvolto_ibfk_2'])->all();
        $query = Exercisesvolto::find()
        ->select('exercisesvolto.*')  // make sure same column name not there in both table
        ->leftJoin('exercise', 'exercise.idEsercizio = exercisesvolto.idEsercizio')
        ->where(['exercise.cflog'=> Yii::$app->user->identity->codFisc ])->orderBy(['cfUtente'=>SORT_ASC]);


        //print_r(Yii::$app->user->identity->codFisc);
         

  
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IdAssegn' => $this->IdAssegn,
            'exercisesvolto.idEsercizio' => $this->idEsercizio,
            'svolto' => $this->svolto,
            'PunteggioOtt' => $this->PunteggioOtt,
            'IndiceGradimento' => $this->IndiceGradimento,
            'convalida' => $this->convalida,
            'dataSvolg' => $this->dataSvolg,
        ]);

        $query->andFilterWhere(['like', 'cfUtente', $this->cfUtente]);

        return $dataProvider;
    }



    public function afterFind()

	{

		parent::afterFind();

		$this->begin= date('d.m.y', strtotime($this->begin));

		$this->end= date('d.m.y', strtotime($this->end));		

	}

	


    
}
