<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Banks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'no_rek:ntext',
            'rek_a_n:ntext',
            'bank:ntext',
            'aktivasi:ntext',
        ],
    ]) ?>

</div>
