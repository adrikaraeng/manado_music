<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KonfirmasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="konfirmasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ip') ?>

    <?= $form->field($model, 'no_transaksi') ?>

    <?= $form->field($model, 'nama_pelanggan') ?>

    <?= $form->field($model, 'no_telepon') ?>

    <?php // echo $form->field($model, 'no_rek_pelanggan') ?>

    <?php // echo $form->field($model, 'rek_a_n') ?>

    <?php // echo $form->field($model, 'bank') ?>

    <?php // echo $form->field($model, 'struk_bukti') ?>

    <?php // echo $form->field($model, 'tanggal_pesan') ?>

    <?php // echo $form->field($model, 'tanggal_expired') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'wilayah') ?>

    <?php // echo $form->field($model, 'alamat_lengkap') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
