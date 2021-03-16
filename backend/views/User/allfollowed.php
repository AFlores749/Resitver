<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seguidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="followed-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <br>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
    	'itemView' => 'followed',
    	'summary'=>'', 
    ]) ?>
</div>
