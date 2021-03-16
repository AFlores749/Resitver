<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Editar informacion';
$this->params['breadcrumbs'][] = ['label' => 'Mi Perfil', 'url' => ['user/view']];
$this->params['breadcrumbs'][] = 'Editar Informacion'
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
