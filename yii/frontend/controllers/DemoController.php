<?php

namespace frontend\controllers;


class DemoController extends \yii\web\Controller
{
    public $layout=false;
    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionLian()
    {

        return $this->render('about');
    }

    public function actionToudi()
    {

        return $this->render('toudi');
    }

    public function actionMlist()
    {

        return $this->render('mList');
    }
}
