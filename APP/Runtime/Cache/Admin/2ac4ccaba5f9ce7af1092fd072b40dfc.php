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

<form class="form-inline" role="form">
  <div class="form-group">
    <label for="name">查看指定用户的日志</label>
    <input type="text" class="form-control" id="name" placeholder="请输入用户名">
  </div>
  <button type="submit" class="btn btn-default">提交</button>
</form>

<table class="table table-bordered table-striped table-hover table-condensed search_log">
	<thead>
	<tr>
		<th>操作人</th>
		<th>行为</th>
		<th>时间</th>
		<th>IP</th>
	</tr>
	</thead>
	<tbody>
	<?php if(is_array($loglist["data"])): foreach($loglist["data"] as $key=>$v): ?><tr>
		<td><?php echo ($v["uid"]); ?></td>
		<td><?php echo ($v["logtext"]); ?></td>
		<td><?php echo (date('Y-m-d H:i:s',$v["time"])); ?></td>
		<td><?php echo ($v["ip"]); ?></td>
	</tr><?php endforeach; endif; ?>
	</tbody>
	<tfoot>
	<tr>
		<td colspan="4"><?php echo ($loglist["page"]); ?></td>
	</tr>
	</tfoot>
</table>


    <script src="/Vince/Public/Common/Js/jquery.nicescroll.js"></script>
    <script src="/Vince/Public/Admin/Js/main.js"></script>
</body>
</html>