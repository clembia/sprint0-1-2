<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "verifica".
 *
 * @property int $idTest
 * @property string $cognome
 * @property string $nome
 * @property string $codFisc
 * @property string $email
 * @property int $risp1
 * @property int $risp2
 * @property int $risp3
 * @property int $risp4
 * @property int $risp5
 * @property int $ut1
 * @property int $ut2
 * @property int $ut3
 * @property int $ut4
 * @property int $ut5
 * @property string $time_begin
 * @property string $time_end
 * @property int $nr_corrette
 */
class Verifica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'verifica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codFisc'], 'string', 'max' => 16],
            [['cognome', 'nome', 'codFisc', 'email', 'risp1', 'risp2', 'risp3', 'risp4', 'risp5', 'ut1', 'ut2', 'ut3', 'ut4', 'ut5', 'time_begin', 'time_end', 'nr_corrette'], 'required'],
            [['codFisc'], 'unique', 'message'=>'Codice Fiscale già esistente'],
            [['risp1', 'risp2', 'risp3', 'risp4', 'risp5', 'ut1', 'ut2', 'ut3', 'ut4', 'ut5', 'nr_corrette'], 'integer'],
            [['time_begin', 'time_end'], 'safe'],
            [['cognome', 'nome', 'email'], 'string', 'max' => 255],
            ['email', 'email', 'message' => 'Indirizzo Email non valido'],
            [['email'],'unique','message'=>'Email già esistente provane un\'altra'],
            
        ];
    }




    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTest' => 'Id Test',
            'cognome' => 'Cognome',
            'nome' => 'Nome',
            'codFisc' => 'Cod Fisc',
            'email' => 'Email',
            'risp1' => 'Risp 1',
            'risp2' => 'Risp 2',
            'risp3' => 'Risp 3',
            'risp4' => 'Risp 4',
            'risp5' => 'Risp 5',
            'ut1' => '',
            'ut2' => '',
            'ut3' => '',
            'ut4' => '',
            'ut5' => '',
            'time_begin' => 'Inizio test',
            'time_end' => 'Termine Test',
            'nr_corrette' => 'Nr Corrette',
        ];
    }



}
