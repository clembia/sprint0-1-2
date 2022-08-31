<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Exercise;
use yii;

/**
 * ExerciseSearch represents the model behind the search form of `app\models\Exercise`.
 */
class ExerciseSearch extends Exercise
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idEsercizio', ], 'integer'],
            [['cflog', 'rispCorretta', 'idParola1', 'idParola2', 'efficacia'], 'safe'],
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
        $query = Exercise::find();

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
            'idEsercizio' => $this->idEsercizio,
            'idParola1' => $this->idParola1,
            'idParola2' => $this->idParola2,
            'cflog' => Yii::$app->user->identity->codFisc,
        ]);

        $query->andFilterWhere(['like', 'cflog', $this->cflog])
            ->andFilterWhere(['like', 'rispCorretta', $this->rispCorretta]);

        return $dataProvider;
    }
}
