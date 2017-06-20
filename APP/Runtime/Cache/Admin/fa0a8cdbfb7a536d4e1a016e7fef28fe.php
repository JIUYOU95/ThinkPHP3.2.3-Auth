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
	<li class="active"><a data-toggle="tab" href="#home">系统基本参数</a></li>
	<li><a data-toggle="tab" href="#menu1">添加系统设置</a></li>
</ul>

<div class="tab-content">
	<div id="home" class="tab-pane fade in active">
		<table class="table table-bordered table-striped table-hover table-condensed" border="1">
			<thead>
			<tr>
				<th>参数说明</th>
				<th>参数值</th>
				<th>变量名</th>
				<!--<th>操作</th>-->
			</tr>
			</thead>
			<form action="<?php echo U('edit');?>" method="post">
			<tbody>
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
				<td><?php echo ($v['info']); ?></td>
				<td>
					<?php if($v['type'] == 'string'): ?><input name="<?php echo ($v['configname']); ?>" type="text" id="<<?php echo ($v['configname']); ?>>"  value="<?php echo ($v['content']); ?>" class="form-control" />
		             <?php elseif($v['type'] == 'number'): ?>
		                <input name="<?php echo ($v['configname']); ?>" type="text" id="<<?php echo ($v['configname']); ?>>"  value="<?php echo ($v['content']); ?>" class="form-control" />
		            <?php elseif($v['type'] == 'bstring'): ?>
		            	<textarea name="<<?php echo ($v['configname']); ?>>" id="<<?php echo ($v['configname']); ?>>" class="form-control"><?php echo ($v['content']); ?></textarea>
		            <?php elseif($v['type'] == bool): ?>
		            	<div class="btn-group" data-toggle="buttons">
						    <label class="btn btn-primary <?php if($v['content'] == 'Y'): ?>active<?php endif; ?>">
						        <input type="radio" name="<?php echo ($v['configname']); ?>" value="Y"> 开启
						    </label>
						    <label class="btn btn-primary <?php if($v['content'] == 'N'): ?>active<?php endif; ?>">
						        <input type="radio" name="<?php echo ($v['configname']); ?>" value="N"> 关闭
						    </label>
						</div><?php endif; ?>
				</td>
				<td style="text-align:center;"><?php echo ($v['configname']); ?></td>
				<!--<td style="text-align:center;"><a href="">删除</a></td>-->
			</tr><?php endforeach; endif; ?>
			</tbody>
			<tfoot>
			<tr>
				<td colspan="3"><input class="btn btn-success" type="submit" value="更改信息"></td>
			</tr>
			</tfoot>
			</form>
		</table>
	</div>
	<div id="menu1" class="tab-pane fade">
		<form class="form-inline" action="<?php echo U('add');?>" method="post">
			<table class="table table-striped table-bordered table-hover table-condensed">
				<tr>
					<th>变量名</th>
					<td> <input class="form-control" type="text" name="configname"></td>
				</tr>
				<tr>
					<th>参数值</th>
					<td> <input class="form-control" type="text" name="content"></td>
				</tr>
				<tr>
					<th>参数说明</th>
					<td> <input class="form-control" type="text" name="info"></td>
				</tr>
				<tr>
					<th>参数类型</th>
					<td>
						<div class="btn-group" data-toggle="buttons">
						    <label class="btn btn-primary active">
						        <input type="radio" name="type" value="string" checked> 文本
						    </label>
						    <label class="btn btn-primary">
						        <input type="radio" name="type" value="bstring"> 多行文本
						    </label>
						    <label class="btn btn-primary">
						        <input type="radio" name="type" value="bool"> 布尔(Y/N)
						    </label>
						    <label class="btn btn-primary">
						        <input type="radio" name="type" value="number"> 数字
						    </label>
						</div>
					</td>
				</tr>
				<tr>
					<th></th>
					<td> <input class="btn btn-success" type="submit" value="添加"></td>
				</tr>
			</table>
		</form>
	</div>
</div>



    <script src="/Vince/Public/Common/Js/jquery.nicescroll.js"></script>
    <script src="/Vince/Public/Admin/Js/main.js"></script>
</body>
</html>