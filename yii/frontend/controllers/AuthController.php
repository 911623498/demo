<?php

namespace frontend\controllers;

class AuthController extends \yii\web\Controller
{
    public $layout=false;
    public function actionIndex()
    {
        return $this->render('companylist');
    }

}
