<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '¡Bienvenido nuevo usuario!';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <center>
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <jumbotron>Te has registrado correctamente, ahora ve a: <a href="http://residentes.resitver.com.mx/">http://residentes.resitver.com.mx <a/> para poder iniciar sesión en el sitio.</jumbotron>
	</center>
</div>
