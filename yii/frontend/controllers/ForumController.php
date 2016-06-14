<?php

namespace frontend\controllers;

class ForumController extends \yii\web\Controller
{
    public $layout=false;
    public function actionIndex()
    {

        return $this->render('toForum.');
    }

}
