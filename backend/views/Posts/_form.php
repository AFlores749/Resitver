<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Posts */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
    $form = ActiveForm::begin([
        'id' => 'posts-form', 
        'type' => ActiveForm::TYPE_VERTICAL,
        'formConfig' => ['showErrors' => true, 'showLabels' => false]
    ]); 
?>
    <?= $form->field($model, 'Post')->textArea(['maxlength' => true, 'rows'=>'10']) ?>
	<?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>	
