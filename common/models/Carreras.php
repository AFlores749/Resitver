<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "carreras".
 *
 * @property integer $id
 * @property string $Nombre
 *
 * @property AsesoresInt[] $asesoresInts
 * @property Proyectos[] $proyectos
 * @property User[] $users
 */
class Carreras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carreras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsesoresInts()
    {
        return $this->hasMany(AsesoresInt::className(), ['Carrera_idCarrera' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectos()
    {
        return $this->hasMany(Proyectos::className(), ['carreras_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['Carrera_IdCarrera' => 'id']);
    }
}
