<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

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
            ['semestre', 'string', 'min'=>1, 'max'=>2]


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
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        $user->Num_Control = $this->num_control;
        $user->Nombre_Completo = $this->nombre_completo;
        $user->Carrera_IdCarrera = $this->carrera;
        $user->Semestre = $this->semestre;

        return $user->save() ? $user : null;
    }
}
