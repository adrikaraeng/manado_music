<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use yii\db\Query;
$connection = \Yii::$app->db;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */
/* @var $form yii\widgets\ActiveForm */
$katSQL = $connection->createCommand("SELECT * FROM jenis WHERE aktivasi='Aktif' ORDER BY jenis ASC");
$satSQL = $connection->createCommand("SELECT * FROM satuan ORDER BY satuan ASC");
?>

<div class="produk-form" style="background-color:#dce3ed;padding:8px;">

    <?php $form = ActiveForm::begin(['id' => 'form-wilayah', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength'=>40,'placeholder'=>'Nama Produk(*)'])->label(false) ?>

    <?= $form->field($model, 'jenis')->dropDownList(ArrayHelper::map($katSQL->queryAll(),'id',
            function($model, $defaultValue){
                return $model['jenis'];
            }
        ), [
        'prompt' => 'Pilih Kategori(*)', 'style'=>'width:50%;float:left;',
    ])->label(false) ?>

    <?= $form->field($model, 'berat')->textInput(['maxlength' => 15,'placeholder'=>'Berat dalam satuan gram','style'=>"width:50%;"])->label(false) ?>


    <?= $form->field($model, 'harga_pokok')->textInput(['maxlength' => 15,'placeholder'=>'Harga Pokok','style'=>"width:50%;float:left;"])->label(false) ?>

    <?= $form->field($model, 'harga_jual')->textInput(['maxlength' => 15,'placeholder'=>'Harga Jual','style'=>"width:50%;"])->label(false) ?>

    <?= $form->field($model, 'barcode')->textInput(['maxlength' => 15,'placeholder'=>'Barcode','style'=>'width:50%;float:left;'])->label(false) ?>

    <?= $form->field($model, 'aktivasi')->dropDownList([ 
        'Aktif' => 'Aktif',
        'Tidak Aktif' => 'Tidak Aktif',
    ], ['prompt' => 'Aktivasi (*)','style'=>'width:50%;'])->label(false) ?>
    <fieldset>
        <legend>Diskon</legend>
        <?= $form->field($model, 'diskon_jumlah_beli')->textInput(['maxlength' => 5,'placeholder'=>'Jumlah','style'=>'float:left;width:50%;clear:left;'])->label(false) ?>

        <?= $form->field($model, 'free_diskon')->textInput(['maxlength' => 5, 'placeholder'=>'Gratis', 'style'=>'width:50%;float:right;margin-top:-5px;'])->label(false) ?>
    </fieldset>
    <?= $form->field($model, 'deskripsi')->widget(CKEditor::className(), [
        'options' => ['rows' => 6,'placeholder'=>'Isi Deskripsi'],
        'preset' => 'basic',
        'clientOptions' => [
            'allowedContent' => true,
            'autoParagraph' => false
        ],
        //'inline' => false,
    ])->label() ?>


<?php Pjax::begin(['id'=>'gambar-photo', 'enablePushState' => false]); ?> 
    <?php 
        if($bmodel != NULL):
            foreach($bmodel as $m => $m2):?>
                <div class='form-produk-foto'>

                <?= Html::button(Yii::t('app', '<span class="fa fa-close" style="font-size:2.0em;"></span>'), [
                    'value' => Url::to(['delete-gambar','id'=>$m2->id]),
                    'onclick' => "
                        if(confirm('Apakah anda yakin untuk menghapus Gambar ?')){
                            $.ajax({
                                url: '".Url::to(['delete-gambar','id' => $m2->id])."',
                                type: 'POST',
                                success: function() {
                                    $.pjax.reload({container:'#gambar-photo'});
                                }
                            });
                        }
                        return false;
                    ",
                    'class' => 'ft-rm-form-produk'
                    //'class' => 'btn btn-danger', 'style' => "padding:1px;clear:left;margin:0 50px 0 0px;position:relative;float:left;"
                ])?>

                <img src='<?php echo Yii::$app->request->baseUrl; ?>/gambar/produk/<?php echo $m2->gambar;?>' class='ft-form-produk'">
                </div>
    <?php       
             endforeach;
        endif;
    ?>
<?php Pjax::end();?>

<div style="clear:left;"></div>

    <?=
        $form->field($model, 'gambar[]')->widget(FileInput::classname(), [
            'options' => ['id' => 'gambar','multiple' => true, 'accept' => 'image/*'],
            'pluginOptions' => [
                'previewFileType' => ['image','text'],
                'showUpload' => false,
                'showRemove' => false,
                'showCaption' => false,
                'allowedFileExtensions' => ['jpg','jpeg','png'],
                'maxFileSize'=>1024,
                'maxFileCount' => 5,
                'buttonLabelClass' => false,
                'previewFileIcon' => '<i class="fa fa-photo"></i>',
                'browseLabel' => 'Masukkan Gambar',
                //'allowedPreviewTypes' => null,
                // 'previewFileIconSettings' => [
                //         'doc' => '<i class="fa fa-file-word-o text-primary"></i>',
                //         'docx' => '<i class="fa fa-file-word-o text-primary"></i>',
                //         'xlsx' => '<i class="fa fa-file-excel-o text-success"></i>',
                //         'xls' => '<i class="fa fa-file-excel-o text-success"></i>',
                //         'pptx' => '<i class="fa fa-file-powerpoint-o text-danger"></i>',
                //         'ppt' => '<i class="fa fa-file-powerpoint-o text-danger"></i>',
                //         'pdf' => '<i class="fa fa-file-pdf-o text-danger"></i>',
                // ]
            ]
        ])->label(false);
    ?>

    <div class="form-group" style="text-align:center;">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Simpan') : Yii::t('app', 'simpan'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
