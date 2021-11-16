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
class CekPemesanan extends Model
{
    public $search;

    public function rules()
    {
        return [
            // username and password are both required
            [['search'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'search' => Yii::t('app', 'Search'),
        ];
    }
}
