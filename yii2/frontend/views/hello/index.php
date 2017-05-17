<form action="action">
<center>
    <h1 style="color: red">添加页面</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>用户名:</td>
            <td>
                <input type="text" name="username" id="username" onblur="user()"><span id="ts_username">*</span>
            </td>
        </tr>
        <tr>
            <td>密码:</td>
            <td><input type="text" name="password" id="password" onblur="pass()"><span id="ts_password">*</span></td>
        </tr>
        <tr>
            <td>昵称:</td>
            <td><input type="text" name="names" id="names" onblur="nicheng()"><span id='ts_nicheng'></span></td>
        </tr>
        <tr>
            <td>真实姓名:</td>
            <td><input type="text" name="name" id="name" onblur='xingming()'><span id='ts_xingming'></span></td>
        </tr>
        <tr>
            <td>年龄:</td>
            <td><input type="text" name="age" id="age" onblur="niansssss()"><span id='ts_nianling'><span></td>
        </tr>
        <tr>
            <td>性别:</td>
            <td><input type="radio" id="sex" checked='checked' name="sex" value="0">男<input type="radio" name="sex" value="1">女</td>
        </tr>
        <tr>
            <td>地址</td>
            <td><input type="text" name="dizhi" id="dizhi" ></td>
        </tr>
        <tr>
            <td>电话</td>
            <td><input type="text" name="phone" id="phone"></td>
        </tr>
        <tr>
            <td>邮箱</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>qq</td>
            <td><input type="text" id="qq" name="qq"></td>
        </tr>
        <tr>
            <td>级别</td>
            <td><input type="text" id="jibie" name="jibie" value="1"></td>
        </tr>
    </table>
</center>
</form>
<script>
    function user()
    {
        var usernamess=document.getElementById("username").value;
        var par = /^[a-z][a-z_0-9]{5,12}$/;
        if(par.test(usernamess))
        {
            document.getElementById("ts_username").innerHTML="<font color='gueer'>*√</font>";
             return true;
        }else{
            document.getElementById("ts_username").innerHTML="<font color='red'>*用户名首字母必须是字符6-12个字母数字下划线组成</font>";
             return false;
        }
    }
    function pass()
    {
        var pass   = document.getElementById('password').value;
        var par1     = /^[a-z_0-9A-Z!@#$%^&*()+=]{6,12}$/;
        if(par1.test(pass))
        {
            document.getElementById("ts_password").innerHTML="<font color='gueer'>*√</font>";
        }
        else
        {
            document.getElementById("ts_password").innerHTML = "<font color='red'>*密码必须以数字 字母 以及!@#$%^&*()+=组成的六位数以上组成</font>"
        }
    }
   function nicheng()
   {
        var name = document.getElementById('names').value;
        var par = /^[\u4e00-\u9fa5]{3,10}$/;
        if(par.test(name))
        {
            document.getElementById("ts_nicheng").innerHTML="<font color='gueer'>*√</font>";
        }
        else
        {
            document.getElementById("ts_nicheng").innerHTML = "<font color='red'>*昵称必须是3-10位汉字组成</font>"
        }
   }
   function xingming()
   {
        var name = document.getElementById('name').value;
        var par = /^[\u4e00-\u9fa5]{2,5}$/;
        if(par.test(name))
        {
            document.getElementById("ts_xingming").innerHTML="<font color='gueer'>*√</font>";
        }
        else
        {
            document.getElementById("ts_xingming").innerHTML = "<font color='red'>*真实姓名必须是2-5位汉字组成</font>"
        }
   }
   function niansssss()
   {
        var age = document.getElementById('age').value;
        var par = /^[0-9]{1,3}$/;
        if(par.test(age))
        {
            document.getElementById("ts_nianling").innerHTML="<font color='gueer'>*√</font>";
        }
        else
        {
            document.getElementById("ts_nianling").innerHTML = "<font color='red'>*年龄是由1-3个数字组成</font>"
        }
   }
  
</script>


