<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\Button;
use yii\bootstrap\ButtonGroup;

/* @var $this yii\web\View */
/* @var $model app\models\Wilayah */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wilayah'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wilayah-view col-lg-10">

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
                        'label' => "Tambah Satuan",
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
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nama:ntext',
            [
                'attribute' => 'harga',
                'format' => 'raw',
                'value' => "Rp ".number_format($model->harga,0,',','.'),
            ],
            [
                'attribute' => 'keterangan',
                'format' => 'raw'
            ],
            'aktivasi:ntext',
        ],
    ]) ?>

</div>
