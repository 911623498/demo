<?php

namespace frontend\controllers;

class LoginController extends \yii\web\Controller
{
    public $layout=false;
    public function actionIndex()
    {
        return $this->render('login');
    }

}
