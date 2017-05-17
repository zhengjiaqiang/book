<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace backend\controllers;
use yii\web\Controller;
use backend\models\Novel;
use yii;
class NovelController extends Controller
{   
    public $enableCsrfValidation=false;
    //添加操作
    public function actionDoinsert()
    {
     if(Yii::$app->request->post())
     {
      $data=Yii::$app->request->post();
      $novel=new Novel();
      $bool=$novel->doInsert($data);
      if($bool)
      {
        echo "<script>alert('入库成功');location.href='?r=novel/novel_list';</script>"; 
      }
      else
      {
         echo "<script>alert('入库失败');</script>";
      }


     }
     else
     {
      return $this->render('form');
     }
    }
    //列表展示页面
   public function actionNovel_list()
   {
    $novel=new Novel();
    $data=$novel->getList();//小说列表展示
    $typeList=$novel->nove_type();//分类查询
    return $this->render('novel_list',['data'=>$data,'typeList'=>$typeList]);
   }
   public function actionDel()
   {
    $id=Yii::$app->request->get('id');
    $novel=new Novel();
    $res=$novel->del($id);
    if($res)
    {
        echo "<script>alert('删除成功');location.href='?r=novel/novel_list';</script>";
    }
    else
    {
     echo "<script>alert('删除失败');location.href='?r=novel/novel_list';</script>";   
    }
   }
   //批删
   public function actionDo_del()
   {
     $id=Yii::$app->request->get('id');
     $sql="delete from book_novel where book_id in($id)";
     $res=Yii::$app->db->createCommand($sql)->query();
     if($res)
     {
        echo 1;
     }
     else
     {
        echo 0;
     }
   }
   //搜索
    public function actionSearch()
    {
        //接收关键字
        $keywords=Yii::$app->request->get('keywords');
        //$sql="select * from book_novel where book_name like '%$keywords%'";
        $sql="SELECT * FROM book_novel as n LEFT JOIN (book_cat as cat,book_author as author) ON (n.cat_id=cat.cat_id and author.a_id=n.a_id) where book_name like '%$keywords%'";
       $data=Yii::$app->db->createCommand($sql)->queryAll();
       echo json_encode($data);
    }
     //修改页面
   public function actionUpdate()
   {
     $id=Yii::$app->request->get('id');
      $novel=new Novel();
      $data=$novel->update($id);
    return $this->render('updateForm',['data'=>$data]);
   }
   //修改执行页面
   public function actionDo_update()
   { 
    $id=Yii::$app->request->get('id');
     $data=Yii::$app->request->post();
      $novel=new Novel();
      $res=$novel->do_update($id,$data);
      if($res)
      {
      echo "<script>alert('修改成功');location.href='?r=novel/novel_list';</script>";  
      }
      else
      {
        echo "<script>alert('修改失败');</script>";
      }


   }
}

