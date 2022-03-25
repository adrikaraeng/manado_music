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
use app\models\SubKategori;
use app\models\Profil;
use app\models\Kontak;
use yii\widgets\Pjax;

$connection = \Yii::$app->db;
$now = date('Y-m-d H:i:s');

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
  <style>
    #kontak-url{
      text-decoration: none;
    }
  </style>
<?php $this->beginBody() ?>
<div class="wrapper">

    <?= $this->render("//layouts/main-site")?>
    <?php
    // var_dump($role);
      $item2 = Yii::$app->controller->action->id;
      $item = Yii::$app->request->url;
      $get_url_id = preg_replace('/[^0-9]/', '', $item); 
      $side = $item2."?id=".$get_url_id;
    ?>
    <div class="fixed-sidebar">
        <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu">

            <li style="white-space: normal">
                <?=Html::a('<i class="fa fa-home text-white" style="font-size:1.2em;"></i> <span>'.Yii::t('app',"Home").'</span>', 
                        Url::toRoute(['index'])
                    );?>
            </li>

            <li class="header">
                <span class="sidebar-header" style="color:#fff;font-weight:bold;"><?=Yii::t('app','KATEGORI')?></span>
            </li>
            <?php foreach($kategori as $m => $mj):?>
                <?php
                  $sub_kategori = SubKategori::find()->where("jenis='$mj->id' AND aktivasi='Aktif'")->all();
                  
                  $cekSub = $connection->createCommand("SELECT * FROM sub_kategori WHERE id='$get_url_id'")->queryOne();

                  // $cekJenis = $connection->createCommand("SELECT * FROM jenis WHERE id='$cekSub[jenis]'")->queryOne();

                  if(!empty($get_url_id) && !empty($cekSub)):
                    $cekJenis = $connection->createCommand("SELECT * FROM jenis WHERE id='$cekSub[jenis]'")->queryOne();
                    if(!empty($cekJenis)):
                      if($mj->id == $cekJenis['id'] && !empty(strpos($item, "side-kategori?id="))):
                        $act = "active";
                      else:
                        $act = "";
                      endif;
                    else:
                      $act = "";
                    endif;
                  else:
                    $act = "";
                  endif;
                ?>
                <li class="<?=$act?> treeview" style="white-space: normal">
                    <?=Html::a('<i class="fa fa-hand-o-right text-aqua" style="font-size:1.2em;"></i> <span>'.Yii::t('app',$mj->jenis).'</span>', 
                        Url::toRoute(['side-kategori','id'=>$mj->id])
                    );?>
                    <?php if(!empty($sub_kategori)): ?>
                      <ul class="treeview-menu">
                      <?php foreach($sub_kategori as $sb => $skat):?>
                        <?php
                          $side_2 = "side-kategori?id=".$skat->id;
                          if($side_2 == $side):
                            $act2 = "active";
                          else:
                            $act2 = "";
                          endif;
                        ?>
                        <li class="<?=$act2?>"><a href="<?= Url::toRoute(['side-kategori','id'=>$skat->id])?>"><i class="fa fa-circle-o"></i><?=Yii::t('app',$skat->title)?></a></li>
                      <?php endforeach;?>
                      </ul>
                    <?php endif;?>
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
    </div>
    <div id="footer">
        <footer class="main-footer">
                <div class="row">
                    <div class="col-lg-8">
                        <p style="font-weight:bold;text-transform:uppercase;">Profil kami</p>
                        <?php foreach($profil as $p => $pr):?>
                            <p><?=$pr->tentang?></p>
                        <?php endforeach;?>
                    </div>
                    <div class="col-lg-4">
                        <p style="font-weight:bold;text-transform:uppercase;">Kontak kami</p>
                        <table style="width:100%;">
                            <?php foreach($kontak as $k => $kk):?>
                            <tr>
                                <?php if($kk->jenis_kontak == "<span class='fa fa-facebook'> Facebook</span>" || $kk->jenis_kontak == "<span class='fa fa-instagram'> Instagram</span>" || $kk->jenis_kontak == "<span class='fa fa-twitter'> Twitter</span>"):?>
                                  <td>
                                    <a id="kontak-url" href="<?=$kk->kontak?>" target="_blank"><?=$kk->jenis_kontak?></a>
                                  </td>
                                <?php else:?>
                                  <td><?=$kk->jenis_kontak?></td>
                                  <td><?=$kk->kontak?></td>
                                <?php endif;?>
                            </tr>
                            <?php endforeach;?>
                        </table>
                        <strong><p style="color:#00930b;text-align:left;"><b>MANADO MUSIC</b> &copy; 2021</p></strong>
                    </div>
                </div>                
        </footer>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>