<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "amistades".
 *
 * @property integer $id_seguidor
 * @property integer $id_siguiendo
 *
 * @property User $idSeguidor
 * @property User $idSiguiendo
 */
class Followers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'followers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_seguidor', 'id_siguiendo'], 'required'],
            [['id_seguidor', 'id_siguiendo'], 'integer'],
            [['id_seguidor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_seguidor' => 'id']],
            [['id_siguiendo'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_siguiendo' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_seguidor' => 'Id Seguidor',
            'id_siguiendo' => 'Id Siguiendo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSeguidor()
    {
        return $this->hasOne(User::className(), ['id' => 'id_seguidor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSiguiendo()
    {
        return $this->hasOne(User::className(), ['id' => 'id_siguiendo']);
    }
}
