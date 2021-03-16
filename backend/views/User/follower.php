<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
use backend\models\Followers;

/* @var $this yii\web\View */
/* @var $model backend\models\Posts */
?>

<div>
    <?= Html::img(Yii::$app->request->baseUrl . '/' .$model->idSeguidor->Img_Perfil, ['alt' => 'Imagen de Perfil', 'class' => "img-circle", 'height' => '50']) ?>
    <?= Html::a($model->idSeguidor->Nombre_Completo, ['//user/view', 'id' => $model->idSeguidor->id]) ?> <br> 
    <?= Html::encode($model->idSeguidor->Acerca_De) ?> <br>

<?php    
	$follow = Followers::findOne(['id_seguidor' => $model->idSiguiendo->id, 'id_siguiendo' => $model->idSeguidor->id]);
    if($follow == null){
	    echo Html::a('Seguir', ['user/follow', 'follower' => $model->idSiguiendo->id, 'followed' => $model->idSeguidor->id], ['class' => 'btn btn-success']);
	} else {
	    echo Html::a('Dejar de seguir', ['user/unfollow', 'follower' => $model->idSiguiendo->id, 'followed' => $model->idSeguidor->id], ['class' => 'btn btn-danger']);
	}
?>

</div>
<br>
