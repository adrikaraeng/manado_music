<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wilayah */

$this->title = Yii::t('app', 'Edit {modelClass}: ', [
    'modelClass' => 'Wilayah',
]) . $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wilayah'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="wilayah-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
