<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\db\Query;
$connection = \Yii::$app->db;
$query = $connection->createCommand("SELECT * FROM produk_gambar WHERE produk='$model->id' ORDER BY id")->queryOne();

/* @var $this yii\web\View */
/* @var $model app\models\Produk */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produk'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


// $this->registerJs("
//     $('img').click(function(e){
        
//     });
// ");
?>

<div class="produk-view">
    <div class="frame-view-produk">
        <div class="view-gambar-produk-all">
        <?php if($query["gambar"] != NULL): ?>
            <img src='<?php echo Yii::$app->request->baseUrl; ?>/gambar/produk/<?php echo $query["gambar"];?>' class='ft-view-produk' id='full-size'>
        <?php else:?>
            <span class='fa fa-image ft-view-produk' id="full-size" style="font-size:13em;color:#ccc;"></span>
        <?php endif;?>
        <?php foreach($gambar as $g => $gbr):?>
            <img src='<?php echo Yii::$app->request->baseUrl; ?>/gambar/produk/<?php echo $gbr->gambar;?>' class='ft-site-view-produks' id="<?=$gbr->id?>" onclick="
                $('#full-size').attr('src',$(this).attr('src').replace());
            ">
        <?php endforeach;?>
        </div>
        <span class='keranjang-view'>                    
        <?= Html::button(Yii::t('app', "<span class='fa fa-shopping-cart' style='color:#f9f79b;font-size:1.3em;'></span> Tambah ke keranjang"), [
            'value' => Url::to(['tambah-keranjang','id'=>$model->id]),
            'onclick' => "
                if(confirm('Tambahkan di keranjang belanja ?')){
                    $.ajax({
                        url: '".Url::to(['tambah-keranjang','id'=>$model->id])."',
                        type: 'POST',
                        async:'false',
                        success: function() {
                            $.pjax.reload({container:'#keranjang-pesan', async:false});
                            $.pjax.reload({container:'#count-keranjang', async:false});
                        }
                    });
                }
            ",
            'class' => 'btn btn-success keranjang-view', 'id' => 'update-active'
        ])?>
        </span>
    </div>

    <div class="detail-view-produk">
        <table class="tbl-mi-ne">
            <tr class="tr-judul">
                <td colspan="2" style="font-weight:bold;text-align:center;text-transform: uppercase;">
                    <?=$model->nama?>
                </td>
            </tr>
            <tr class="tr-ganjil">
                <td style="width:10%;font-weight:bold;text-transform: uppercase;">Kategori</td>
                <td style="width:80%;"><?=$model->jenis0->jenis?></td>
            </tr>
            <tr class="tr-genap">
                <td style="font-weight:bold;text-transform: uppercase;">Berat</td>
                <td><?=$model->berat." ".$model->satuan0->satuan?></td>
            </tr>
            <tr class="tr-ganjil">
                <td style="font-weight:bold;text-transform: uppercase;">Harga</td>
                <td><?="Rp ".number_format($model->harga_jual,0,',','.')?></td>
            </tr>
            <tr class="tr-genap">
                <td style="font-weight:bold;text-transform: uppercase;">Diskon</td>
                <?php
                    if($model->diskon_jumlah_beli != null || $model->free_diskon != null || $model->diskon_jumlah_beli != '' || $model->free_diskon != ''):
                ?>
                    <td><?="Beli ".$model->diskon_jumlah_beli." Gratis ".$model->free_diskon?></td>
                <?php else:?>
                    <td><?="<i>Tidak ada diskon</i>"?></td>
                <?php endif;?>
            </tr>
            <tr class="tr-ganjil">
                <td colspan="2">
                    <p style="text-transform: uppercase;font-weight: bold;">Deskripsi</p>
                    <p>
                        <?=nl2br($model->deskripsi)?>
                    </p>
                </td>
            </tr>
        </table>
    </div>
    <div style="clear:left;"></div>
</div>
