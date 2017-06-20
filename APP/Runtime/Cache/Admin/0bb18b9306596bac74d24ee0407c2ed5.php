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
<ul id="myTab" class="nav nav-tabs">
	<li class="active"><a href="#lists" data-toggle="tab">菜单列表</a></li>
	<li><a href="javascript:;" onclick="add()">添加菜单</a></li>
</ul>
<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade in active" id="lists">
		<form action="<?php echo U('order');?>" method="post">
			<table class="table table-striped table-bordered table-hover table-condensed">
				<thead>
				<tr>
					<th width="8%">排序</th>
					<th>菜单名</th>
					<th>连接</th>
					<th>操作</th>
				</tr>
				</thead>
				<tbody>
				<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
					<td> <input class="form-control" style="width:40px;height:25px;margin:0 auto;" type="text" name="<?php echo ($v['id']); ?>" value="<?php echo ($v['order_number']); ?>"></td>
					<td><?php echo ($v['_name']); ?></td>
					<td><?php echo ($v['mca']); ?></td>
					<td style="text-align:center;">
						<a href="javascript:;" navId="<?php echo ($v['id']); ?>" navName="<?php echo ($v['name']); ?>" onclick="add_child(this)">添加子菜单</a> | 
						<a href="javascript:;" navId="<?php echo ($v['id']); ?>" navName="<?php echo ($v['name']); ?>" navMca="<?php echo ($v['mca']); ?>" navIco="<?php echo ($v['ico']); ?>" onclick="edit(this)">修改</a> | 
						<a href="javascript:if(confirm('确定删除？'))location='<?php echo U('Admin/Nav/delete',array('id'=>$v['id']));?>'">删除</a>
					</td>
				</tr><?php endforeach; endif; ?>
				</tbody>
				<tfoot>
				<tr>
					<td colspan="4"><input class="btn btn-success" type="submit" value="排序"></td>
				</tr>
				</tfoot>
			</table>
		</form>
	</div>
</div>

<div class="modal fade" id="myModal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
				<h4 class="modal-title" id="myModalLabel"> 添加菜单</h4>
			</div>
			<form class="form-horizontal" action="<?php echo U('Admin/Nav/add');?>" method="post"> 
			<input type="hidden" name="pid" value="0">
			<div class="modal-body">
				<div class="form-group">
				    <label for="name" class="col-sm-2 control-label">菜单名</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control"  id="name" name="name" placeholder="请输入菜单名">
				    </div>
				    <span class="col-sm-6"></span>
				</div>
				<div class="form-group">
				    <label for="mca" class="col-sm-2 control-label">链接</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="mca" name="mca" placeholder="请输入链接地址"> 
				    </div>
				    <span class="col-sm-6 control-label">模块/控制器/方法 例如 Admin/Nav/index</span>
				</div>
				<div class="form-group">
				    <label for="ico" class="col-sm-2 control-label">图标</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="ico" name="ico" placeholder="请输入图标名字">
				    </div>
				    <span class="col-sm-6 control-label">font-awesome图标 输入fa fa- 后边的即可</span>
				</div>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">提交更改</button>
            </div>
            </form>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
				<h4 class="modal-title" id="myModalLabel">修改菜单</h4>
			</div>
			<form class="form-horizontal" action="<?php echo U('Admin/Nav/edit');?>" method="post"> 
			<input type="hidden" name="id">
			<div class="modal-body">
				<div class="form-group">
				    <label for="name" class="col-sm-2 control-label">菜单名</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control"  id="name" name="name" placeholder="请输入菜单名">
				    </div>
				    <span class="col-sm-6"></span>
				</div>
				<div class="form-group">
				    <label for="mca" class="col-sm-2 control-label">链接</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="mca" name="mca" placeholder="请输入链接地址"> 
				    </div>
				    <span class="col-sm-6 control-label">模块/控制器/方法 例如 Admin/Nav/index</span>
				</div>
				<div class="form-group">
				    <label for="ico" class="col-sm-2 control-label">图标</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="ico" name="ico" placeholder="请输入图标名字">
				    </div>
				    <span class="col-sm-6 control-label">font-awesome图标 输入fa fa- 后边的即可</span>
				</div>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">提交更改</button>
            </div>
            </form>
		</div>
	</div>
</div>
<script>
// 添加菜单
function add(){
	$("input[name='name'],input[name='mca']").val('');
	$("input[name='pid']").val(0);
	$('#myModal-add').modal('show');
}
// 添加子菜单
function add_child(obj){
	var navId=$(obj).attr('navId');
	$("input[name='pid']").val(navId);
	$("input[name='name']").val('');
	$("input[name='mca']").val('');
	$("input[name='ico']").val('');
	$('#myModal-add').modal('show');
}

// 修改菜单
function edit(obj){
	var navId=$(obj).attr('navId');
	var navName=$(obj).attr('navName');
	var navMca=$(obj).attr('navMca');
	var navIco=$(obj).attr('navIco');
	$("input[name='id']").val(navId);
	$("input[name='name']").val(navName);
	$("input[name='mca']").val(navMca);
	$("input[name='ico']").val(navIco);
	$('#myModal-edit').modal('show');
}
</script>


    <script src="/Vince/Public/Common/Js/jquery.nicescroll.js"></script>
    <script src="/Vince/Public/Admin/Js/main.js"></script>
</body>
</html>