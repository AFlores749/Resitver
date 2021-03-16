<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use kartik\widgets\Growl;

$this->title = 'Contacto';
$this->params['breadcrumbs'][] = $this->title;

if (Yii::$app->session->hasFlash('Listo')) {
    echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => '¡Listo!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'Gracias por contactar con nosotros',
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
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Si tienes preguntas por favor rellena el siguiente formulario para contactarnos. Gracias.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label("Nombre") ?>

                <?= $form->field($model, 'email')->label("Correo") ?>

                <?= $form->field($model, 'subject')->label("Asunto") ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6])->label("Detalles") ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ])->label("Codigo de Verificacion") ?>

                <div class="form-group">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
