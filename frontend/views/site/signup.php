<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use common\models\Carreras;

$this->title = 'Registrarse';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor rellene los campos siguientes para registrarse</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

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

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
