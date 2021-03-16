<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Comentarios */

$this->title = 'Nuevo Comentario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
