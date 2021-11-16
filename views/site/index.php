<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\ProdukGambar;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;


/* @var $this yii\web\View */

$this->title = 'Nanofood';

$this->registerJs("
    $('#sukses').delay(3000).fadeOut('slow');
");

$ip = Yii::$app->getRequest()->getUserIP();

$count_keranjang = (new yii\db\Query())
            ->from('transaksi')
            ->where("ip = '$ip'")
            ->count();
?>

<?php if( Yii::$app->session->hasFlash('success') ):?>
    <div class="alert alert-success" id="sukses" style="bottom:0;position:fixed;">
        <?= Yii::$app->session->getFlash('success')?>
    </div>
<?php elseif( Yii::$app->session->hasFlash('danger') ):?>
    <div class="alert alert-danger" id="sukses" style="bottom:0;position:fixed;">
        <?= Yii::$app->session->getFlash('danger')?>
    </div>
<?php endif;?>
<div class="site-index">
    <div class='pag-index-site'>
        <?=LinkPager::widget([
            'pagination' => $pagination,
            'maxButtonCount'=>false,
            //'lastPageLabel' => 'Last',
            'nextPageLabel' => 'Next',
            'prevPageLabel' => 'Prev',
        ])?>
    </div>

    <div class="jenis-search">

        <?php $form = ActiveForm::begin(['id'=>'form-search-site']); ?>

        <?= $form->field($model2, 'search')->textInput([
                'placeholder'=>'Cari...',
                'class'=>'search-index form-control',
                'style' => "float:left;"
            ], 
            [
                'onclick'=>"
                        $.ajax({
                            url: '".Url::to(['index'])."',
                            type: 'POST',
                            success: function() {
                                $.pjax.reload({container:'#pjax-site-produk', async:false});
                            }
                        });",
                    'class'=>'form-control'
            ]
            )->label(false) ?>
            <?= Html::submitButton(Yii::t('app', '<span class="fa fa-search" style="font-size:15px;padding:4px;padding-bottom:8px;padding-top:5px;"></span>')) ?>

        <?php ActiveForm::end(); ?>

    </div>

    <?php Pjax::begin(['id'=>'pjax-site-produk','enablePushState'=>false]); ?>    
    <ul class='ul-produk'>
    <?php foreach($model as $m => $md):?>
        <li>
                <a href="<?=Url::to(['view-produk','id'=>$md->id])?>">
                <?php $model2 = ProdukGambar::find()->where("produk='$md->id'")->orderby("rand()")->one();?>
                <?php if($model2 != null):?>
                    <img src='<?php echo Yii::$app->request->baseUrl; ?>/gambar/produk/<?= $model2->gambar;?>' class='ft-site-produk'>
                <?php else:?>
                    <span class='fa fa-image ft-site-produk size-produk'></span>
                <?php endif;?>
                </a>
                <div class="view-desc-produk">
                    <a href="<?=Url::to(['view-produk','id'=>$md->id])?>">
                    <p><span class='head-produk'><?=Html::encode("{$md->nama}")?></span></p>
                    <p class="harga-produk">Rp <span style="text-align:right;"><?=number_format($md->harga_jual,0,',','.').",00"?></span></p>
                    <?php if($md->diskon_jumlah_beli != NULL || $md->diskon_jumlah_beli != ''):?>
                        <p class="harga-diskon">Beli <?=$md->diskon_jumlah_beli?> Gratis <?=$md->free_diskon?></p>
                    <?php endif;?>
                    </a>
                    <?= Html::button(Yii::t('app', "<span class='fa fa-shopping-cart' style='color:#f9f79b;font-size:1.3em;'></span> <span style='font-size:0.8em;'>Tambahkan</span>"), [
                        'value' => Url::to(['tambah-keranjang','id'=>$md->id]),
                        'onclick' => "
                            if(confirm('Tambahkan di keranjang belanja ?')){
                                $.ajax({
                                    url: '".Url::to(['tambah-keranjang','id'=>$md->id])."',
                                    type: 'POST',
                                    async:'false',
                                    success: function() {
                                        $.pjax.reload({container:'#keranjang-pesan', async:false});
                                        $.pjax.reload({container:'#count-keranjang', async:false});
                                    }
                                });
                            }
                        ",
                        'class' => 'btn btn-success btn-beli-index'
                    ])?>
                </div>
        </li>
    <?php endforeach;?>
    </ul>
    <?php Pjax::end(); ?>

    <div style="clear:left;"></div>
</div>
