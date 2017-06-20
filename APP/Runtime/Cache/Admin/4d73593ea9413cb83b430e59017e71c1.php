<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>Bootstrap后台</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
    <script src="/Vince/Public/Common/jquery/2.0.0/jquery.min.js"></script>
    <link rel="stylesheet" href="/Vince/Public/Common/font-awesome/4.7.0/css/font-awesome.min.css" />
  	<link rel="stylesheet" href="/Vince/Public/Admin/Css/base.css" />
  	<script src="/Vince/Public/Admin/Js/base.js"></script>
    <link rel="stylesheet" href="/Vince/Public/Admin/Css/site.min.css" />
    <script src="/Vince/Public/Admin/Js/site.min.js"></script>
<base target="main" />
</head>
<body style="overflow-y:hidden;">
<!--nav-->
    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Interest-Admin</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="getting-started.html">入门</a></li>
              <li><a href="index.html">文档</a></li>
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo ($nickname); ?> <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li><a href="#">修改密码</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo U('Login/logout');?>" target="_top"><i class="fa fa-power-off"></i> 退出</a></li>
                </ul>
              </li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
     </nav>
<!--header-->
<div class="container-fluid">
    <!--documents-->
	<div class="row row-offcanvas row-offcanvas-left">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel accordion" id="accordion">
                <li>
                	<div class="link"><i class="fa fa-navicon"></i>侧栏</div>
                </li>
                <li class="search-query">
                	<input type="text" class="form-control" placeholder="Search Something">
                </li>
                <?php if(is_array($data)): foreach($data as $key=>$v): if(empty($v['_data'])): ?><li>
        					<div class="link"><i class="fa fa-<?php echo ($v['ico']); ?>"></i><?php echo ($v['name']); ?></div>
        				</li>
        				<?php else: ?>
        				<li>
        					<div class="link"><i class="fa fa-<?php echo ($v['ico']); ?>"></i><?php echo ($v['name']); ?><i class="fa fa-chevron-down"></i></div>
        					<ul class="submenu">
        					<?php if(is_array($v['_data'])): foreach($v['_data'] as $key=>$n): ?><li><a href="<?php echo U($n['mca']);?>"><?php echo ($n['name']); ?></a></li><?php endforeach; endif; ?>
        					</ul>
        				</li><?php endif; endforeach; endif; ?>				
            </ul>
        </div>

        <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
	            <div class="panel-heading">
	                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>面板标题</h3>
	            </div>
              	<div class="panel-body">
              		<iframe src="<?php echo U('Nav/index');?>" id="main" name="main" width="100%" height="100%" frameborder="0" scrolling="yes"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
                      


</body>
</html>