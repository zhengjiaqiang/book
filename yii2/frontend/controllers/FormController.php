<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/10
 * Time: 11:38
 */

namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Form;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii;
use db;
class FormController extends Controller
{
    public function actionIndex()
    {
        $model = new Form();
        $models = new UploadForm();
        return $this->render('formdata',array('model'=>$model,'models'=>$models));
    }
    public function actionAdd()
    {
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstances($model, 'imageFile');
            foreach ($model->imageFile as $file) {
                $y = date('Y',time());
                $m = date('m',time());
                $d = date('d',time());
                $fileName = explode('.',$file->name);
                $hou = end($fileName);
                $file->saveAs('uploads/' .$y.$m.$d.rand('10000', '99999').time() . '.' . $file->extension);

                
            }
            return '上了';
        }
    }
}