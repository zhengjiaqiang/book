<?php 
namespace backend\models;
use yii\base\Model;
use Yii;
 class Novel extends Model
 {    

 	public function doInsert($data)
 	{
 		$book_name=$data['book_name'];
       $a_id=$data['a_id'];
       $book_desc=$data['book_desc'];
      $post_data=Yii::$app->db->createCommand()->insert('book_novel', [
      'book_name' => $book_name,
      'a_id' => $a_id,
     'book_desc' => $book_desc
      ])->execute();
      return $post_data;
 	}

 	 //列表
 	public function getList()
 	{   
 		$sql="SELECT * FROM book_novel as n LEFT JOIN (book_cat as cat,book_author as author) ON (n.cat_id=cat.cat_id and author.a_id=n.a_id)";
 		//$sql="select * from book_novel as n join book_cat as cat  on n.cat_id=cat.cat_id ";
 		$data=Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
 	}
 	//删除操作
 	public function del($id)
 	{
 		$sql="delete from book_novel where book_id in($id)";
       $res=Yii::$app->db->createCommand($sql)->query();
       return $res;
 	}
 	//分类查询
 	public function nove_type()
 	{
 		$sql="select cat_id,cat_name from book_cat";
       $data=Yii::$app->db->createCommand($sql)->queryAll();
       return $data;
 	}

 	  public function update($id)
 	  {
 	  	 $sql="SELECT * FROM book_novel as n LEFT JOIN (book_cat as cat,book_author as author) ON (n.cat_id=cat.cat_id and author.a_id=n.a_id) where book_id=$id";
       $data=Yii::$app->db->createCommand($sql)->queryOne();
       return $data;
 	  }
      //修改执行页面
 	public function do_update($id,$data)
 	{
 	 $book_name=$data['book_name'];
     $a_id=$data['a_id'];
     $book_desc=$data['book_desc'];
     $res=Yii::$app->db->createCommand()->update('book_novel', ['book_name'=>$book_name,'a_id'=>$a_id,'book_desc'=>$book_desc],"book_id=$id")->execute();
     return $res;	
 	}
 	
 }

 ?>