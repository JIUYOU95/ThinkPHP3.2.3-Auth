<?php
namespace Common\Controller;
use Think\Controller;
use Think\Auth;
use Admin\Common\Opadmin;
/**
*Auth基类控制器
*/

class AuthController extends Controller{
	protected function _initialize(){
		$Opadmin=new Opadmin();
		$uid=$Opadmin->getUserid();
		if($uid){
			//如果是超级管理员的话，就不用验证权限了，给予所有权限
			if($uid == 1){
				return true;
			}
			//下面进行权限判断
			$auth = new Auth();
			if (!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,$uid)) {
				$this->redirect('Login/error_msg',array('msg'=>'4'));
			}
		}else{
			$this->error('请先登录！',U('Login/index'));
		}
		
		
	}
}
