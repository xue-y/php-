<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>备份数据</title>
    <title><?php echo $all_data["nav"].$all_data["action"].'---'.$tit;?></title>
    <link rel="stylesheet" href="/Static/css/pintuer.css">
    <link rel="stylesheet" href="/Static/css/admin.css">
    <script src="/Static/js/jquery.js"></script>
</head>
<body><!--数据管理----备份-->
<ul class="bread  clearfix">
    <?php echo $Data->index_url;?>
    <li><a href="<?php echo  $_SERVER['PHP_SELF'] ;?>" id="a_leader_txt"><?php echo $all_data["nav"];?>管理</a></li>
    <li><?php echo $all_data["nav"].$all_data["action"].'---'.$tit;?></li>
</ul>
<div class="panel admin-panel">
    <div class="body-content">
        <form method="post" class="form-x" action="">
            <div class="form-group">
                <div class="label">
                    <label>备份数据：</label>
                </div>
                <select class="input select_w"  name="back">
                    <option  value="all">所有数据</option>
                    <option value="group">人员组数据</option>
                    <option value="user">人员数据</option>
                    <option value="product">项目数据</option>
                    <option value="type">类型数据</option>
                </select>
            </div>

            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main" type="submit">备份数据</button>
                    &nbsp; &nbsp;
                    <button class="button bg-main" type="button" onclick="window.history.back();">直接返回</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body></html>