<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Admin\Common\Opadmin;
class ConfigController extends AuthController {
	/*
	 *系统设置
	 */
	public function index(){
		$data=D('Config')->select();
     	$this->assign('data',$data);
     	$this->display();
	}

	/*
	 *系统配置添加
	 */
	public function add(){
		$data=I('post.');
		$Config=D('Config');
		if($Config->create()){
			$lastid=$Config->addData($data);
 			if($lastid){
 				D('Log')->addData('配置变量添加-'.I('configname'));
 				$url = C('cfg_conf');
 	 			$result=$Config->ReWriteConfig($url);
 	 			if ($result) {
 	 				$this->success('变量添加成功',U('Admin/Config/index'));
				}else{
					$this->error('配置文件写入失败');
				}
 			}else{
	 			$this->error('变量添加失败');
	 		}	 	 	
 	 	}else{
 	 		$this->error($Config->getError());
 	 	}
	}

	/*
	 *系统参数更新
	 */
	public function edit(){
		$Config=D('Config');
		if($Config->create()){
			foreach(I('post.') as $k=>$v){
		        $data["content"]=$v;
		        $data["optime"]=time();
		        $where['configname']=$k;
		        $Config->where($where)->save($data);       	
    		}
    		D('Log')->addData('系统配置更新');
			$url = C('cfg_conf');
	    	$result=$Config->ReWriteConfig($url);
	    	if ($result) {
	    		$this->success('配置修改成功',U('Admin/Config/index'));
	    	}else{
	    		$this->error('配置文件写入失败');
	    	}
		}else{
			$this->error($Config->getError());
		}
	}

	/*
	 *系统配置删除
	 */
	public function delete(){

	}

	/*
	 * 日志列表
	 */
	public function log(){
		$Log=D('Log');
		if(I('name')){
			$where['uid']=I('name');
			$this->name=I('name');
		}

		$this->loglist=$Log->getPage($where,'id desc','14');
		$this->display();
	}
	/*
	 * 日志删除
	 */
	public function alldel(){
		$ids=explode(',',substr(I('id'),1));
		foreach($ids as $key=>$id){
			if(!$this->dellog($id)){
				$this->show(0);
			}
		}
		D('Log')->addData('日志删除');
		$this->show(1);
	}
	private function dellog($id){
		if(!$id)
			return false;
		$where['id']=$id;
	 	$Log=D('Log');
	 	$count=$Log->where($where)->delete();
	 	if($count){
			return true;
	 	}else{
	 		return false;
	 	}

	}
}