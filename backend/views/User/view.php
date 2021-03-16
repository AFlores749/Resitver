<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use backend\models\Followers;
use kartik\widgets\Growl;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->Nombre_Completo;
if($model->id == Yii::$app->user->identity->id){
    $this->params['breadcrumbs'][] = 'Mi perfil';
} else {
    $this->params['breadcrumbs'][] = $model->Nombre_Completo;
}

if (Yii::$app->session->hasFlash('Followed')) {
    echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => '¡Listo!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'Ahora sigues a '.$model->Nombre_Completo,
    'showSeparator' => true,
    'delay' => 0,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);
}

if (Yii::$app->session->hasFlash('Unfollowed')) {
    echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => '¡Listo!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'Dejaste de seguir a '.$model->Nombre_Completo,
    'showSeparator' => true,
    'delay' => 0,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);
}

?>

<div class="user-view">
    <div align="center">
    <h1>
    <?= Html::img(Yii::$app->request->baseUrl . '/' .$model->Img_Perfil, ['alt' => 'Imagen de Perfil', 'width'=>'200', ]) ?>
    <br>
    <?= Html::encode($this->title) ?>
    <br>        
    </h1> 
    <h3> "<?= Html::encode($model->Acerca_De) ?>" </h3>
    <br>
    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [        
            'Num_Control',
            'username',
            'email:email',
            [
            'label' => 'Carrera',
            'value' => $model->carreraIdCarrera->Nombre,
            ],
            'Semestre',
        ],
    ]) ?>

    <p>
        <?php
        $follow = Followers::findOne(['id_seguidor' => $user->id, 'id_siguiendo' => $model->id]);
        if($model->id == $user->id){
            echo Html::button('Editar informacion', ['value'=>Url::to(['user/update', 'id' =>$model->id]), 'class' => 'btn btn-primary', 'id'=>'modalButton']); 
        } else {
            if($follow == null){
                echo Html::a('Seguir', ['user/follow', 'follower' => $user->id, 'followed' => $model->id], ['class' => 'btn btn-success']);
            } else {
                echo Html::a('Dejar de seguir', ['user/unfollow', 'follower' => $user->id, 'followed' => $model->id], ['class' => 'btn btn-danger']);
            }
        }
        ?>
    </p>

    <?php
        Modal::begin([
            'header'=>'<h4></h4>',
            'id'=>'modal',
            'size'=>'modal-lg',
            ]);

        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>

</div>
