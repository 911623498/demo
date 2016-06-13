<?php

namespace frontend\controllers;

class CreateController extends \yii\web\Controller
{
    public $layout=false;
    public function actionIndex()
    {
        return $this->render('create');
    }

}
