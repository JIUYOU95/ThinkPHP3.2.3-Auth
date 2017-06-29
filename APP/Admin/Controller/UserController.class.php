<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Admin\Common\Opadmin;
class UserController extends AuthController {
	/*
	 *个人中心
	 */
	public function index(){
		$Opadmin=new Opadmin();
		$where['id']=$Opadmin->getUserid();
		if(IS_POST){
			$data=I('post.');
			$result=$Opadmin->updateinfo($data);
			if($result){
				A('Config')->add_log('更新个人资料-'.I('nickname'));
                $this->success('更新成功',U('Admin/User/index'));
			}else{
				$this->error('更新个人资料失败！');
			}
		}else{
			$this->data = M('Admin')->where($where)->find();
     		$this->display();
		}
		
	}
	/*
	 *头像更新
	 */
	public function avatar(){
		$upload = new \Think\Upload();
		$upload->maxSize  = 0 ;
		$upload->exts     = array('jpg', 'gif', 'png', 'jpeg');
		$upload->rootPath = 'Public/Uploads/avatar/';
		$upload->autoSub  = false;
		$info = $upload->uploadOne($_FILES['avatar']);
		if(!$info) {
			$this->ajaxReturn(0);
		}else{
			$Opadmin=new Opadmin();
			$where['uid']=$Opadmin->getUserid();
			$avatar = M('Admin')->where($where)->getField('avatar');
			unfile('Public/Uploads/avatar/'.$avatar);	//原始头像删除
			
			$datainfo['avatar']=$info['savename'];
			$Opadmin->updateinfo($datainfo);		//更新头像

			$username=$Opadmin->getUsername();
			A('Config')->add_log('更新头像-'.$username);	//写入日志
			$this->ajaxReturn($info['savename']);
		}
	}
	/*
	 * 密码修改
	 */
	public function edit_password(){
		if(IS_POST){
			$Admin=D('Admin');
			$Opadmin=new Opadmin();
			$where['id']=$Opadmin->getUserid();
			$where['password']=$Opadmin->joinmd5(I('repwd'));
			$count=$Admin->where($where)->count();
			if(!$count){
				$this->error('原始密码不正确');
			}else{
	            $data['password']=md5(I('password'));
				$whereup['id']=$Opadmin->getUserid();
				$result=$Admin->where($whereup)->save($data);
				if($result){
					A('Config')->add_log('密码修改-'.$Opadmin->getNickname());	//写入日志
					$this->success('密码修改成功',U('User/index'));
				}else{
					$this->error('密码和原始密码重复');
				}
				
			}
		}
		
	}
}
