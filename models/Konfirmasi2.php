<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "konfirmasi".
 *
 * @property integer $id
 * @property string $ip
 * @property string $no_transaksi
 * @property string $nama_pelanggan
 * @property string $no_telepon
 * @property string $no_rek_pelanggan
 * @property string $rek_a_n
 * @property string $bank
 * @property string $struk_bukti
 * @property string $tanggal_pesan
 * @property string $tanggal_expired
 * @property string $status
 * @property integer $wilayah
 * @property string $alamat_lengkap
 *
 * @property Wilayah $wilayah0
 */
class Konfirmasi2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'konfirmasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip', 'no_transaksi', 'nama_pelanggan', 'no_telepon',  'tanggal_pesan', 'tanggal_expired', 'status', 'wilayah', 'alamat_lengkap'], 'required', 'message'=> ''],
            [['no_rek_pelanggan'],'required','message'=>'No. Rekening yang anda gunakan untuk transfer harus diisi'],
            [['rek_a_n'],'required','message' => 'Rekening atas nama harus diisi'],
            [['bank'],'required','message'=>'Nama Bank harus diisi'],
            [['no_resi'],'required','message'=>'Resi pengiriman harus diisi'],
            [['jasa_pengiriman'],'required','message'=>'Nama Jasa pengiriman harus diisi'],
            [['ip', 'no_transaksi', 'nama_pelanggan', 'no_telepon', 'no_rek_pelanggan', 'rek_a_n', 'bank', 'struk_bukti', 'tanggal_pesan', 'tanggal_expired', 'status', 'alamat_lengkap', 'no_resi', 'jasa_pengiriman', 'wilayah', 'estimasi_hari'], 'string'],
            ['alamat_lengkap', 'filter', 'filter' => 'strip_tags'],
            [['ongkir', 'jumlah_harga_item'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ip' => Yii::t('app', 'IP'),
            'no_transaksi' => Yii::t('app', 'No Transaksi'),
            'nama_pelanggan' => Yii::t('app', 'Nama Pelanggan'),
            'no_telepon' => Yii::t('app', 'No Telepon'),
            'no_rek_pelanggan' => Yii::t('app', 'No Rek Pelanggan'),
            'rek_a_n' => Yii::t('app', 'Rek A N'),
            'bank' => Yii::t('app', 'Bank'),
            'struk_bukti' => Yii::t('app', 'Struk Bukti'),
            'tanggal_pesan' => Yii::t('app', 'Tanggal Pesan'),
            'tanggal_expired' => Yii::t('app', 'Tanggal Expired'),
            'status' => Yii::t('app', 'Status'),
            'wilayah' => Yii::t('app', 'Wilayah'),
            'alamat_lengkap' => Yii::t('app', 'Alamat Lengkap'),
            'no_resi' => Yii::t('app', 'No Resi'),
            'jasa_pengiriman' => Yii::t('app', 'Jasa Pengiriman'),
            'ongkir' => Yii::t('app', 'Ongkos Kirim'),
            'estimasi_hari' => Yii::t('app', 'Estimasi Hari'),
            'jumlah_harga_item' => Yii::t('app', 'Total Harga Item'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWilayah0()
    {
        return $this->hasOne(Wilayah::className(), ['id' => 'wilayah']);
    }
}
