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
	<li class="active"><a href="#lists" data-toggle="tab">权限列表</a></li>
	<li><a href="javascript:;" onclick="add()">添加权限</a></li>
</ul>

<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade in active" id="home">
		<table class="table table-striped table-bordered table-hover table-condensed">
			<tr>
				<th>权限名</th>
				<th>权限</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
				<td><?php echo ($v['_name']); ?></td>
				<td><?php echo ($v['name']); ?></td>
				<td> <a href="javascript:;" ruleId="<?php echo ($v['id']); ?>" onclick="add_child(this)">添加子权限</a> | <a href="javascript:;" ruleId="<?php echo ($v['id']); ?>" ruleName="<?php echo ($v['name']); ?>" ruleTitle="<?php echo ($v['title']); ?>" onclick="edit(this)">修改</a> | <a href="javascript:if(confirm('确定删除？'))location='<?php echo U('Admin/Rule/delete',array('id'=>$v['id']));?>'">删除</a></td>
			</tr><?php endforeach; endif; ?>
		</table>
	</div>
</div>

<div class="modal fade" id="myModal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
				<h4 class="modal-title" id="myModalLabel"> 添加权限</h4>
			</div>
			<form class="form-horizontal" action="<?php echo U('Admin/Rule/add');?>" method="post"> 
			<input type="hidden" name="pid" value="0">
			<div class="modal-body">
				<div class="form-group">
				    <label for="title" class="col-sm-2 control-label">权限名</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control"  id="title" name="title" placeholder="请输入权限名">
				    </div>
				    <span class="col-sm-6"></span>
				</div>
				<div class="form-group">
				    <label for="name" class="col-sm-2 control-label">权限</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control"  id="name" name="name" placeholder="请输入权限">
				    </div>
				    <span class="col-sm-6 control-label">模块/控制器/方法 例如 Admin/Rule/index</span>
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
				<h4 class="modal-title" id="myModalLabel"> 修改权限</h4>
			</div>
			<form class="form-horizontal" action="<?php echo U('Admin/Rule/edit');?>" method="post">
			<input type="hidden" name="id">
			<div class="modal-body">
				<div class="form-group">
				    <label for="title" class="col-sm-2 control-label">权限名</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control"  id="title" name="title" placeholder="请输入权限名">
				    </div>
				    <span class="col-sm-6"></span>
				</div>
				<div class="form-group">
				    <label for="name" class="col-sm-2 control-label">权限</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control"  id="name" name="name" placeholder="请输入权限">
				    </div>
				    <span class="col-sm-6 control-label">模块/控制器/方法 例如 Admin/Rule/index</span>
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
	$("input[name='title'],input[name='name']").val('');
	$("input[name='pid']").val(0);
	$('#myModal-add').modal('show');
}

// 添加子菜单
function add_child(obj){
	var ruleId=$(obj).attr('ruleId');
	$("input[name='pid']").val(ruleId);
	$("input[name='title']").val('');
	$("input[name='name']").val('');
	$('#myModal-add').modal('show');
}

// 修改菜单
function edit(obj){
	var ruleId=$(obj).attr('ruleId');
	var ruletitle=$(obj).attr('ruletitle');
	var ruleName=$(obj).attr('ruleName');
	$("input[name='id']").val(ruleId);
	$("input[name='title']").val(ruletitle);
	$("input[name='name']").val(ruleName);
	$('#myModal-edit').modal('show');
}
</script>


    <script src="/Vince/Public/Common/Js/jquery.nicescroll.js"></script>
    <script src="/Vince/Public/Admin/Js/main.js"></script>
</body>
</html>