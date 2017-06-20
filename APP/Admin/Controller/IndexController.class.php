<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Admin\Common\Opadmin;
class IndexController extends AuthController {
    public function index(){
    	$Opadmin=new Opadmin();
    	$this->nickname=$Opadmin->getNickname();
    	$this->config=$Opadmin->config();
    	// 分配菜单数据
		$nav_data=D('Nav')->getTreeData('level','order_number,id');
		$this->assign('data',$nav_data);
        $this->display();
    }
}
