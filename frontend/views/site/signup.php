<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use common\models\Carreras;
use kartik\widgets\FileInput;
use kartik\widgets\Growl;

if (Yii::$app->session->hasFlash('Listo')) {
    echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => '¡Listo!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'Revisa tu correo electronico y sigue las instrucciones para activar tu cuenta',
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

$this->title = 'Registrate';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor rellene los campos siguientes para registrarte</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(/*['id' => 'form-signup'], */['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Nombre de Usuario') ?>

                <?= $form->field($model, 'email')->label('Correo Electronico') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>
            
                <?= $form->field($model, 'num_control')->TextInput()->label('Numero de Control') ?>
            
                <?= $form->field($model, 'nombre_completo')->TextInput()->label('Nombre completo') ?>
                
                <?= $form->field($model, 'carrera')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Carreras::find()->all(), 'id', 'Nombre'),
                    'options' => ['placeholder' => 'Selecciona una carrera ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>

                <?= $form->field($model, 'semestre')->widget(Select2::classname(), [
                    'data' => [1 => "1°", 2 => "2°", 3 => "3°", 4 => "4°", 5 => "5°", 6 => "6°", 7 => "7°", 8 => "8°", 9 => "9°", 10 => "10°", 11 => "11°", 12 => "12°"],
                    'options' => ['placeholder' => 'Selecciona un semestre ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>

                

                <?= $form->field($model, 'file')->widget(FileInput::classname(), [
                     'options' => ['accept' => 'image/*'],
                    'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false, 'browseLabel' =>  'Buscar img...', 'removeLabel' => 'Eliminar',]
                ])->label("Foto de Perfil"); ?>

                <div class="form-group">
                    <?= Html::submitButton('Registrarse', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
