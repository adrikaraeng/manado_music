<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */

$this->title = Yii::t('app', 'Edit {modelClass}: ', [
    'modelClass' => 'Produk',
]) . $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produk'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="produk-update">
  <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <?= Yii::$app->session->getFlash('success') ?>
    </div>
  <?php endif; ?>

  <?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <?= Yii::$app->session->getFlash('error') ?>
    </div>
  <?php endif; ?>
  <?= $this->render('_form', [
    'model' => $model,
    'bmodel' => $bmodel,
    'validateUrl' => $validateUrl
  ]) ?>
</div>
