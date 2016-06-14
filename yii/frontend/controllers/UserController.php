<?php

namespace frontend\controllers;

class UserController extends \yii\web\Controller
{
    public $layout=false;
    public function actionIndex()
    {
        return $this->render('positions');
    }

    public function actionAccount()
    {

        return $this->render('accountBind');
    }

    public function actionUppwd()
    {

       return $this->render('updatePwd');
    }

    public function actionColler()
    {

        return $this->render('collections');
    }

    public function actionDelivery()
    {

        return $this->render('delivery');
    }

    public function actionSubmet()
    {

       return $this->render('subscribe');
    }

    public function actionAutoflie()
    {

        return $this->render('autoFilterResumes');
    }
    public function actionCanin()
    {

        return $this->render('canInterviewResumes');
    }

    public function actionHave()
    {

        return $this->render('haveRefuseResumes');
    }

    public function actionCan()
    {
        return $this->render('preview');
    }
}
