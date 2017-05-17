<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace backend\models;
use yii\base\Model;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use db;
use Yii;
/**
 * Description of Rbac
 *
 * @author Administrator
 */
class Rbac extends Model{
    public $rols;
    public $roll;
    public $power;
    public $role;
    public $users;
    public function rules()
    {
        return [
            
        ];
    }
     public function attributeLabels()
    {
        return [
            'rols'=>'创建权限',
            'roll'=>'创建角色',
            'power'=>'许可',
            'role'=>'角色',
            'users'=>'用户',
        ];
    }
    static public function rols()
    {
        $model = Yii::$app->db->createCommand('select name from auth_item where type=1')->queryAll();
        return $model;
    }
    static public function roll()
    {
        $model = Yii::$app->db->createCommand('select name from auth_item where type =2')->queryAll();
        return $model;
    }
    static public function arrtostart($data)
    {
        $arr = array();
        foreach ($data as $value)
        {
            $arr[$value['name']]= $value['name'];
        } 
        return $arr;
    }
    static public function arruser()
    {
        $data = Yii::$app->db->createCommand('select * from user')->queryAll();
        return $data;   
    }
    static public function getpower()
    {
        $sql = 'select name from auth_item where type=1';
        $power = Yii::$app->db->createCommand($sql)->queryAll();
        return $power;
    }
    static public function arruserid($data)
    {
        $arr = array();
        foreach($data as $value)
        {
        $arr[$value['id']] = $value['username'];
        }
        return $arr;
    }
    
}
