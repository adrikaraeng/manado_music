<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transaksi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transaksis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ip:ntext',
            'nama_produk:ntext',
            'jenis:ntext',
            'satuan:ntext',
            'harga_pokok:ntext',
            'harga_jual:ntext',
            'deskripsi:ntext',
            'gambar:ntext',
            'jumlah',
            'status:ntext',
            'no_transaksi:ntext',
            'nama_pelanggan:ntext',
            'no_telepon:ntext',
            'tanggal_expired:ntext',
            'diskon_jumlah_beli',
            'free_diskon',
        ],
    ]) ?>

</div>
