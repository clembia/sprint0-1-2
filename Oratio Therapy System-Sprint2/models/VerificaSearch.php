<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Verifica;

/**
 * VerificaSearch represents the model behind the search form of `app\models\Verifica`.
 */
class VerificaSearch extends Verifica
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTest', 'risp1', 'risp2', 'risp3', 'risp4', 'risp5', 'ut1', 'ut2', 'ut3', 'ut4', 'ut5', 'nr_corrette'], 'integer'],
            [['cognome', 'nome', 'codFisc', 'email', 'time_begin', 'time_end'], 'safe'],
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
        $query = Verifica::find();

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
            'idTest' => $this->idTest,
            'risp1' => $this->risp1,
            'risp2' => $this->risp2,
            'risp3' => $this->risp3,
            'risp4' => $this->risp4,
            'risp5' => $this->risp5,
            'ut1' => $this->ut1,
            'ut2' => $this->ut2,
            'ut3' => $this->ut3,
            'ut4' => $this->ut4,
            'ut5' => $this->ut5,
            'time_begin' => $this->time_begin,
            'time_end' => $this->time_end,
            'nr_corrette' => $this->nr_corrette,
        ]);

        $query->andFilterWhere(['like', 'cognome', $this->cognome])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'codFisc', $this->codFisc])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
