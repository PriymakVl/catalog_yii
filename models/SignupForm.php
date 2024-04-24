<?php

namespace app\models;

use app\models\User;

class SignupForm extends \yii\base\Model
{
    public $login;
    public $password;

    public function rules()
    {
        return [
            [['login', 'password'], 'required', 'message' => "Заполните поле"],
            // ['login', "unique", 'targerClass' => User::className(), 'message' => 'Этот логин уже занят']
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
        ];
    }
}