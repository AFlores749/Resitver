<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comentarios".
 *
 * @property integer $idComent
 * @property integer $posts_id
 * @property integer $user_id
 * @property string $fecha
 * @property string $coment
 *
 * @property Posts $posts
 * @property User $user
 */
class Comentarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['posts_id', 'user_id', 'fecha', 'coment'], 'required'],
            [['posts_id', 'user_id'], 'integer'],
            [['fecha'], 'safe'],
            [['coment'], 'string', 'max' => 1000],
            [['posts_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posts::className(), 'targetAttribute' => ['posts_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idComent' => 'Id Coment',
            'posts_id' => 'Posts ID',
            'user_id' => 'User ID',
            'fecha' => 'Fecha',
            'coment' => 'Coment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasOne(Posts::className(), ['id' => 'posts_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
