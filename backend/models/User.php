<?php

namespace backend\models;
use common\models\Carreras;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $Num_Control
 * @property string $Nombre_Completo
 * @property integer $Carrera_IdCarrera
 * @property string $Img_Perfil
 * @property integer $Semestre
 * @property string $Acerca_De
 *
 * @property Comentarios[] $comentarios
 * @property Documentacion[] $documentacions
 * @property Followers[] $followers
 * @property Followers[] $followers0
 * @property User[] $idSiguiendos
 * @property User[] $idSeguidors
 * @property Posts[] $posts
 * @property Proyectos[] $proyectos
 * @property Reportes[] $reportes
 * @property Carreras $carreraIdCarrera
 */
class User extends \yii\db\ActiveRecord
{

    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at', 'Carrera_IdCarrera'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'Img_Perfil'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['Num_Control'], 'string', 'max' => 9],
            [['Nombre_Completo'], 'string', 'max' => 30],
            [['Semestre'], 'string', 'max' => 45],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['Num_Control'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['Carrera_IdCarrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carreras::className(), 'targetAttribute' => ['Carrera_IdCarrera' => 'id']],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            [['Img_Perfil'], 'required'],
            [['Acerca_De'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Nombre de Usuario',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Correo Electronico',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'Num_Control' => 'Numero de Control',
            'Nombre_Completo' => 'Nombre Completo',
            'Carrera_IdCarrera' => 'Carrera',
            'Img_Perfil' => 'Imagen de Perfil',
            'Semestre' => 'Semestre',
            'Acerca_De' => 'Acerca De',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentacions()
    {
        return $this->hasMany(Documentacion::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectos()
    {
        return $this->hasMany(Proyectos::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportes()
    {
        return $this->hasMany(Reportes::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarreraIdCarrera()
    {
        return $this->hasOne(Carreras::className(), ['id' => 'Carrera_IdCarrera']);
    }

 /** 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getFollowers() 
   { 
       return $this->hasMany(Followers::className(), ['id_seguidor' => 'id']); 
   } 

           /** 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getFollowed() 
   { 
       return $this->hasMany(Followers::className(), ['id_siguiendo' => 'id']); 
   } 
 
   /** 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getIdSiguiendo() 
   { 
       return $this->hasMany(User::className(), ['id' => 'id_siguiendo'])->viaTable('followers', ['id_seguidor' => 'id']); 
   } 
 
   /** 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getIdSeguidor() 
   { 
       return $this->hasMany(User::className(), ['id' => 'id_seguidor'])->viaTable('followers', ['id_siguiendo' => 'id']); 
   }
}
