<?php
namespace console\controllers;

use common\helpers\TextHelper;
use common\models\User;
use yii\console\Controller;

class UserController extends Controller
{
    public function actionRegister($name, $email, $password)
    {
        $salt = TextHelper::getRandomString();

        $data = [
            'username'           => $name,
            'email'              => $email,
            'passwordHash'       => $salt . md5($salt . $password),
            'passwordResetToken' => md5(TextHelper::getRandomString()),
        ];

        $user = new User();
        $user->setAttributes($data);

        if ($user->save()) {
            echo 'Register completed';
        } else {
            echo 'Register failed';
        }

        echo PHP_EOL;
    }
}
