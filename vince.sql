# Host: localhost  (Version: 5.5.53)
# Date: 2017-06-19 14:45:38
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "card_admin"
#

DROP TABLE IF EXISTS `card_admin`;
CREATE TABLE `card_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `nickname` varchar(20) NOT NULL COMMENT '昵称',
  `avatar` varchar(255) NOT NULL COMMENT '用户头像，相对于upload/avatar目录',
  `password` char(32) NOT NULL COMMENT '密码',
  `phone` bigint(11) NOT NULL COMMENT '手机号码',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '用户状态 3：锁定； 1：正常 ；2：未验证',
  `regtime` int(11) NOT NULL COMMENT '注册时间',
  `loginip` varchar(20) NOT NULL COMMENT '最近一次登陆ip',
  `logintime` int(11) NOT NULL COMMENT '最近一次登陆时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户表';

#
# Data for table "card_admin"
#

/*!40000 ALTER TABLE `card_admin` DISABLE KEYS */;
INSERT INTO `card_admin` VALUES (1,'admin','九幽','','b7a1b6d08af8f9fbc5c009889bb4b165',0,'jian34long@163.com',1,1497332555,'127.0.0.1',1497853490),(4,'JIUYOU','游帝','','b7a1b6d08af8f9fbc5c009889bb4b165',0,'1547560934@qq.com',1,1497513521,'127.0.0.1',1497853475);
/*!40000 ALTER TABLE `card_admin` ENABLE KEYS */;

#
# Structure for table "card_auth_group"
#

DROP TABLE IF EXISTS `card_auth_group`;
CREATE TABLE `card_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '' COMMENT '分组名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `rules` char(80) NOT NULL DEFAULT '' COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户组表';

#
# Data for table "card_auth_group"
#

/*!40000 ALTER TABLE `card_auth_group` DISABLE KEYS */;
INSERT INTO `card_auth_group` VALUES (1,'超级管理员',1,'1,2,4,5,6,7,8,9,24,3,10,11,12,13,14,20,21,22,23,15'),(3,'编辑',1,'1');
/*!40000 ALTER TABLE `card_auth_group` ENABLE KEYS */;

#
# Structure for table "card_auth_group_access"
#

DROP TABLE IF EXISTS `card_auth_group_access`;
CREATE TABLE `card_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户组ID',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户和组对应关系表';

#
# Data for table "card_auth_group_access"
#

/*!40000 ALTER TABLE `card_auth_group_access` DISABLE KEYS */;
INSERT INTO `card_auth_group_access` VALUES (1,1),(4,3);
/*!40000 ALTER TABLE `card_auth_group_access` ENABLE KEYS */;

#
# Structure for table "card_auth_rule"
#

DROP TABLE IF EXISTS `card_auth_rule`;
CREATE TABLE `card_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级ID',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '地址路径',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则名称',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='规则表';

#
# Data for table "card_auth_rule"
#

/*!40000 ALTER TABLE `card_auth_rule` DISABLE KEYS */;
INSERT INTO `card_auth_rule` VALUES (1,0,'Admin/Index/index','后台首页',1,1,''),(2,0,'Admin/ShowNav/config','系统设置',1,1,''),(3,0,'Admin/ShowNav/rule','权限控制',1,1,''),(4,2,'Admin/Nav/index','菜单管理',1,1,''),(6,4,'Admin/Nav/add','添加菜单',1,1,''),(7,4,'Admin/Nav/edit','修改菜单',1,1,''),(8,4,'Admin/Nav/delete','删除菜单',1,1,''),(9,4,'Admin/Nav/order','菜单排序',1,1,''),(10,3,'Admin/Rule/index','权限管理',1,1,''),(11,10,'Admin/Rule/add','添加权限',1,1,''),(12,10,'Admin/Rule/edit','修改权限',1,1,''),(13,10,'Admin/Rule/delete','删除权限',1,1,''),(14,3,'Admin/Rule/group','用户组管理',1,1,''),(15,3,'Admin/Rule/admin_user_list','管理员列表',1,1,''),(20,14,'Admin/Rule/add_group','添加用户组',1,1,''),(21,14,'Admin/Rule/edit_group','修改用户组',1,1,''),(22,14,'Admin/Rule/delete_group','删除用户组',1,1,''),(23,14,'Admin/Rule/rule_group','分配权限',1,1,''),(24,2,'Admin/Config/index','系统设置',1,1,'');
/*!40000 ALTER TABLE `card_auth_rule` ENABLE KEYS */;

#
# Structure for table "card_config"
#

DROP TABLE IF EXISTS `card_config`;
CREATE TABLE `card_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `configname` varchar(60) NOT NULL COMMENT '配置名称',
  `info` varchar(255) NOT NULL COMMENT '配置说明',
  `content` text NOT NULL COMMENT '详细内容',
  `type` varchar(255) NOT NULL COMMENT '配置类型',
  `optime` int(11) NOT NULL DEFAULT '0' COMMENT '管理员操作时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='系统设置';

#
# Data for table "card_config"
#

/*!40000 ALTER TABLE `card_config` DISABLE KEYS */;
INSERT INTO `card_config` VALUES (1,'cfg_name','网站名称','我的网站','string',1497843844),(2,'cfg_keywords','网站关键字','内容管理系统','string',1497843844),(3,'cfg_description','网站描述','这是基于Auth权限的管理系统','bstring',0),(4,'cfg_powerby','网站底部版权','CopyRight © 2016 九幽IT 版权所有 粤ICP备16060013号-1','string',1497843844),(5,'cfg_log','网站后台操作日志','Y','bool',1497843844),(6,'cfg_url','网站地址','22','string',1497843844),(7,'cfg_verify','登录验证码','N','bool',1497692908);
/*!40000 ALTER TABLE `card_config` ENABLE KEYS */;

#
# Structure for table "card_log"
#

DROP TABLE IF EXISTS `card_log`;
CREATE TABLE `card_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logtext` varchar(50) NOT NULL DEFAULT '' COMMENT '操作内容',
  `time` int(10) unsigned DEFAULT NULL COMMENT '操作时间',
  `uid` char(20) NOT NULL DEFAULT '' COMMENT '外键：操作用户id',
  `ip` char(15) NOT NULL COMMENT 'IP',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='管理员操作日志';

#
# Data for table "card_log"
#

/*!40000 ALTER TABLE `card_log` DISABLE KEYS */;
INSERT INTO `card_log` VALUES (8,'登录',1497853328,'admin','127.0.0.1'),(9,'登录',1497853475,'JIUYOU','127.0.0.1'),(10,'登录',1497853490,'admin','127.0.0.1');
/*!40000 ALTER TABLE `card_log` ENABLE KEYS */;

#
# Structure for table "card_nav"
#

DROP TABLE IF EXISTS `card_nav`;
CREATE TABLE `card_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单表',
  `pid` int(11) unsigned DEFAULT '0' COMMENT '所属菜单',
  `name` varchar(15) DEFAULT '' COMMENT '菜单名称',
  `mca` varchar(255) DEFAULT '' COMMENT '模块、控制器、方法',
  `ico` varchar(20) DEFAULT '' COMMENT 'font-awesome图标',
  `order_number` int(11) unsigned DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='菜单表';

#
# Data for table "card_nav"
#

/*!40000 ALTER TABLE `card_nav` DISABLE KEYS */;
INSERT INTO `card_nav` VALUES (1,0,'系统设置','Admin/ShowNav/config','cog',1),(2,1,'菜单管理','Admin/Nav/index','',1),(3,0,'权限控制','Admin/ShowNav/rule','expeditedssl',2),(4,3,'权限管理','Admin/Rule/index','',1),(5,3,'用户组管理','Admin/Rule/group','',2),(6,3,'管理员列表','Admin/Rule/admin_user_list','',3),(9,1,'系统设置','Admin/Config/index','',2),(10,1,'系统日志','Admin/Config/log','',NULL);
/*!40000 ALTER TABLE `card_nav` ENABLE KEYS */;
