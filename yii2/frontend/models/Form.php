<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/10
 * Time: 11:40
 */

namespace frontend\models;
use yii\base\Model;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

class Form extends Model
{
    public $name;
    public $pwd;
    public $sex;
    public $select;
    public $hobby;
    public $file;
    public $descc;
    public function rules()
    {
        return [
           ['name','match','pattern'=>'/^\d{1,3}$/','message'=>'不能为空且只能是数字1-3位数']
        ];
    }
    public function attributeLabels()
    {
        return [
            'name'=>'用户名',
            'pwd'=>'密码',
            'sex'=>'性别',
            'select'=>'多大了姑娘',
            'descc'=>'详情信息',
            'file'=>'上传文件',
        ];
    }
}