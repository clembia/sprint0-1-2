<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Exercisesvolto;
use Yii;
use amnah\yii2\user\models\User;

/**
 * ExerciseconvalidaSearch represents the model behind the search form of `app\models\Exercisesvolto`.
 */
class ExerciseconvalidaSearch extends Exercisesvolto
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
       {$q = User::findone(['codFisc'=> Yii::$app->user->identity->codFisc]) ;

        $query = Exercisesvolto::find()->where(['cfUtente'=> $q->cfUtAssociato, 'svolto'=>1 ]);
       

       // $logcf = User::findone(['codFisc' =>Yii::$app->user->identity->codFisc ])->cfLogAssociato; 

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
            'idEsercizio' => $this->idEsercizio,
            'svolto' => $this->svolto,
            'PunteggioOtt' => $this->PunteggioOtt,
            'IndiceGradimento' => $this->IndiceGradimento,
            'convalida' => $this->convalida,
        ]);

        $query->andFilterWhere(['like', 'cfUtente', $this->cfUtente]);

        return $dataProvider;
    }
}
