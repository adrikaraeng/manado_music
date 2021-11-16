<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Wilayah */

$this->title = Yii::t('app', 'Tambah Wilayah');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wilayah'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wilayah-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
