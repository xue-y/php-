﻿## 简介
ThinkPHP 轻量级PHP开发框架   
安装目录 Install 
项目名称：二级分销   
后台管理员以部门划分，可以不同的人分配不同的权限，可以限制部门主管只可修改自己部门的人员  
配置文件 renwu\Application\Back\Conf\define.php   define('A_S_C',FALSE);//为true  
添加类 方法 MyController.class.php 文件中 function arr_data($key) 函数  
也可 系统设置中设置 普通管理员添加其他部门人员--》是  
客户有后台管理员（销售人员分配）,管理员添加客户之后，客户可以前台登录，可以修改个人信息，推荐人员赚取佣金  
佣金可以提现，提现需要联系管理员，不支持线下提现。客户推荐的人员需要管理员审核，审核通过客户推荐的人即是  
管理员的客户,一个客户微信号可以绑定多个用户账号（手机号）。  
后台管理员一个账号同时只允许一个管理员登录    	

#### 项目功能：  
**后端：**         
   管理员管理、RBAC权限管理、客户管理、缓存清理、STMP邮箱绑定、密码找回、部门划分、个人设置      
**前端：**          
   微信登录、密码找回、推荐下线、信息查看、个人设置      		
	
#### 环境平台 : 
环境版本：PHP5.3以上版本（注意：PHP5.3dev版本和PHP6均不支持）       

#### Liunx 平台： 
PHP：PHP7 以上版本不支持    
PHP： 5.3.27p1 (cli) (built: Jul 20 2017 12:58:56)   
Copyright (c) 1997-2013 The PHP Group  
Zend Engine v2.3.0, Copyright (c) 1998-2013 Zend Technologies    
nginx version: nginx/1.4.7     
系统:CentOS release 6.8 /CentOS release 6.5     
Linux version 2.6.32-642.13.1.el6.x86_64    
**注：**  其他版本未测试   

#### window平台：    
Apache/2.4.23 (Win32) OpenSSL/1.0.2j PHP/5.4.45    
PHP版本（php_version）：	5.4.45, 5.5.45-nts不支持隐藏index.php     
|--  数据库连接使用的是mysql连接,如果修改成pdo 连接修改 Lock_Controller.class.php/InstallController.class.php      
|--  文件中的搜索修改 mysql_query 、 mysql_connect 、mysql_select_db 这个3个函数即可    
Zend版本	2.4.0   
SQLite3　Ver 3.8.10.2    
mysql  Ver 14.14 Distrib 5.5.53, for Win32 (AMD64)    
**注：**  其他版本未测试   

#### 文件说明及注意事项      
[模板字体地址](http://www.bootcss.com/p/font-awesome/)   
thinkphp模板中 __MODULE__ 自动转为转小写 部署阶段   
安装完成之后请将应用文件夹的公共配置文件注释打开  
安装完成之后请检查运行日志  //错误日志文件   
入口文件 如果是 index.php define('APP_DEBUG',True); 改为false    
变量常量的字段使用 _ 分割    
vhosts.conf nginx 服务器配置文件    
robots.txt 禁止蜘蛛抓取     

#### 安装说明
安装文件 运行目录下 Back/InstallController.class.php      
	执行sql语句 使用的pdo方式连接  也可以使用mysql（注释掉了，如果需要可以打开注释）    
数据表以及数据 Back/Conf/sql.php 文件    
安装完成   
	 根目录下 index.php define('APP_DEBUG',true); 改为false   
	 开启调试模式 为true 建议开发阶段开启 部署阶段注释或者设为false   
	 CONF_PATH 应用公共配置目录 下的config.php 取消注释   

安装完成系统自动将 InstallController.class.php 更名为 Install_Controller.class.php  
安装完成系统自动将 LockController.class.php 更名为 Lock_Controller.class.php   
系统自动将 框架应用目录 APP_PATH 下创建Install/lock.txt 文件  

如果安装需要删除锁定文件 /Install/lock.txt    
再将Install_Controller.class.php 更名为InstallController.class.php          
Lock_Controller.class.php 更名为 LockController.class.php       
安装完成建议 将 CONF_PATH 应用公共配置目录 中的注释去掉    

##### 目录权限   
Application/Back/Cache/ 有写入读取权限 建议 777     
Application/Back/Conf/ 有写入读取权限 建议 777    
Application/Runtime/*  有写入读取权限 建议 777   
Application/Common/Conf/ 有写入读取权限 建议 777   
Install/ 有创建文件权限 建议 755   
ThinkPhp/ 有读取执行的权限建议 755    
nginx 下/usr/local/nginx/conf/vhost/XXX.conf 文件修改路由 -- 根目录 vhost.conf    
TP3 中 U()  $this->redirect() 跳转地址默认会添加html nginx 环境需要配置 vhost.conf 文件   
ajax 请求php 数据，服务端如果使用exit("数据")返回;如果数据是数字,前端接收不到,echo(数字)前端可以接收到     
session 函数是前缀数组形式session[prefix][name]=value    
cookie 函数是前缀加连接cookie name 形式cookie[prefix_name]=value       