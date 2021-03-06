<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\Button;
use yii\bootstrap\ButtonGroup;

/* @var $this yii\web\View */
/* @var $model app\models\Jenis */

$this->title = $model->jenis;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sub Kategori'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-view">
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
                        'label' => "Tambah Sub Kategori",
                        'tagName' => 'a',
                        'options' => [
                            'href'=> Url::to(['create']),
                            'class' => 'btn btn-success',
                        ],
                    ],
                    [
                        'label' => 'Edit ('.$model->title.')',
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
            [
            	'attribute' => 'jenis',
            	'format' => 'raw',
                'value' => function($model){
                    return $model->jenis0->jenis;
                }
            ],
            'title:ntext',
            [
            	'attribute' => 'keterangan',
            	'format' => 'raw'
            ],
            'aktivasi:ntext',
        ],
    ]) ?>

</div>
