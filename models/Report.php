<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Report extends Model
{
    public $mulai;
    public $selesai;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['mulai', 'selesai', 'string'], 'required', 'message'=>' '],
        ];
    }

    public function attributeLabels()
    {
        return [
            'mulai' => 'Mulai',
            'selesai' => 'Selesai'
        ];
    }
}
