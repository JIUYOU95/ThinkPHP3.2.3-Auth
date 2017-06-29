<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Admin\Common\Opadmin;
class IndexController extends AuthController {
    public function index(){
    	$Opadmin=new Opadmin();
    	$this->nickname=$Opadmin->getNickname();
    	$config=$Opadmin->config();
        $this->assign('config',$config);
    	// 分配菜单数据
		$nav_data=D('Nav')->getTree('level','order_number,id');
		$this->assign('data',$nav_data);
        $this->display();
    }

    public function Welcome(){

    	 $this->display();
    }
}
