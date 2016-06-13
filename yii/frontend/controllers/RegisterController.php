<?php

namespace frontend\controllers;

class RegisterController extends \yii\web\Controller
{
    public $layout=false;
    public function actionIndex()
    {
        return $this->render('register');
    }

}
