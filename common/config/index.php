<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\Growl;

$this->title = 'Inicio';

if (Yii::$app->session->hasFlash('Listo')) {
    echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => '¡Listo!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'Su cuenta ha sido confirmada, ya puede iniciar sesion',
    'showSeparator' => true,
    'delay' => 0,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);
}

if (Yii::$app->session->hasFlash('Error')) {
    echo Growl::widget([
    'type' => Growl::TYPE_DANGER,
    'title' => '¡Error!',
    'icon' => 'glyphicon glyphicon-remove-sign',
    'body' => 'Hubo un error, intentalo nuevamente',
    'showSeparator' => true,
    'delay' => 0,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);
}   

if (Yii::$app->session->hasFlash('ListoPass')) {
    echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => '¡Listo!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'Se envio un correo con instrucciones para reestablecer su contraseña',
    'showSeparator' => true,
    'delay' => 0,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);
}

if (Yii::$app->session->hasFlash('ListoReset')) {
    echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => '¡Listo!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'Su contraseña ha sido reestablecida correctamente',
    'showSeparator' => true,
    'delay' => 0,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);
}

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Acceso al publico</h1>

        <p class="lead">Bienvenido a Resitver, la pagina que brinda servicio a los residentes del Instituto Tecnologico de Veracruz.</p>
        <?php echo Html::img(Yii::$app->request->baseUrl . "/media/LogoItv.jpg") ?>


        <!--<p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <!--<div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>-->    
</div>
