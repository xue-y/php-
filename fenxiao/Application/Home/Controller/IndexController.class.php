<?php

 /*个人主页
  * */

namespace Home\Controller;
use My\HwxController;

class IndexController extends HwxController {

    public function index()//个人主页
    {
        $cus=D("Customer");
        $info=$cus->money_n($this->uid); // 获取用户头像 佣金金额

        if(!empty($info["headimg"]))
        {
            $info["headimg"]=U_HEAD_IMG.$info["headimg"];
        }else
        {
            $info["headimg"]=U_HEAD_DE;
        }
        if(empty($info["n"]))
        {
            $info["n"]=cookie("phone");
        }

        if(!empty($info))
        {
            $this->assign("info",$info);
        }else
        {
            $this->error("请重新登录,信息错误");
        }
        $this->display("/index");
    }
}