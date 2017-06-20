<?php

namespace Common\Tag;
use Think\Template\TagLib;

class My extends TagLib {
    // 定义标签
    protected $tags=array(
        'bootstrapcss'=>array('','close'=>0),
        'bootstrapjs'=>array('','close'=>0),
        'jquery'=>array('','close'=>0),
        'font'=>array('','close'=>0),
        'nicescroll'=>array('','close'=>0),
        'site'=>array('','close'=>0),
        'admin'=>array('','close'=>0),
        'admincss'=>array('','close'=>0),
        'logincss'=>array('','close'=>0),
        'loginjs'=>array('','close'=>0),
        
    );

    /**
     * bootstrapcss引入
      
     */
    public function _bootstrapcss($tag,$content) {
        $link=<<<php
    <link rel="stylesheet" href="__COMMON__/bootstrap/3.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="__COMMON__/bootstrap/3.3.0/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="__COMMON__/font-awesome/4.7.0/css/font-awesome.min.css" />
php;
    return $link;
    }
     /*bootstrapjs引入*/
    public function _bootstrapjs($tag,$content) {
        $link=<<<php
    <script src="__COMMON__/jquery/2.0.0/jquery.min.js"></script>
    <script src="__COMMON__/bootstrap/3.3.0/js/bootstrap.min.js"></script>
php;
    return $link;
    }
    /*jquery*/
    public function _jquery($tag,$content) {
        $link=<<<php
    <script src="__COMMON__/jquery/2.0.0/jquery.min.js"></script>
php;
    return $link;
    }
    /*Font字体图标*/
    public function _font($tag,$content) {
        $link=<<<php
    <link rel="stylesheet" href="__COMMON__/font-awesome/4.7.0/css/font-awesome.min.css" />
php;
    return $link;
    }
    /*nicescroll滚动条*/
     public function _nicescroll($tag,$content) {
        $link=<<<php
    <script src="__COMMON__/Js/jquery.nicescroll.js"></script>
    <script src="__PUBLIC__/Admin/Js/main.js"></script>
php;
    return $link;
    }
    /*site框架*/
    public function _site($tag,$content) {
        $link=<<<php
    <link rel="stylesheet" href="__PUBLIC__/Admin/Css/site.min.css" />
    <script src="__PUBLIC__/Admin/Js/site.min.js"></script>
php;
    return $link;
    }
    /* Admin后台css和js*/
    public function _admin($tag,$content) {
        $link=<<<php
  	<link rel="stylesheet" href="__PUBLIC__/Admin/Css/base.css" />
  	<script src="__PUBLIC__/Admin/Js/base.js"></script>
php;
    return $link;
    }
    /* Admin后台css和js*/
    public function _admincss($tag,$content) {
        $link=<<<php
    <link rel="stylesheet" href="__PUBLIC__/Admin/Css/main.css" />
    
php;
    return $link;
    }
    /*登录css引入*/
    public function _logincss($tag,$content) {
        $link=<<<php
    <!-- CSS -->
    <link rel="stylesheet" href="__PUBLIC__/Admin/Login/css/supersized.css">
    <link rel="stylesheet" href="__PUBLIC__/Admin/Login/css/style.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="__PUBLIC__/Admin/Login/js/html5.js"></script>
    <![endif]-->
php;
    return $link;
    }

     /**
     * 登录js引入
     */
    public function _loginjs(){
        $link=<<<php
    <!-- Javascript -->
    <script src="__COMMON__/jquery/2.0.0/jquery.min.js"></script>
    <script src="__PUBLIC__/Admin/Login/js/supersized.3.2.7.min.js" ></script>
    <script src="__PUBLIC__/Admin/Login/js/supersized-init.js" ></script>
    <script src="__PUBLIC__/Admin/Login/js/scripts.js" ></script>
php;
    return $link;
    }
}