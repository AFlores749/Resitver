<?php
namespace frontend\models;

use Yii;
use yii\helpers\Url;
use yii\helpers\FileHelper;
use yii\base\Model;
use common\models\User;
use yii\web\UploadedFile;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $num_control;
    public $nombre_completo;
    public $carrera;
    public $semestre;
    public $img_perfil;
    public $file;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message'=> 'Nombre de usuario requerido' ],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este nombre de usuario ya ha sido registrado.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message'=> 'Correo Electronico requerido' ],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este correo ya ha sido registrado.'],

            ['password', 'required', 'message'=> 'Contraseña requerida' ],
            ['password', 'string', 'min' => 6],

            ['num_control', 'required', 'message'=> 'Numero de control requerido' ],
            ['num_control', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este numero de control ya ha sido registrado.'],
            ['num_control', 'string', 'min' => 9, 'max'=> 9],

            ['nombre_completo', 'required', 'message'=> 'Nombre requerido' ],
            ['nombre_completo', 'string', 'max' => 50],

            ['carrera', 'required', 'message'=> 'Carrera requerida' ],
            
            ['semestre', 'required',  'message'=> 'Semestre requerida'],
            ['semestre', 'string', 'min'=>1, 'max'=>2],

            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],

            ['img_perfil', 'string', 'min'=>1, 'max'=>200],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();

        $path = (Yii::getAlias('@uploads') .'/'.$this->num_control);
        $path2 = (Yii::getAlias('@uploads') . '/' .$this->num_control.'/Documentacion');
        $path3 = (Yii::getAlias('@uploads') . '/' .$this->num_control.'/Reportes');

        FileHelper::createDirectory($path);
        FileHelper::createDirectory($path2);
        FileHelper::createDirectory($path3);

        if($this->file = UploadedFile::getInstance($this, 'file')){
            $this->file->saveAs(Url::to(Yii::getAlias('@uploads') ).'/'.$this->num_control.'/'.$this->num_control.'.'.$this->file->extension);
            $user->Img_Perfil =  'uploads/'.$this->num_control.'/'.$this->num_control.'.'.$this->file->extension;
        } else {
            $user->Img_Perfil =  'media/user.jpg';
        }

        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        $user->Num_Control = $this->num_control;
        $user->Nombre_Completo = $this->nombre_completo;
        $user->Carrera_IdCarrera = $this->carrera;
        $user->Semestre = $this->semestre;
        $user->status = 0;

        return $user->save() ? $user : null;
    }
}
