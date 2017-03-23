<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->Nombre_Completo;
$this->params['breadcrumbs'][] = 'Mi perfil';
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1> 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [        
            [
                'attribute'=>'Img_Perfil',
                'value'=>(Url::to('http://residentes.resitver.com.mx/').$model->Img_Perfil),
                'format' => ['image'/*,['width'=>'500','height'=>'500']*/],
            ],
            'Num_Control',
            'Nombre_Completo',
            'username',
            'email:email',
            'carreraIdCarrera.Nombre',
            'Semestre',
        ],
    ]) ?>

    <p>
        <?= Html::a('Editar informacion', ['update', 'id' => Yii::$app->user->id], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
