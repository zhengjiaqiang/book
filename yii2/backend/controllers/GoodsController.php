<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace backend\controllers;
use yii\web\Controller;
use backend\models\Goods;
use Yii;
/**
 * Description of GoodsController
 *
 * @author Administrator
 */
class GoodsController extends Controller
{
    
    public function actionIndex()
    {
        $model = new Goods;
        return $this->render('goods_list',['model'=>$model]);
    }
    public function actionAdd_goods()
    {
        $data = Yii::$app->request->post();
        print_r($data);
    }
    public function actionList()
    {
        $data = Goods::getList();
        $model = new Goods;
        return $this->render('list',['data'=>$data,'model'=>$model]);
    }
    public function actionValidateView()  
    {  
        echo "123";die;
        $model = new model();  
        $request = \Yii::$app->getRequest();  
        if ($request->isPost && $model->load($request->post())) {  
            \Yii::$app->response->format = Response::FORMAT_JSON;  
            return ActiveForm::validate($model);  
        }  
    }
    public function actionSave()  
    {  
        \Yii::$app->response->format = Response::FORMAT_JSON;  
        $params = Yii::$app->request->post();  
        $model = $this->findModel($params[id]);  
        if (Yii::$app->request->isPost && $model->load($params)) {  
            return ['success' => $model->save()];  
        }  
        else{  
            return ['code'=>'error'];  
        }  
    }  
}
