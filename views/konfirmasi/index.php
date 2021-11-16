<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KonfirmasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Konfirmasis');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konfirmasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Konfirmasi'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ip:ntext',
            'no_transaksi:ntext',
            'nama_pelanggan:ntext',
            'no_telepon:ntext',
            // 'no_rek_pelanggan:ntext',
            // 'rek_a_n:ntext',
            // 'bank:ntext',
            // 'struk_bukti:ntext',
            // 'tanggal_pesan:ntext',
            // 'tanggal_expired:ntext',
            // 'status:ntext',
            // 'wilayah',
            // 'alamat_lengkap:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
