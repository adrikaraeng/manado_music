<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank".
 *
 * @property integer $id
 * @property string $no_rek
 * @property string $rek_a_n
 * @property string $bank
 * @property string $aktivasi
 */
class JasaKirim extends \yii\db\ActiveRecord
{
    public $jasa;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jasa'], 'required','message'=>'Must be'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jasa' => Yii::t('app', 'Ongkos Kirim & Lama pengiriman'),
        ];
    }
}
