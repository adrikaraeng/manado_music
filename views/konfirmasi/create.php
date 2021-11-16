<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Konfirmasi */

$this->title = Yii::t('app', 'Create Konfirmasi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Konfirmasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konfirmasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
