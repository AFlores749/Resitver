<?php

use yii\helpers\Html;
use backend\models\User;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Usuarios registrados';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-search">

    <h1><?= Html::encode($this->title) ?></h1>

	<br>
	<br>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
    	[
    		'attribute' => 'Imagen Perfil',
        	'format' => 'raw',    
        	'value' => function ($model) {
            return ($model->Img_Perfil) ? Html::img("/".$model->Img_Perfil) : false;        	},
    	],
    	[
    		'class' => 'yii\grid\ActionColumn',
    		
    	],
    	'username',
    	'email'

    ]
]);
?>
</div>
