<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     *//*
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/


    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }


        return $this->render('view', [
            'model' => $this->findModel($id),
            'user' => $this->findModel(Yii::$app->user->identity->id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     *//*
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    public function actionUpdate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
       $model = $this->findModel(Yii::$app->user->id);
        $model->load(Yii::$app->request->post());

        if(Yii::$app->request->isPost){
            //Try to get file info
            $file = \yii\web\UploadedFile::getInstance($model, 'file');

            //If received, then I get the file name and asign it to $model->image in order to store it in db
            if(!empty($file)){
                $model->Img_Perfil = 'uploads/'.$model->Num_Control.'/'.$model->Num_Control.'.'.$file->extension;
            }

            //I proceed to validate model. Notice that will validate that 'image' is required and also 'image_upload' as file, but this last is optional
            if ($model->validate() && $model->save()) {

                //If all went OK, then I proceed to save the image in filesystem
                if(!empty($file)){
                    $file->saveAs(Url::to('@backend/web/uploads/').$model->Num_Control.'/'.$model->Num_Control.'.'.$file->extension);
                }

                return $this->redirect(['view', 'id' => Yii::$app->user->id]);
            }
        }
        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     *//*
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La pagina solicitada no existe.');
        }
    }

    public function actionFollow($follower, $followed)
    {
        $modelo = new \backend\models\Followers();
        $modelo->id_seguidor = $follower;
        $modelo->id_siguiendo = $followed;
        $modelo->save();
        Yii::$app->getSession()->setFlash('Followed');
        return $this->redirect(['view', 'id' => $followed]);
        Yii::$app->getSession()->removeFlash('Followed');
    }

    public function actionUnfollow($follower, $followed)
    {
        $model = \backend\models\Followers::findOne(['id_seguidor' => $follower, 'id_siguiendo' => $followed]);
        $model->delete();
        Yii::$app->getSession()->setFlash('Unfollowed');
        return $this->redirect(['view', 'id' => $followed]);
        Yii::$app->getSession()->removeFlash('Unfollowed');
    }

    public function actionShowfollowed()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new \backend\models\FollowersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['id_seguidor' => Yii::$app->user->identity->id]);

        return $this->render('allfollowed', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
    public function actionShowfollowers()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new \backend\models\FollowersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['id_siguiendo' => Yii::$app->user->identity->id]);

        return $this->render('allfollowers', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } 

    public function actionAll()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } 
       
}
