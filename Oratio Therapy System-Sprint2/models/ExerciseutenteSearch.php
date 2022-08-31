<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Exercisesvolto;
use Yii;

/**
 * ExercisesvoltoSearch represents the model behind the search form of `app\models\Exercisesvolto`.
 */
class ExerciseutenteSearch extends Exercisesvolto
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
        $query = Exercisesvolto::find()->where(['cfUtente'=> Yii::$app->user->identity->codFisc])->orderBy(['dataAss'=> SORT_DESC]);
       
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
            'dataAss' => $this->dataAss,
            'dataSvolg' => $this->dataSvolg,
        ]);

        $query->andFilterWhere(['like', 'cfUtente', $this->cfUtente]);

        return $dataProvider;
    }
}
