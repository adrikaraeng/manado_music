<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TransaksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Transaksis');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Transaksi'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ip:ntext',
            'nama_produk:ntext',
            'jenis:ntext',
            'satuan:ntext',
            // 'harga_pokok:ntext',
            // 'harga_jual:ntext',
            // 'deskripsi:ntext',
            // 'gambar:ntext',
            // 'jumlah',
            // 'status:ntext',
            // 'no_transaksi:ntext',
            // 'nama_pelanggan:ntext',
            // 'no_telepon:ntext',
            // 'tanggal_expired:ntext',
            // 'diskon_jumlah_beli',
            // 'free_diskon',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
