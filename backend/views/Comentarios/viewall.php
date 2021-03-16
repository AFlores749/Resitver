<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model backend\models\Posts */

?>
<br>

<div class="bg-success">
    <?= Html::img(Yii::$app->request->baseUrl . '/' .$model->user->Img_Perfil, ['alt' => 'Imagen de Perfil', 'class' => "img-circle", 'height' => '25']) ?> 
    <?= Html::a($model->user->Nombre_Completo, ['//user/view', 'id' => $model->user->id]) ?> <br>
    <small> <?= Html::a(Html::encode($model->fecha), ['//comentarios/view', 'id'=>$model->idComent]) ?> </small>
    <?= Html::tag('pre', Html::encode($model->coment), ['class' => 'bg-primary']) ?>
</div>
<br>