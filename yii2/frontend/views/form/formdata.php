<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
    'action'  =>'?r=form/add',
    'method'  =>'post'
]) ?>
<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'pwd')->passwordInput(['id'=>'123']) ?>
<?= $form->field($model, 'sex')->radioList(['0'=>'男','1'=>'女'])?>
<?= $form->field($model, 'select')->dropDownList(['0'=>0,1=>1,2=>2,3=>3],['prompt'=>'请选择','style'=>'width:120px','id'=>'11'])?>
<?= $form->field($model,'hobby[]')->checkboxList(['lan'=>'篮球','yu'=>'羽毛球','zu'=>'足球'])?>
<?= $form->field($models,'imageFile[]')->fileInput(['multiple'=>'multiple'])?>
<?= $form->field($model,'descc')->textarea(['rows'=>10])?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>