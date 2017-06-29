<?php 
/**
 *后台基类验证
 */
namespace Admin\Common;
class Opadmin{
	private $username;//用户名
	private $password;//密码
	private $userid;  //用户id
	private $nickname;//昵称
	private $kUserid='userid';
	private $kUsername='username';
	private $kNickname='nickname';

	/**
     * +----------------------------------------------------------
     * 构造函数，对象初始化
     * +----------------------------------------------------------
     * @param string  $username  用户名
     * @param string  $password  密码
     * +----------------------------------------------------------
     */
	Public function __construct($username='',$password=''){
		$this->cfg_prefix=C('cfg_prefix');
		//$this->cfg_prefix='card_';
		//给保存SESSION的成员变量名称加上前缀
		$this->kUserid=$this->cfg_prefix.$this->kUserid;
		$this->kNickname=$this->cfg_prefix.$this->kNickname;
		$this->kUsername=$this->cfg_prefix.$this->kUsername;
		//用于登陆的时候初始化变量
		$this->username=$username;
		$this->password=$this->joinmd5($password);
		//判断session是否存在，存在就赋值
		if(isset($_SESSION[$this->kUserid])&&$_SESSION[$this->kUserid]!='')
			$this->userid=$_SESSION[$this->kUserid];
		if(isset($_SESSION[$this->kNickname])&&$_SESSION[$this->kNickname]!='')
			$this->nickname=$_SESSION[$this->kNickname];
	 	if(isset($_SESSION[$this->kUsername])&&$_SESSION[$this->kUsername]!='')
			$this->username=$_SESSION[$this->kUsername];
	}

	/**
     * +----------------------------------------------------------
     * 用户登陆
     * @return bool
     * +----------------------------------------------------------      
     * +----------------------------------------------------------
     */
	public function login(){
		$Admin=D('Admin');
		$where['username']=$this->username;
		$where['password']=$this->password;
		$data=$Admin->where($where)->find();
		if($data){
			//登陆成功赋值
			$this->userid	=$data['id'];
			$this->nickname	=$data['nickname'];
			$this->SaveSession();
			//更新登陆信息
			$data['loginip']=get_client_ip();

			if($this->updateinfo($data))
				return true;
			else
				return false;
			
		}else{
			return false;
		}
	}
	/**
     * +----------------------------------------------------------
     * 保存session
     * +----------------------------------------------------------      
     * +----------------------------------------------------------
     */
	private function SaveSession(){
		$_SESSION[$this->kUserid]	=$this->userid;
		$_SESSION[$this->kNickname]	=$this->nickname;
		$_SESSION[$this->kUsername]	=$this->username;
	}

	/**
     * +----------------------------------------------------------
     * 判断用户是否登陆
     * @return bool
     * +----------------------------------------------------------      
     * +----------------------------------------------------------
     */
	 public function islogin(){
	 	if($this->userid!='')
	 		return true;
	 	else
	 		return false;
	 }
	 /**
     * +----------------------------------------------------------
     * 判断密码是否正确
     * @param string  $pwd   要匹配的密码
     * @return int    $count 
     * +----------------------------------------------------------      
     * +----------------------------------------------------------
     */
     public function  issame($pwd){
     	$Admin=D('Admin');
     	$where['id']=$this->userid;
		$where['password']=$this->joinmd5($pwd);
		$count=$Admin->where($where)->count();
		return $count;
     }
    /**
     * +----------------------------------------------------------
     * 更新用户信息
     *@param array  $datainfo  更新数组
     *@return bool
     * +----------------------------------------------------------      
     * +----------------------------------------------------------
     */
	public function updateinfo($datainfo){
		$Admin=D('Admin');
		$datainfo['logintime']=time();
		$where['id']=$this->userid;
		$count=$Admin->where($where)->save($datainfo);
		if($count>0)
			return true;
		else
			return false;
	}
	/**
     * +----------------------------------------------------------
     * 用户退出
     *@return bool
     * +----------------------------------------------------------      
     * +----------------------------------------------------------
     */
	public function loginout(){
		$this->userid="";
		$this->nickname="";
		$this->username="";
		//$this->purviews="";
		unset($_SESSION[$this->kUserid]);
		unset($_SESSION[$this->kNickname]);
		unset($_SESSION[$this->kUsername]);
		return true;
	}
	/**
     * +----------------------------------------------------------
     * 用户锁屏
     *@return bool
     * +----------------------------------------------------------      
     * +----------------------------------------------------------
     */
	public function loginlock(){
		$this->userid="";
		unset($_SESSION[$this->kUserid]);
		return true;
	}
	/**
     * +----------------------------------------------------------
     * md5加密
     *@return md5加密后字符串
     * +----------------------------------------------------------      
     * +----------------------------------------------------------
     */
	public function joinmd5($pwd){
		return md5($pwd);
	}
	/**
     * +----------------------------------------------------------
     *获得username
     *@return 字符串
     * +----------------------------------------------------------      
     * +----------------------------------------------------------
     */
	 public function getUsername(){
	   return $this->username;
	 }
	 /**
     * +----------------------------------------------------------
     *获得userid
     *@return 字符串
     * +----------------------------------------------------------      
     * +----------------------------------------------------------
     */
	 public function getUserid(){
	   return $this->userid;
	 }
	 /**
     * +----------------------------------------------------------
     *获得nickname
     *@return 字符串
     * +----------------------------------------------------------      
     * +----------------------------------------------------------
     */
	 public function getNickname(){
	   return $this->nickname;
	 }

	/**
     * +----------------------------------------------------------
     *获得所有配置
     *@return array
     * +----------------------------------------------------------      
     * +----------------------------------------------------------
     */
    public function config(){
        $data=array(
            'title'=>C('cfg_name'),
            'keyword'=>C('cfg_keywords'),
            'description'=>C('cfg_description'),
            'powerby'=>C('cfg_powerby'),
            'url'=>C('cfg_url'),
        );
        return $data;
    }
}