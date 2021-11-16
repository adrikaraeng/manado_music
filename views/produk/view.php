<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\Button;
use yii\bootstrap\ButtonGroup;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produk'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-view">
    <p>
        <?=
            ButtonGroup::widget([
                'encodeLabels'=>false,
                'buttons' => [
                    
                    [
                        'label' => "Back",
                        'tagName' => 'a',
                        'options' => [
                            'href'=> Url::to(['index']),
                            'class' => 'btn btn-success',
                        ],
                    ],
                    
                    [
                        'label' => "Tambah Produk",
                        'tagName' => 'a',
                        'options' => [
                            'href'=> Url::to(['create']),
                            'class' => 'btn btn-success',
                        ],
                    ],
                    [
                        'label' => 'Edit ('.$model->nama.')',
                        'tagName' => 'a',
                        'options' => [
                            'href' => url::to(['update','id'=>$model->id]),
                            'class' => 'btn btn-primary',
                        ],
                    ],                    
                ]
            ]);
        ?>
    </p>
    <?php foreach($gambar as $g => $gbr):?>
        <img src='<?php echo Yii::$app->request->baseUrl; ?>/gambar/produk/<?php echo $gbr->gambar;?>' class='ft-form-produk'">
    <?php endforeach;?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama',
            [
                'attribute' => 'jenis',
                'format' => 'raw',
                'value' => $model->jenis0->jenis,
            ],
            [
                'attribute' => 'satuan',
                'format' => 'raw',
                'value' => $model->satuan0->satuan,  
            ],
            [
                'attribute' => 'harga_pokok',
                'format' => 'raw',
                'value' => "Rp ".number_format($model->harga_pokok,0,',','.'),
            ],
            [
                'attribute' => 'harga_jual',
                'format' => 'raw',
                'value' => "Rp ".number_format($model->harga_jual,0,',','.'),
            ],
            'barcode:ntext',
            [
                'attribute' => 'deskripsi',
                'format' => 'raw'
            ],
            'aktivasi:ntext',
            'diskon_jumlah_beli',
            'free_diskon',
            'tanggal_input'
        ],
    ]) ?>

</div>
