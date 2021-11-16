<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Transaksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ip')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nama_produk')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jenis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'satuan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'harga_pokok')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'harga_jual')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'gambar')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'status')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'no_transaksi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nama_pelanggan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'no_telepon')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tanggal_expired')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'diskon_jumlah_beli')->textInput() ?>

    <?= $form->field($model, 'free_diskon')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
