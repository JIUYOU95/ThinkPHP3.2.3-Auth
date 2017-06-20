<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Opadmin;
class LoginController extends Controller{
	public function index(){
		session(null); // 清空当前的session
		$this->verify=C('cfg_verify');
		$this->display();
	}
    public function sign(){
        if(!IS_POST) halt('页面不存在');
        //验证用户和密码
        $Opadmin=new Opadmin(I('username'),I('password'));
        if($Opadmin->login()){
            //验证码
            if(C('cfg_verify')=='Y'){
                $code=I('code');
                $verify=$this->check_verify($code);
                if(!$verify){$this->error('验证码错误');}
            }
            //验证用户状态
            $username=I('username');
            $user=M('Admin')->where(array('username'=>$username))->find();
            $status=$user['status'];
            if($status==3){
                $this->redirect('Login/error_msg',array('msg'=>'3'));
            }elseif($status==2){
                $this->redirect('Login/error_msg',array('msg'=>'2'));
            }else{
                $logid=D('Log')->addData('登录');
                if(!$logid)
                    $this->error('日志记录失败');
                else
                    $this->success('登录成功',U('Admin/Index/index'));
            }
        }else{
            $this->error('用户名或密码不对');
        }
        //$this->display();
    }

	//验证码
    Public function verify(){
        $Verify = new \Think\Verify();
        $Verify->entry();
    }

    //检测输入的验证码是否正确，$code为用户输入的验证码字符串
    protected function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    //错误页面
    public function error_msg(){
        $this->msg=I('msg');
        $this->display();
    }

	//退出
	public function logout() {
 	$Opadmin=new Opadmin();
 	if($Opadmin->loginout()){
 		$this->redirect('Login/index');
 	}
 }
}
