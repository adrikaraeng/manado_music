<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "satuan".
 *
 * @property integer $id
 * @property string $satuan
 * @property string $keterangan
 *
 * @property Produk[] $produks
 */
class SubKategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis', 'title', 'aktivasi'],'required','message'=>''],
            [['title','keterangan'], 'string'],
            [['aktivasi'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Judul'),
            'jenis' => Yii::t('app', 'Kategori'),
            'aktivasi' => Yii::t('app', 'Aktivasi'),
            'keterangan' => Yii::t('app', 'Keterangan'),
        ];
    }

    public function getJenis0()
    {
        return $this->hasOne(Jenis::className(), ['id' => 'jenis']);
    }
}
