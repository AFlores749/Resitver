<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Growl;

$this->title = 'Reestablecer contraseña';
$this->params['breadcrumbs'][] = $this->title;

if (Yii::$app->session->hasFlash('Listo')) {
    echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => '¡Listo!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'Tu contraseña ha sido reestablecida',
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
<div class="site-reset-password">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor, elija su nueva contraseña:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
