<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>首页-<?php echo ($pos["c"]); ?></title>
    <link type="text/css" rel="stylesheet" href="/Public/back/css/pintuer.css" >
    <link type="text/css" rel="stylesheet" href="/Public/back/css/admin.css">
    <script  type="text/javascript" src="/Public/back/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/back/js/pintuer.js"></script>

</head>
<body>
<ul class="bread  clearfix">
    <li><a href="/Back/Index/index" target="right" class="icon-home"> 首页</a></li>
    <li><a href="/Back/Recovery/index" id="a_leader_txt"><?php echo ($pos["c"]); ?></a></li>
    <li><a><?php echo ($pos["a"]); ?></a></li>
</ul>

<!--客户回收站列表页面-->
<link rel="stylesheet" type="text/css" href="/Public/back/css/time.css">
<script src="/Public/back/js/time.js"></script>
<style>
    .submit input{background: none; border:none;color:#f00;}
    .submit:hover input{color:#fff;}
</style>
<div class="panel">
    <form method="post" action="">
  <div class="padding">
      <ul class="search" style="padding-left:10px;">
          <a class="button border-yellow submit" href="javascript:;" >
              <span class="icon-reply"></span><input type="button"  value="批量<?php echo ($action_name["restore"]); ?>" onclick="batch($(this),'restore')"></a>

          <a class="button border-red submit" href="javascript:;" ><span class="icon-trash-o"></span><input type="button"  value="批量<?php echo ($action_name["del"]); ?>" onclick="batch($(this),'del')"></a>

          <div class="right">
              <li>
                  <select name="zx"  class="input"  style="width:150px; line-height:17px; display:inline-block" >
                      <option value="-1">按咨询师搜索</option>
                      <?php if(is_array($all_zx)): foreach($all_zx as $key=>$zx): ?><option value="<?php echo ($zx["id"]); ?>" ><?php echo ($zx["u_name"]); ?></option><?php endforeach; endif; ?>
                  </select>
              </li>
              <li>
                  <input class="datainp input" id="inpstart" type="text" placeholder="开始日期" readonly="">
              </li>
              <li><input class="datainp input" id="inpend" type="text" placeholder="结束日期" readonly=""></li>
              <li>
                  <input type="text" placeholder="请输入搜索姓名或手机号" name="keywords" class="input n" style="width:250px; line-height:17px;display:inline-block" />
                  <a href="javascript:void(0)" class="button border-main icon-search" > 搜索</a></li>
          </div>

      </ul>
  </div> 
  <table class="table table-hover text-center">
    <tr>

      <th  width="8%" style="text-align:left; padding-left:20px;"><input type="checkbox" id="checkall"/>全选</th>
      <th>编号</th>
      <th>客户名称名</th>
      <th>手机号</th>
      <th>微信（ 是否验证 ）</th>
      <th>注册时间</th>
      <th>操作</th>
    </tr>
   <tbody>
   <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
       <td><input type="checkbox" name="id[]" value="<?php echo ($v["id"]); ?>" /></td>
       <td><?php echo ($v["id"]); ?></td>
       <td><?php echo ($v["n"]); ?></td>
       <td><?php echo ($v["phone"]); ?></td>
       <td><?php echo ($v["wx"]); ?>
           <?php if($v["wx"] != ''): if(($v["is_wx"]) == "1"): ?>已激活<?php else: ?> 未激活<?php endif; endif; ?>
       </td>
       <td><?php echo ($v["t"]); ?></td>
      <td>
      <div class="button-group">

       <?php if($v["cid"] == $uid): ?><!-- 只可咨询删除自己的客户-->
           <a class="icon-reply" href="/Back/Recovery/restore?id=<?php echo ($v["id"]); ?>"> <?php echo ($action_name["restore"]); ?></a>
           &nbsp;
           <a class="icon-trash-o" href="/Back/Recovery/del?id=<?php echo ($v["id"]); ?>" onclick="return confirm('您确定要删除吗?')"> <?php echo ($action_name["del"]); ?></a><?php endif; ?>
      </div>
      </td>
    </tr><?php endforeach; endif; ?>
  </tbody>  
  </table>
</form>
   <ul class="pagelist">    <?php echo ($page); ?> <span>共 <?php echo ($count); ?> 个用户</span></ul>
</div>
<script type="text/javascript">
    //时间插件
    var start = {
        dateCell: '#inpstart',
        //      format: 'YYYY-MM-DD hh:mm',
        format: 'YYYY-MM-DD',
        minDate: '2014-06-16 23:59:59', //设定最小日期为当前日期
        festival:true,
        maxDate: '2099-06-16 23:59:59', //最大日期
        isTime: true,
        choosefun: function(datas){
            end.minDate = datas; //开始日选好后，重置结束日的最小日期
        }
    };
    var end = {
        dateCell: '#inpend',
        //     format: 'YYYY-MM-DD hh:mm',
        format: 'YYYY-MM-DD',
        minDate: jeDate.now(0), //设定最小日期为当前日期
        festival:true,
        maxDate: '2099-06-16 23:59:59', //最大日期
        isTime: true,
        choosefun: function(datas){
            start.maxDate = datas; //将结束日的初始值设定为开始日的最大日期
        },
        okfun:function(val){alert(val)}
    };
    jeDate(start);
    jeDate(end);

    jeDate({
        dateCell:"#textymdhms",
        format:"YYYY-MM-DD hh:mm:ss",
        //isinitVal:true,
        isTime:true,
        festival: true, //显示节日
        minDate:"2015-09-19 00:00:00",
        maxDate:"2019-09-19 00:00:00"
    })

    jeDate({
        dateCell:"#texthms",
        format:"hh:mm"
    });

    jeDate({
        dateCell: '#testym',
        isinitVal:true,
        format: 'YYYY/MM', // 分隔符可以任意定义，该例子表示只显示年月
        minDate: '2015-06-01', //最小日期
        maxDate: '2017-06-01',  //最大日期
        choosefun:function(val){alert(val)}
    });
    jeDate({
        dateCell: '#testy',
        isinitVal:true,
        format: 'YYYY-MM-DD', // 分隔符可以任意定义，该例子表示只显示年月
        minDate: '2010-06-01', //最小日期
        maxDate: '2020-06-01' //最大日期
    })
    jeDate({
        dateCell:"input.datep",
        format:"YYYY-MM-DD hh:mm:ss",
        minDate:"2015-09-19 00:00:00",
        isinitVal:true,
        isDisplay:true,
        displayCell:".discls",
        isTime:true,
        festival: true //显示节日
    })
</script>
<script  type="text/javascript">
    $(".icon-search").click(function(){
        //
        var s="/Back/Recovery/index?";
        var t_start=$("#inpstart").val()
        var t_end=$("#inpend").val()
        var n=$(".n").val();
        var zx=$(".search").find("select").eq(0).val();
        if(t_start!='')
        {
            s+="t_start="+t_start+"&";
        }
        if(t_end!="")
        {
            s+="t_end="+t_end+"&";
        }
        if(n!="")
        {
            s+="key="+n+"&";
        }
        if(zx!="-1")
        {
            s+="zx="+zx+"&";
        }
        s=s.substring(0,s.length-1);
        $(this).attr("href",s);
    });

    // 取得url 参数-- 必须当前页面调用否则无效
    function GetRequest() {
        var url = location.search; //获取url中"?"符后的字串
        var theRequest = new Object();
        if (url.indexOf("?") != -1) {
            var str = url.substr(1);
            strs = str.split("&");
            for(var i = 0; i < strs.length; i ++) {
              //  theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
              theRequest[strs[i].split("=")[0]]=strs[i].split("=")[1];
            }
        }
        return theRequest;
    }
    var Request = new Object();
    Request = GetRequest();
    // 选中搜索条件
    $("#inpstart").val(Request['t_start']);
    $("#inpend").val(Request['t_end']);
    var zx_id=Request['zx'];

    var zx_list=$("select option");
    zx_list.each(function(i,ele){
      if(zx_list.eq(i).val()==zx_id)
      {
          zx_list.eq(i).attr("selected",true);
      }
    });

    // 批量操作
    function batch(th,url){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){
            var t=confirm("您确认要删除选中的内容吗？");
            if (t!=true) return false;
            $("form").attr("action","/Back/Recovery/"+url);
            th.attr("type","submit");
        }
        else{
            alert("请选择您要删除的内容!");
            return false;
        }
    }

</script>

<script type="text/javascript" src="/Public/back/js/arc_list.js"></script>
</body></html>