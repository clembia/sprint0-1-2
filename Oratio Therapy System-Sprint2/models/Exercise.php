<?php

namespace app\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "exercise".
 *
 * @property int $idEsercizio
 * @property string $cflog
 * @property int $idParola1
 * @property int $idParola2
 * @property string $rispCorretta
 *
 * @property Exercisesvolto[] $exercisesvoltos
 * @property Parole $idParola10
 * @property Parole $idParola20
 */
class Exercise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            
            [['idParola1', 'idParola2', 'rispCorretta'], 'required'],
            [['idParola1', 'idParola2', 'efficacia'], 'integer'],
            [['rispCorretta'], 'string'],
            [['cflog'], 'string', 'max' => 16],
            [['idParola1'], 'exist', 'skipOnError' => true, 'targetClass' => Parole::class, 'targetAttribute' => ['idParola1' => 'id'], 
            
        ],
            [['idParola2'], 'exist', 'skipOnError' => true, 'targetClass' => Parole::class, 'targetAttribute' => ['idParola2' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idEsercizio' => 'Id Esercizio',
            'cflog' => 'Logopedista Assegnato',
            'idParola1' => 'Parola nr. 1 ',
            'idParola2' => 'Parola nr. 2',
            'rispCorretta' => 'Risposta Corretta',
        ];
    }

    /**
     * Gets query for [[Exercisesvoltos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercisesvoltos()
    {
        return $this->hasMany(Exercisesvolto::class, ['idEsercizio' => 'idEsercizio']);
    }

    /**
     * Gets query for [[IdParola10]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdParola10()
    {
        return $this->hasOne(Parole::class, ['id' => 'idParola1']);
    }

    /**
     * Gets query for [[IdParola20]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdParola20()
    {
        return $this->hasOne(Parole::class, ['id' => 'idParola2']);
    }
    
    public static  function  get_risp2(){
       $cat = Exercise::find()->all();
       $cat = ArrayHelper::map($cat, 'idEsercizio', 'parola');
        return $cat;
    }

    
    public function OttienEserciziLogopedista($cflog)
    {
        $exe = Exercise::find()->where(['cfLog' => $cflog])->all();
        return $exe;
    
        
    }    
}
