<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-form">

    <?php $form = ActiveForm::begin(['id' => 'form-bank', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'no_rek')->textInput(['placeholder' => "Nomor Rekening(*)",'maxlength'=>20])->label(false) ?>

    <?= $form->field($model, 'rek_a_n')->textInput(['placeholder' => "Rekening Atas Nama(*)",'maxlength'=>100])->label(false) ?>

    <?= $form->field($model, 'bank')->textInput(['placeholder' => "Nama Bank(*)",'maxlength'=>30])->label(false) ?>

    <?= $form->field($model, 'aktivasi')->dropDownList([ 
        'Aktif' => 'Aktif',
        'Tidak Aktif' => 'Tidak Aktif',
    ], ['prompt' => 'Aktivasi(*)'])->label(false) ?>

    <div class="form-group" style="text-align:center;">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Simpan') : Yii::t('app', 'Simpan'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
    $this->registerJs("
        $('form#form-bank').on('beforeSubmit',function (e) {
            var \$form = $(this);
            $.post(
                \$form.attr('action'),
                \$form.serialize()
            ).done(function(result){
                $(\$form).trigger('reset');
                $.pjax.reload({container:'#bankGrid'});
            }).fail(function(){
                console.log('Server Error');
            });
            return false;
        });
    ");
?> 