<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace backend\controllers;
use yii\web\Controller;
class AdminController extends Controller
{
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }
    public function actionDesign()
    {
        return $this->renderPartial('design');
    }
    public function actionInsert()
    {
        return $this->renderPartial('insert');
    }
    public function actionLogin()
    {
        return $this->renderPartial('login');
    }
}

