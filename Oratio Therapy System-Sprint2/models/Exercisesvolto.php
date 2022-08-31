<?php

namespace app\models;
use amnah\yii2\user\models\User;
use Yii;


/**
 * This is the model class for table "exercisesvolto".
 *
 * @property int $IdAssegn
 * @property string $cfUtente
 * @property int $idEsercizio
 * @property int $svolto
 * @property int $PunteggioOtt
 * @property int $IndiceGradimento
 * @property int $convalida
 *
 * @property User $cfUtente0
 * @property Exercise $idEsercizio0
 */
class Exercisesvolto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercisesvolto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dataAss', 'dataSvolg'], 'date', 'format' => 'php:Y-m-d'],
            [['cfUtente', 'idEsercizio'] , 'required'],
            [['idEsercizio', 'svolto', 'PunteggioOtt', 'IndiceGradimento', 'convalida'], 'integer'],
            [['cfUtente'], 'string', 'max' => 16],
            [['cfUtente'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['cfUtente' => 'codFisc']],
            [['idEsercizio'], 'exist', 'skipOnError' => true, 'targetClass' => Exercise::class, 'targetAttribute' => ['idEsercizio' => 'idEsercizio']],
        
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdAssegn' => 'Id Assegn',
            'cfUtente' => 'Codice Fiscale Utente',
            'idEsercizio' => 'Id Esercizio assegnato',
            'svolto' => 'Svolto',
            'PunteggioOtt' => 'Punteggio Ott',
            'IndiceGradimento' => 'Indice Gradimento',
            'convalida' => 'Convalida',
            'dataAss' => 'Data assegnazione',
            'dataSvolg' => 'Data Svolgimento',

        ];
    }

    /**
     * Gets query for [[CfUtente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCfUtente0()
    {
        return $this->hasOne(User::class, ['codFisc' => 'cfUtente']);
    }

    /**
     * Gets query for [[IdEsercizio0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEsercizio0()
    {
        return $this->hasOne(Exercise::class, ['idEsercizio' => 'idEsercizio']);
    }
}
