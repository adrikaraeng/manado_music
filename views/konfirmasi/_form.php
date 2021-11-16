<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Konfirmasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="konfirmasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ip')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'no_transaksi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nama_pelanggan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'no_telepon')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'no_rek_pelanggan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rek_a_n')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'bank')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'struk_bukti')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tanggal_pesan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tanggal_expired')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'wilayah')->textInput() ?>

    <?= $form->field($model, 'alamat_lengkap')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
