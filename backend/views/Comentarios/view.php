<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model backend\models\Posts */

$this->title = 'Ver detalles';
?>

<p>
    <?php
        if($model->user_id == Yii::$app->user->identity->id){
            echo Html::a('Actualizar', ['update', 'id' => $model->idComent], ['class' => 'btn btn-success']);
            echo ' ';
            echo Html::a('Eliminar', ['delete', 'id' => $model->idComent, 'idPost' => $model->posts_id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => '¿Estas seguro de que quieres eliminar este comentario?',
            'method' => 'post',
        ],
    ]);
        }
    ?>
</p>


<br>

<div class="bg-success">
    <?= Html::img(Yii::$app->request->baseUrl . '/' .$model->user->Img_Perfil, ['alt' => 'Imagen de Perfil', 'class' => "img-circle", 'height' => '25']) ?> 
    <?= Html::a($model->user->Nombre_Completo, ['//user/view', 'id' => $model->user->id]) ?> <br>
    <small> <?= Html::a(Html::encode($model->fecha), ['//comentarios/view', 'id'=>$model->idComent]) ?> </small>
    <?= Html::tag('pre', Html::encode($model->coment), ['class' => 'bg-primary']) ?>
</div>
<br>