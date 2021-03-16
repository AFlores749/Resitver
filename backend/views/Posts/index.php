<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use backend\models\Posts;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$model = new Posts;

$this->title = 'Inicio';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Nueva Publicacion', ['value'=>Url::to('create'), 'class' => 'btn btn-success', 'id'=>'modalButton']) ?>
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

	<br>
	<br>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => 'viewall',
    'summary'=>'', 
]);
?>
</div>
