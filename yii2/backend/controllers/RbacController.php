<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace backend\controllers;
use yii\web\Controller;
use backend\models\Rbac;
use db;
use Yii;
/**
 * Description of RbacController
 *
 * @author Administrator
 */
class RbacController extends Controller{
    //添加权限
    public function actionIndex()
    {
        $model = new Rbac();
        return $this->render('rols',['model'=>$model]);
    }
    //执行权限
    public function actionAddrols()
    {
        $item = Yii::$app->request->post('Rbac');
        $auth = Yii::$app->authManager;
        $createPost = $auth->createPermission($item['rols']);
        $createPost->description = '创建了 ' . $item['rols'] . ' 许可';
        $auth->add($createPost);
        echo "<a href='?r=rbac/roll'>点击创建角色</a>";
    }
    //创建角色
    public function actionRoll()
    {
        $model = new Rbac();
        return $this->render('roll',['model'=>$model]);
    }
    //执行创建角色
    public function actionAddroll()
    {
        $item = Yii::$app->request->post('Rbac');
        $auth = Yii::$app->authManager;
        $role = $auth->createRole($item['roll']);
        $role->description = '创建了 ' . $item['roll'] . ' 角色';
        $auth->add($role);
       echo "<a href='?r=rbac/perm'>点击给角色分配许可</a>";
    }
    //给角色分配许可
    public function actionPerm()
    {
       $rols = Rbac::rols();
       $roll = Rbac::roll();
       $rolss = Rbac::arrtostart($rols);
       $rolls = Rbac::arrtostart($roll);
       $model = new Rbac();
       return $this->render('rp',['model'=>$model,'rols'=>$rolss,'roll'=>$rolls]);
    }
    //执行给角色分配许可
    public function actionAddpower()
    {
        $data = Yii::$app->request->post();
        $roles = $data['Rbac']['role'];
        $powers = $data['Rbac']['power'];
        foreach($powers as $power){
            $auth = Yii::$app->authManager;
            $parent = $auth->createRole($roles);
            $child = $auth->createPermission($power);
            $auth->addChild($parent, $child);
        }
        echo "<a href='?r=rbac/poweruser'>给角色分配用户</a>";  
    }
    //给角色分配用户
    public function actionPoweruser()
    {
        $user = Rbac::arruser();
        $power = Rbac::getpower();
        $powers = Rbac::arrtostart($power);
        $users = Rbac::arruserid($user);
        $model = new Rbac();
        return $this->render('poweruser',['model'=>$model,'powers'=>$powers,'users'=>$users]);
    }
    //执行角色分配用户
    public function actionAdduserpower()
    {
        $data = Yii::$app->request->post();
        $roles = $data['Rbac']['role'];
        $user = $data['Rbac']['users'];
        foreach($roles as $value){
        $auth = Yii::$app->authManager;
        $reader = $auth->createRole($value);
        $auth->assign($reader,$user);
        }
    }
    //开启权限设置
//    public function beforeAction($action)
//     {
//        $action = Yii::$app->controller->action->id;
//        if(\Yii::$app->user->can($action)){
//        return true;
//        }else{
//        throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
//        }
//    }
   
}
