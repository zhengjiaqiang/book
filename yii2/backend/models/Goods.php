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
 * Description of Goods
 *
 * @author Administrator
 */
class Goods extends Model
{
    public $goods_name;
    public $price;
    public $checkbox;
    //返回验证信息可为空
    public function rules()
    {
        return [
            
        ];
    }
    public function attributeLabels() {
        return [
            'goods_name'=>'商品名:',
            'price'=>'价格:',
            'checkbox'=>'',
        ];
    }
    static public function getList()
    {
        $data = Yii::$app->db->createCommand('select * from goods')->queryAll();
        return $data;
    }
}
