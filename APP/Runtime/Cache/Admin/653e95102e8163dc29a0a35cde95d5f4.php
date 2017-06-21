<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>main</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

    <link rel="stylesheet" href="/Vince/Public/Common/bootstrap/3.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Vince/Public/Common/bootstrap/3.3.0/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/Vince/Public/Common/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="/Vince/Public/Common/jquery/2.0.0/jquery.min.js"></script>
    <script src="/Vince/Public/Common/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Vince/Public/Admin/Css/main.css" />
    
</head>
<body>
<ul class="nav nav-tabs">
	<li><a href="<?php echo U('Admin/Rule/admin_user_list');?>">管理员列表</a></li>
	<li class="active"><a data-toggle="tab" href="#menu1">修改管理员</a></li>
</ul>

<div class="tab-content">
	<div id="menu1" class="tab-pane fade in active">
		<form class="form-inline" method="post"> 
			<input type="hidden" name="id" value="<?php echo ($user_data['id']); ?>">
			<table class="table table-striped table-bordered table-hover table-condensed">
				<tr>
					<th>管理组</th>
					<td>
						<?php if(is_array($data)): foreach($data as $key=>$v): ?><label for="<?php echo ($v['id']); ?>"><?php echo ($v['title']); ?></label>
							<input class="xb-icheck" type="checkbox" name="group_ids[]" value="<?php echo ($v['id']); ?>" id="<?php echo ($v['id']); ?>" <?php if(in_array(($v['id']), is_array($group_data)?$group_data:explode(',',$group_data))): ?>checked="checked"<?php endif; ?> > &emsp;<?php endforeach; endif; ?>
					</td>
				</tr>
				<tr>
					<th>用户名</th>
					<td><input class="form-control" type="text" name="username" value="<?php echo ($user_data['username']); ?>" disabled><span class="text-danger">&emsp;登录账号，填写后不可修改</span></td>
				</tr>
				<tr>
					<th>昵称</th>
					<td><input class="form-control" type="text" name="nickname" value="<?php echo ($user_data['nickname']); ?>"><span class="text-danger">&emsp;显示的名称</span></td>
				</tr>
				<tr>
					<th>手机号</th>
					<td><input class="form-control" type="text" name="phone" value="<?php echo ($user_data['phone']); ?>"></td>
				</tr>
				<tr>
					<th>邮箱</th>
					<td><input class="form-control" type="text" name="email" value="<?php echo ($user_data['email']); ?>"></td>
				</tr>
				<tr>
					<th>初始密码</th>
					<td><input class="form-control" type="password" name="password"><span class="text-danger">&emsp;如不改密码；留空即可</span></td>
				</tr>
				<tr>
					<th>状态</th>
					<td>
						<div class="btn-group" data-toggle="buttons">
						    <label class="btn btn-primary <?php if(($user_data['status']) == "1"): ?>active<?php endif; ?>">
						        <input type="radio" name="status" value="1" <?php if(($user_data['status']) == "1"): ?>checked<?php endif; ?>> 允许登录
						    </label>
						    <label class="btn btn-primary <?php if(($user_data['status']) == "3"): ?>active<?php endif; ?>">
						        <input type="radio" name="status" value="3" <?php if(($user_data['status']) == "3"): ?>checked<?php endif; ?>> 禁止登录
						    </label>
						</div>
					</td>
				</tr>
				<tr>
					<th></th>
					<td> <input class="btn btn-success" type="submit" value="修改"></td>
				</tr>
			</table>
		</form>
	</div>
</div>



    <script src="/Vince/Public/Common/Js/jquery.nicescroll.js"></script>
    <script src="/Vince/Public/Admin/Js/main.js"></script>
</body>
</html>