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
class Bank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_rek', 'rek_a_n', 'bank','aktivasi'], 'required','message'=>''],
            [['no_rek', 'rek_a_n', 'bank', 'aktivasi'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'no_rek' => Yii::t('app', 'No. Rek'),
            'rek_a_n' => Yii::t('app', 'Atas Nama'),
            'bank' => Yii::t('app', 'Bank'),
            'aktivasi' => Yii::t('app', 'Aktivasi'),
        ];
    }
}
