<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Konfirmasi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Konfirmasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konfirmasi-view">

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
            'no_transaksi:ntext',
            'nama_pelanggan:ntext',
            'no_telepon:ntext',
            'no_rek_pelanggan:ntext',
            'rek_a_n:ntext',
            'bank:ntext',
            'struk_bukti:ntext',
            'tanggal_pesan:ntext',
            'tanggal_expired:ntext',
            'status:ntext',
            'wilayah',
            'alamat_lengkap:ntext',
        ],
    ]) ?>

</div>
