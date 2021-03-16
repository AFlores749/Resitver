<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
/*    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
/*    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }*/

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('Listo');
                return $this->redirect(['contact']);
                Yii::$app->getSession()->removeFlash('Listo');

            } else {
                Yii::$app->getSession()->setFlash('Error');
                return $this->redirect(['contact']);
                Yii::$app->getSession()->removeFlash('Error');
            }
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
/*    public function actionAbout()
    {
        return $this->render('about');
    }*/

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                $id = $user->id;
                $key = $user->auth_key;
                $Subject = "Confirmar Registro";
                $body = "<h3><center>Hola ". $user->Nombre_Completo .". Haga click en el siguiente link para finalizar su registro</center></h3>";
                $body .= "<center><a href='http://resitver.x10.mx/site/confirm/" . $id ."''>Aqui </a> </center>";

                $email = Yii::$app->mailer->compose()
                ->setTo($user->email)
                ->setFrom([Yii::$app->params["no-reply"] => 'Resitver'])
                ->setSubject($Subject)
                ->setHtmlBody($body)
                ->send();

                if(!$email){
                    Yii::$app->getSession()->setFlash('Error');
                    $model = User::find($user->id);
                    $model->delete();
                    return $this->redirect(['signup']);
                    Yii::$app->getSession()->removeFlash('Error');  
                } else {
                    Yii::$app->getSession()->setFlash('Listo');
                    return $this->redirect(['signup']);
                    Yii::$app->getSession()->removeFlash('Listo');  
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionConfirm($id)
        {
            $user = \common\models\User::find()->where([
                'id' => $id,
                'status' => 0,
                ])->one();
            if(!empty($user)){
                $user->status = 10;
                $user->save();                
                Yii::$app->getSession()->setFlash('Listo');
                return $this->redirect(['index']);
                Yii::$app->getSession()->removeFlash('Listo');   
            } else {
                Yii::$app->getSession()->setFlash('Error');
                return $this->redirect(['index']);   
                Yii::$app->getSession()->removeFlash('Error');  
            }
        }



    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('ListoPass');
                return $this->redirect(['index']);
                Yii::$app->getSession()->removeFlash('ListoPass');   

            } else {
                Yii::$app->session->setFlash('error');
                return $this->redirect(['index']);
                Yii::$app->getSession()->removeFlash('Listo');   
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('ListoReset');
            return $this->redirect(['index']);
            Yii::$app->getSession()->removeFlash('ListoReset');  
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
