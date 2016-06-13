<?php

namespace frontend\controllers;

class CompanylistController extends \yii\web\Controller
{
    public $layout=false;
    public function actionIndex()
    {
        return $this->render('companylist');
    }

    public function actionList()
    {
        return $this->render('list');
    }

}
