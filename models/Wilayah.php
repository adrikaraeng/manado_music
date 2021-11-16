<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wilayah".
 *
 * @property integer $id
 * @property string $nama
 * @property string $harga
 * @property string $keterangan
 * @property string $aktivasi
 *
 * @property Konfirmasi[] $konfirmasis
 */
class Wilayah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wilayah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'harga', 'aktivasi'], 'required','message'=>''],
            [['nama', 'harga', 'keterangan', 'aktivasi'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Nama'),
            'harga' => Yii::t('app', 'Harga'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'aktivasi' => Yii::t('app', 'Aktivasi'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKonfirmasis()
    {
        return $this->hasMany(Konfirmasi::className(), ['wilayah' => 'id']);
    }
}
