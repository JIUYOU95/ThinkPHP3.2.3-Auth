<?php
return array(
	//'配置项'=>'配置值'

	// 设置禁止访问的模块列表
	'MODULE_DENY_LIST'	=>  array('Common','Runtime'),
	// 设置允许访问列表
	'MODULE_ALLOW_LIST' =>  array('Home','Admin'),
	// 默认模块
	'DEFAULT_MODULE'    =>  'Home',

	
	

	'TMPL_PARSE_STRING'  =>array(   
		'__PUBLIC__' => __ROOT__.'/Public', 	//项目资源路径
		'__COMMON__' => __ROOT__.'/Public/Common',  //公共资源路径     
		'__UPLOADS__'=> __ROOT__.'/Public/Uploads',	//上传路径
	),
	'TAGLIB_BUILD_IN' => 'Cx,Common\Tag\My',		// 加载自定义标签
	'LOAD_EXT_CONFIG' => 'db,webconfig',   					// 加载网站设置文件
);
