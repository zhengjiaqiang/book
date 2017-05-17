<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$form = ActiveForm::begin([
    'id' => 'form-save',
    'options' => ['class' => 'form-horizontal'],
    'enableAjaxValidation' => true,  
    'validationUrl' => 'validate-view',
]);
?>
<table>
    <tr>
        <th>选择</th>
        <th>ID</th>
        <th>商品名称</th>
        <th>商品价格</th>        
        <th>操作</th>
    </tr>
    <?php foreach($data as $key =>$val){?>
    <tr>
        <td><?= $form->field($model,'checkbox[]')->checkboxList(['$val["id"]'=>''])?></td>
        <td><?= $val['id']?></td>
        <td><?= $val['title']?></td>
        <td><?= $val['price']?></td>
        <td>删除</td>
    </tr>
    <?php }?>
    <?=Html::submitButton('shan',['class'=>'btn btn-primary']); ?>  
</table>
<?php ActiveForm::end() ?>
<script>
    $(function(){ 
    $(document).on('beforeSubmit', 'form#form-save', function () {  
            var form = $(this);  
            //返回错误的表单信息  
            if (form.find('.has-error').length)  
            {  
                return false;  
            }  
            //表单提交  
            $.ajax({  
                url    : '?r=goods/validateview',  
                type   : 'post',  
                data   : '123',  
                success: function (response){  
                  alert(response);
                },  
                error  : function (){  
                    alert('系统错误');  
                    return false;  
                }  
            });  
            return false;  
        });  
    });  
</script>


