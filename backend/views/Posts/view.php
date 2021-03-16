<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\Posts */

$this->title = 'Ver detalles';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>

<div class="bg-success">
    <?= Html::img(Yii::$app->request->baseUrl . '/' .$model->user->Img_Perfil, ['alt' => 'Imagen de Perfil', 'class' => "img-circle", 'height' => '25']) ?> 
    <?= Html::a($model->user->Nombre_Completo, ['//user/view', 'id' => $model->user->id]) ?> <br>
    <?= Html::tag('small', Html::encode($model->fecha), ['class' => 'fecha']) ?>
    <?= Html::tag('pre', Html::encode($model->Post), ['class' => 'bg-primary']) ?><br>
</div>

<div class="view-comentarios">
<h1>Comentarios (<?= $model->getComentarios()->count() ?>)</h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '//Comentarios/viewall',
        'summary'=>'', 
        ]);
    ?>

<br>
<br>
<?= Html::button('Nuevo comentario', ['value'=>Url::to(['comentarios/create', 'idpost' => $model->id]), 'class' => 'btn btn-primary', 'id'=>'modalButton']); ?>

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