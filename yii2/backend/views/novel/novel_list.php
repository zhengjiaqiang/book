<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
<!-- <div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="?r=admin/index">首页</a></li>
                <li><a href="http://www.sucaihuo.com/" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员</a></li>
                <li><a href="#">修改密码</a></li>
                <li><a href="#">退出</a></li>
            </ul>
        </div>
    </div>
</div> -->
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="design.html"><i class="icon-font">&#xe008;</i>作品管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe005;</i>博文管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe004;</i>留言管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe033;</i>广告管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="system.html"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="#" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <?php foreach ($typeList as $key => $value): ?>
                                    <option value="<?php echo $value['cat_id'] ?>"><?php echo $value['cat_name'] ?>
                                <?php endforeach ?>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="sel btn btn-primary btn2" name="sub" value="查询" type="button"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="?r=novel/doinsert"><i class="icon-font"></i>新增作品</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content" id="box">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="8%">请选择</th>
                            <th>排序</th>
                            <th>ID</th>
                            <th>小说名称</th>
                            <th>作者</th>
                            <th>分类名称</th>
                            <th>推荐次数</th>
                            <th>小说总字数</th>
                            <th>图片</th>
                            <th>章节</th>
                            <th>点赞</th>
                            <th>评论</th>
                            <th>收藏</th>
                            <th>操作</th>
                        </tr>
                        <?php foreach ($data as $key => $value): ?>
                        <tr>
                            <td class="tc"><input name="ids" value="<?php echo $value['book_id'] ?>" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="<?php echo $value['book_id'] ?>" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="<?php echo $value['book_id'] ?>" type="text">
                            </td>
                            <td><?php echo $value['book_id'] ?></td>
                            <td title="发哥经典"><a target="_blank" href="#" title="发哥经典"><?php echo $value['book_name'] ?></a>
                            </td>
                            <td><?php echo $value['author_name'] ?></td>
                            <td><?php echo $value['cat_name'] ?></td>
                            <td><?php echo $value['book_recomen'] ?></td>
                            <td><?php echo $value['book_words'] ?></td>
                            <td>0</td>
                            <td><?php echo $value['s_id'] ?></td>
                            <td><?php echo $value['click_num'] ?></td>
                            <td><?php echo $value['comment_num'] ?></td>
                            <td><?php echo $value['collect_num'] ?></td>
                            <td>
                                <a class="link-update" href="?r=novel/update&id=<?php echo $value['book_id'] ?>">修改</a>
                                <a class="link-del" href="?r=novel/del&id=<?php echo $value['book_id'] ?>">删除</a>
                            </td>
                        </tr>
                         <?php endforeach ?>
                    </table>&nbsp;&nbsp;&nbsp;
                    <center>
                     <input type="button" value="全选" class="del_all">
                     <input type="button" value="反选" class="un_check">
                    <input type="button" value="批删" id="batch_del">
                    </center>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
<!-- <script src="http://www.jia.com/yii2.0.11/backend/web/assets/59e22561/jquery.js"></script> -->
<script>
var ids =$("input[name=ids]");
var id='';
//全选
$(".del_all").click(function(){
 for(var i=0;i<ids.length;i++)
    {
        ids[i].checked='checked';
    }
});
//反选
$(".un_check").click(function(){
    console.log(ids.length);
 for(var i=0;i<ids.length;i++)
    {
        ids[i].checked=!ids[i].checked;
    }
});
$("#batch_del").click(function(){
    for(var i=0;i<ids.length;i++)
    {
        if(ids[i].checked)
        {
        id+=','+ids[i].value;
        new_id=id.substr(1);
        }
    }
    $.ajax({
    type:"get",
    url:"?r=novel/do_del",
    data:{id:new_id},
    success:function(data){
        if(data==1)
        {    

            for(var i=ids.length-1;i>=0;i--)
            {
              if(ids[i].checked)
            {
             confirm("您确定删除吗")
             ids[i].parentNode.parentNode.remove();
            }   
            }
        }
    }
    });
})
//关键字搜索
$(".sel").click(function(){
    var keywords=$("input[name=keywords]").val();
    $.ajax({
    type:"get",
    url:"?r=novel/search",
    data:{keywords:keywords},
    dataType:"json",
    success:function(data){
        var str='';
        str+='<div class="result-content" id="box">'
         str+='<table class="result-tab" width="100%">'
                        str+='<tr>'
                            str+='<th class="tc" width="8%">请选择</th>'
                            str+='<th>排序</th>'
                            str+='<th>ID</th>'
                            str+='<th>小说名称</th>'
                            str+='<th>作者</th>'
                            str+='<th>分类名称</th>'
                            str+='<th>推荐次数</th>'
                            str+='<th>小说总字数</th>'
                            str+='<th>图片</th>'
                            str+='<th>章节</th>'
                            str+='<th>点赞</th>'
                            str+='<th>评论</th>'
                            str+='<th>收藏</th>'
                            str+='<th>操作</th>'
                        str+='</tr>'
        $.each(data,function(k,v){
         str+='<tr>'
        str+='<td class="tc"><input name="ids" value="'+v.book_id+'" type="checkbox"></td>'
                              str+='<td>'
                            str+='<input name="ids[]" value="'+v.book_id+'" type="hidden">'
                            str+='<input class="common-input sort-input" name="ord[]" value="'+v.book_id+'" type="text">'
                            str+='</td>'
                           str+='<td title=""><a target="_blank" href="#" title="发哥经典">'+v.book_id+'</a>'
                            str+='</td>'
                            str+='<td>'+v.book_name+'</td>'
                            str+='<td>'+v.author_name+'</td>'
                            str+='<td>'+v.cat_name+'</td>'
                            str+='<td>'+v.book_recomen+'</td>'
                            str+='<td>'+v.book_words+'</td>'
                            str+='<td>'+v.book_img+'</td>'
                            str+='<td>'+v.s_id+'</td>'
                            str+='<td>'+v.click_num+'</td>'
                            str+='<td>'+v.comment_num+'</td>'
                            str+='<td>'+v.collect_num+'</td>'
                            str+='<td>'
                                str+='<a class="link-update" href="#">修改</a>'
                                str+='<a class="link-del" href="?r=novel/del&id='+v.book_id+'">删除</a>'
                            str+='</td>'
                        str+='</tr>'
        });       
                      str+='</table>'
                        str+='<div class="list-page"> 2 条 1/1 页</div>'
                        str+='</div>'       
        $("#box").html(str);
    }
    });

})
</script>