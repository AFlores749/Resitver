<?php

use yii\bootstrap\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Posts */
?>

<div>
    <?= Html::img(Yii::$app->request->baseUrl . '/' .$model->idSiguiendo->Img_Perfil, ['alt' => 'Imagen de Perfil', 'class' => "img-circle", 'height' => '50']) ?>
    <?= Html::a($model->idSiguiendo->Nombre_Completo, ['//user/view', 'id' => $model->idSiguiendo->id]) ?> <br> 
    <?= Html::encode($model->idSiguiendo->Acerca_De) ?> <br>
    <?= Html::a('Dejar de seguir', ['user/unfollow', 'follower' => $model->idSeguidor->id, 'followed' => $model->idSiguiendo->id], ['class' => 'btn btn-danger']); ?>
</div>
<br>
