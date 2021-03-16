<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use common\models\Carreras;
use kartik\widgets\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(/*['id' => 'form-signup'], */['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Nombre de Usuario') ?>

        <?= $form->field($model, 'email')->label('Correo Electronico') ?>
    
        <?= $form->field($model, 'Num_Control')->TextInput()->label('Numero de Control') ?>
    
        <?= $form->field($model, 'Nombre_Completo')->TextInput()->label('Nombre completo') ?>
        
        <?= $form->field($model, 'Carrera_IdCarrera')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Carreras::find()->all(), 'id', 'Nombre'),
            'options' => ['placeholder' => 'Selecciona una carrera ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

        <?= $form->field($model, 'Semestre')->widget(Select2::classname(), [
            'data' => [1 => "1°", 2 => "2°", 3 => "3°", 4 => "4°", 5 => "5°", 6 => "6°", 7 => "7°", 8 => "8°", 9 => "9°", 10 => "10°", 11 => "11°", 12 => "12°"],
            'options' => ['placeholder' => 'Selecciona un semestre ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
       

        <?= $form->field($model, 'file')->widget(FileInput::classname(), [
             'options' => 
                ['accept' => 'image/*'],
                'pluginOptions' => [
                    'initialPreview' => [Html::img(Yii::$app->request->baseUrl . '/' .$model->Img_Perfil, ['width' => '200']) ], 
                    'overwriteInitial'=>true,
                    'showRemove' => false,
                    'previewFileType' => 'image', 
                    'showUpload' => false,
                    'showDelete' => false,
                    'browseLabel' =>  'Buscar img...', 
                    'initialPreviewConfig' => [
                    ],
                ]
        ])->label("Foto de Perfil"); ?>

        <?= $form->field($model, 'Acerca_De')->TextArea()->label('Acerca De') ?>

        <div class="form-group">
            <?= Html::submitButton('Actualizar', ['class' => 'btn btn-success', 'name' => 'update-button']) ?>
        </div>

<?php ActiveForm::end(); ?>

</div>
