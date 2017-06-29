<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Admin\Common\Opadmin;
class NavController extends AuthController {
    /**
	 * 菜单列表
	 */
	public function index(){
		$data=D('Nav')->getTree('tree','order_number,id');
		$this->assign('data',$data);
		$this->display();
	}
	/**
	 * 添加菜单
	 */
	public function add(){
		$data=I('post.');
		unset($data['id']);
		$result=D('Nav')->addData($data);
		if ($result) {
			A('Config')->add_log('添加菜单-'.I('name'));
			$this->success('添加成功',U('Admin/Nav/index'));
		}else{
			$this->error('添加失败');
		}
	}

	/**
	 * 修改菜单
	 */
	public function edit(){
		$data=I('post.');
		$map=array(
			'id'=>$data['id']
			);
		$result=D('Nav')->editData($map,$data);
		if ($result) {
			A('Config')->add_log('修改菜单-'.I('name'));
			$this->success('修改成功',U('Admin/Nav/index'));
		}else{
			$this->error('修改失败');
		}
	}

	/**
	 * 删除菜单
	 */
	public function delete(){
		$id=I('get.id');
		$map=array(
			'id'=>$id
			);
		$result=D('Nav')->deleteData($map);
		if($result){
			A('Config')->add_log('删除菜单-'.I('name'));
			$this->success('删除成功',U('Admin/Nav/index'));
		}else{
			$this->error('请先删除子菜单');
		}
	}
	/**
	 * 菜单排序
	 */
	public function order(){
		$data=I('post.');
		$result=D('Nav')->orderData($data);
		if ($result) {
			A('Config')->add_log('菜单排序');
			$this->success('排序成功',U('Admin/Nav/index'));
		}else{
			$this->error('排序失败');
		}
	}
}
