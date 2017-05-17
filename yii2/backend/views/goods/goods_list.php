<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'action'  =>'?r=goods/add_goods',
]) ?>
    <?= $form->field($model, 'goods_name[]',['inputOptions'=>['placeholder'=>'请输入商品名']])->textInput(['id'=>'goods'])?>
    <?= $form->field($model, 'price[]',['inputOptions'=>['placeholder'=>'请输入价格']])->textInput(['id'=>'price']) ?>
    <?= Html::Button('+', ['class' => 'btn btn-primary','id'=>'add-goods']) ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('添加', ['class' => 'btn btn-primary','id'=>'btn']) ?>
            <?= Html::resetButton('取消', ['class' => 'btn btn-primary',]) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
<script>
$('#add-goods').on('click',function(){
    $('#price').append("<?= Html::Button('+', ['class' => 'btn btn-primary','id'=>'add-goods']) ?>");
})

</script>

