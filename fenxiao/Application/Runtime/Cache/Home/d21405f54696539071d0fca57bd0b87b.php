<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script  type="text/javascript" src="/Public/back/js/jquery.js"></script>

    <title>我的设置</title>
</head>
<body class="set-index">
    <h3>
        <a  onclick="javascript :history.back(-1)" >←</a> | 我的设置
        <a  href="/Home/Index/index" class="float-right">主页</a>
    </h3>
    <ul class="padding">
        <li><a href="/Home/Set/cusBase"><span class="icon-cogs"></span> 基本设置</a></li>
        <li><a href="/Home/Set/phone"><span class="icon-mobile-phone" style="font-size: 22px;"></span>  &nbsp; 手机号</a></li>
        <li><a href="/Home/Set/pass"><span class="icon-key"></span> 修改密码</a></li>
        <li><a href="/Home/Login/logout"><span class="icon-signout"></span> 退出</a></li>
    </ul>
<div class="fixed-bottom"> <!-- 只可在 Info 控制器中使用-->
    <a href="/Home/Money/index">¥ 佣金</a>
    <a href="https://mp.weixin.qq.com/bizmall/mallshelf?id=&t=mall/list&biz=MzI4ODU2MTY1Nw==&shelf_id=1&showwxpaytitle=1&devicetype=android-26&version=26060135&lang=zh_CN" class=" icon-gift"> 项目</a>
    <a href="/Home/Line/index" class="icon-star-empty"> 推荐</a>
    <a href="/Home/Info/index?status=1" class="icon-bell-alt"> 我的
        <?php if(($meg) >= "1"): ?><sup><?php echo ($meg); ?></sup><?php endif; ?></a>
</div>
<link type="text/css" rel="stylesheet" href="/Public/back/css/pintuer.css" >
<link type="text/css" rel="stylesheet" href="/Public/home/home.css" >
<script  type="text/javascript" src="/Public/back/js/arc_list.js"></script>
<script type="text/javascript" src="/Public/back/js/pintuer.js"></script>
</body>
</html>