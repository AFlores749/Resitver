<?php

use yii\bootstrap\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Posts */
?>

<div class="bg-success">
    <?= Html::img(Yii::$app->request->baseUrl . '/' .$model->user->Img_Perfil, ['alt' => 'Imagen de Perfil', 'class' => "img-circle", 'height' => '25']) ?> 
    <?= Html::a($model->user->Nombre_Completo, ['//user/view', 'id' => $model->user->id]) ?> <br>
    <?= Html::tag('small', Html::encode($model->fecha), ['class' => 'fecha']) ?>
    <?= Html::tag('pre', Html::encode($model->Post), ['class' => 'bg-primary']) ?><br>
    <?= Html::a('Ver detalles', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
</div>
<br>
<br>
<br>
<br>