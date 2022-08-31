<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parole".
 *
 * @property int $id
 * @property string $parola
 * @property string $immagine
 * @property string $audio
 *
 * @property Coppie[] $coppies
 * @property Coppie[] $coppies0
 * @property Esercizioutente[] $esercizioutentes
 * @property Esercizioutente[] $esercizioutentes0
 * @property Parole[] $idParola1s
 * @property Parole[] $idParola2s
 */
class Parole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parole';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parola', 'immagine', 'audio'], 'required'],
            [['parola', 'immagine', 'audio'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parola' => 'Parola',
            'immagine' => 'Immagine',
            'audio' => 'Audio',
        ];
    }

  

    /**
     * Gets query for [[Esercizioutentes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEsercizioutentes()
    {
        return $this->hasMany(Exercise::class, ['idParola1' => 'id']);
    }

    /**
     * Gets query for [[Esercizioutentes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEsercizioutentes0()
    {
        return $this->hasMany(Exercise::class, ['idParola2' => 'id']);
    }

    /**
     * Gets query for [[IdParola1s]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdParola1s()
    {
        return $this->hasMany(Parole::class, ['id' => 'idParola1'])->viaTable('coppie', ['idParola2' => 'id']);
    }

    /**
     * Gets query for [[IdParola2s]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdParola2s()
    {
        return $this->hasMany(Parole::class, ['id' => 'idParola2'])->viaTable('coppie', ['idParola1' => 'id']);
    }
}
