<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SatuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sub Kategori');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-kategori-index">


<p>
  <?= Html::a(Yii::t('app', 'Tambah Sub Kategori'), ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?php Pjax::begin(['id' => 'pjax-sub-kategori', 'enablePushState' => false]); ?>  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
            if($model->aktivasi == 'Tidak Aktif' || $model->aktivasi == NULL):
                return ['class' => 'danger'];
            elseif($model->aktivasi == 'Aktif'):
                return ['class' => 'success'];
            endif;
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
              'attribute' => 'jenis',
              'format' => 'raw',
              'value' => function($model){
                return $model->jenis0->jenis;
              }
            ],
            'title',
            [
                'attribute' => 'keterangan',
                'format' => 'raw',
            ],
            [
                'attribute' => 'aktivasi',
                'format' => 'raw',
                'filter'=> ['Aktif'=>'Aktif','Tidak Aktif'=>'Tidak Aktif'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'options' => ['style' => "width:90px;"],
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'title' => Yii::t('app', 'View'),
                                // 'class' => 'btn-ajax-modal',
                                // 'id' => 'activity-view-link',
                                // 'data-toggle' => 'modal',
                                // 'data-target' => '#myModal',
                        ]);
                    },
                    'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => Yii::t('app', 'Update'),
                                // 'id' => 'activity-update-link',
                                // 'data-toggle' => 'modal',
                                // 'class' => 'btn-ajax-modal',
                                // 'data-target' => '#myModal',
                        ]);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view'):
                        return Url::toRoute(['view', 'id' => $model->id]);
                    elseif ($action === 'update'):
                        return Url::toRoute(['update', 'id' => $model->id]);
                    // elseif ($action === 'delete'):
                    //     return Url::toRoute(['delete-operator', 'id' => $model->id]);
                    endif;
                }
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
