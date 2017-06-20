<?php
namespace Admin\Model;
use Common\Model\BaseModel;
use Admin\Common\Opadmin;
Class LogModel extends BaseModel{
	protected $_auto = array (
		array('time','time',1,'function'),
		array('ip','get_client_ip',1,'function'), 	 
		array('uid','getUid',1,'callback'), 
	);

	protected function getUid(){
		$Opadmin=new Opadmin();
		$uid=$Opadmin->getUsername();
		return $uid;
	}
	/**
     * 添加日志
     */
    public function addData($content){
    	$Opadmin=new Opadmin();
	 	if(C('cfg_log')=='N')
	 		return true;
        // 对data数据进行验证
        if(!$data=$this->create()){
            // 验证不通过返回错误
            return false;
        }else{
            //$data['uid']=$Opadmin->getUserid();
		 	//$data['time']=time();
			//$data['ip']=get_client_ip();
		 	$data['logtext']=$content;
			$result=$this->add($data);
            return $result;
        }
    }
}
?>