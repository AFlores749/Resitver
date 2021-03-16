<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Posts */
?>
<div class="posts-view">

<p>
        <?php
            if($model->user_id == Yii::$app->user->identity->id){
                echo Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-success']);
                echo ' ';
                echo Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de que quieres eliminar este post?',
                'method' => 'post',
            ],
        ]);
            echo ' ';
            echo Html::a('Ver detalles', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']);    
            }
        ?>
    </p>

<div class="bg-success">
    <?= Html::img(Yii::$app->request->baseUrl . '/' .$model->user->Img_Perfil, ['alt' => 'Imagen de Perfil', 'class' => "img-circle", 'height' => '25']) ?> 
    <?= Html::a($model->user->Nombre_Completo, ['//user/view', 'id' => $model->user->id]) ?> <br>
    <?= Html::tag('small', Html::encode($model->fecha), ['class' => 'fecha']) ?>
    <?= Html::tag('pre', Html::encode($model->Post), ['class' => 'bg-primary']) ?><br>
</div>
<br>
<br>
<br>
<br>

</div>