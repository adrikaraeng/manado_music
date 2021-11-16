<?php

/* @var $this \yii\web\View */
/* @var $content string */
date_default_timezone_set('Asia/Jakarta');

use yii\helpers\Html;
use kartik\nav\NavX;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\models\Jenis;
use app\models\Profil;
use app\models\Kontak;
use yii\widgets\Pjax;

$connection = \Yii::$app->db;
$now = date('Y-m-d H:i:s');
$delTransaksi = $connection->createCommand("DELETE FROM transaksi WHERE status='Booking1' AND tanggal_expired < '$now' OR status='Booking2' AND tanggal_expired < '$now'")->execute();
$delKonfirmasi = $connection->createCommand("DELETE FROM konfirmasi WHERE status='Booking1' AND tanggal_expired < '$now' OR status='Booking2' AND tanggal_expired < '$now'")->execute();

AppAsset::register($this);

//$kategori = $connection->createCommand('SELECT * FROM jenis ORDER BY jenis ASC');
$kategori = Jenis::find()->orderby("jenis")->all();
$profil = Profil::find()->orderby("id ASC")->all();
$kontak = Kontak::find()->where("aktivasi='Aktif'")->orderby("jenis_kontak ASC")->all();

$itemsKategori = [];
foreach ($kategori as $mj => $m):
    $itemsKategori[] = [
        'label' => "<span style='padding-bottom:15px;'> ".Yii::t('app',$m->jenis)."</span>", 
        'url' => ['#'], 
    ];
endforeach;
$ip = Yii::$app->getRequest()->getUserIP();
$count_keranjang = (new yii\db\Query())
            ->from('transaksi')
            ->where("ip = '$ip' AND status='Booking1'")
            ->count();
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
   <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/gambar/rj-icon.gif" type='image/x-icon' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="skin-green sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

    <?= $this->render("//layouts/main-site")?>

    <div class="fixed-sidebar">
        <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu">

            <li style="white-space: normal">
                <?=Html::a('<i class="fa fa-shopping-cart text-white" style="font-size:1.2em;"></i> <span>'.Yii::t('app',"Daftar Belanja").'</span>', 
                        Url::toRoute(['lihat-keranjang'])
                    );?>
                <?php Pjax::begin(['id'=>'count-keranjang','enablePushState'=>false]); ?>
                    <span class="label label-danger pull-right" style="z-index:99;position:absolute;margin-top:-30px;right:0;"><?=$count_keranjang?></span>
                <?php Pjax::end();?>
            </li>

            <li style="white-space: normal">
                <?=Html::a('<i class="fa fa-home text-white" style="font-size:1.2em;"></i> <span>'.Yii::t('app',"Home").'</span>', 
                        Url::toRoute(['index'])
                    );?>
            </li>

            <li class="header">
                <span class="sidebar-header" style="color:#fff;font-weight:bold;"><?=Yii::t('app','KATEGORI')?></span>
            </li>
            <?php foreach($kategori as $m => $mj):?>
                <li style="white-space: normal">
                    <?=Html::a('<i class="fa fa-hand-o-right text-aqua" style="font-size:1.2em;"></i> <span>'.Yii::t('app',$mj->jenis).'</span>', 
                        Url::toRoute(['side-kategori','id'=>$mj->id])
                    );?>
                </li>
            <?php endforeach;?>
          </ul>
        </section>
        </aside>
    </div>

    <div class="content-wrapper">
        <div class="my-content">
            <?= $content ?>
        </div>
        <?php Pjax::begin(['id'=>'keranjang-pesan','enablePushState'=>false]); ?>
            <?php if($count_keranjang != 0):?>
                <?= Html::a("<span class='fa fa-shopping-cart' style='color:#f9f79b;font-size:1.3em;'></span> <span style='font-size:1.4em;'>".$count_keranjang."</span>", Url::to(['lihat-keranjang']), [
                            'title' => Yii::t('app', 'Periksa Keranjang'),
                            'data-pjax' => 0,
                            'class' => 'btn btn-danger', 'style' => 'right:10px;bottom:10px;position:fixed;z-index:99;float:right;padding:5px;'
                    ]);
                ?>
            <?php endif;?>
        <?php Pjax::end();?>
    </div>
    <div id="footer">
        <footer class="main-footer">
                <div class="row">
                    <div class="col-lg-6">
                        <p style="font-weight:bold;text-transform:uppercase;">Profil kami</p>
                        <?php foreach($profil as $p => $pr):?>
                            <p><?=$pr->tentang?></p>
                        <?php endforeach;?>
                    </div>
                    <div class="col-lg-6">
                        <p style="font-weight:bold;text-transform:uppercase;">Kontak kami</p>
                        <table style="width:100%;">
                            <?php foreach($kontak as $k => $kk):?>
                            <tr>
                                <td><?=$kk->jenis_kontak?></td>
                                <td><?=$kk->kontak?></td>
                            </tr>
                            <?php endforeach;?>
                        </table>
                        <strong><p style="color:#00930b;text-align:left;"><b>Nanofood Indonesia</b> &copy; 2020</p></strong>
                    </div>
                </div>                
        </footer>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>