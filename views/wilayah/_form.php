<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Wilayah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wilayah-form col-lg-7" style="background-color:#dce3ed;padding:8px;">

    <?php $form = ActiveForm::begin(['id' => 'form-wilayah', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nama')->textInput(['placeholder' => 'Nama Wilayah','maxlength'=>'50']) ?>

    <?= $form->field($model, 'harga')->textInput(['placeholder' => 'Harga Kirim','maxlength' =>'10']) ?>

    <?= $form->field($model, 'keterangan')->widget(CKEditor::className(), [
        'options' => ['rows' => 6,'placeholder'=>'Isi Keterangan'],
        'preset' => 'basic',
        'clientOptions' => [
	        'allowedContent' => true,
	        'autoParagraph' => false
	    ],
        //'inline' => false,
    ])->label() ?>

    <?= $form->field($model, 'aktivasi')->dropDownList([ 
        'Aktif' => 'Aktif',
        'Tidak Aktif' => 'Tidak Aktif',
    ], ['prompt' => 'Aktivasi (*)'])->label(false) ?>

    <div class="form-group" style="text-align:center;">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Submit'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
