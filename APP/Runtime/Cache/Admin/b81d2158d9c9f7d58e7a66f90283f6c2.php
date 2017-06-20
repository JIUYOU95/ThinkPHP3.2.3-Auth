<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title>error</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Vince/Public/Common/bootstrap/3.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Vince/Public/Common/bootstrap/3.3.0/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/Vince/Public/Common/font-awesome/4.7.0/css/font-awesome.min.css" />
<style type="text/css">
body{font-family:"Microsoft Yahei";}
p{text-align:center;color:red;}
</style>
</head>
<body>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">
                <?php if(($msg == 3) OR ($msg == 2)): ?>登录限制
                <?php elseif($msg == 4): ?>
                    权限限制
                <?php else: ?>
                    value3<?php endif; ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php if($msg == 3): ?>尊敬的用户，你的账户已被锁定，请联系管理员解锁！
                <?php elseif($msg == 2): ?>
                    尊敬的用户，你的账户还没有完成邮箱验证，请验证后登陆！
                <?php elseif($msg == 4): ?>
                    对不起，你的权限不足，请联系管理员提高权限等级！
                <?php else: ?>
                    value3<?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
    <script src="/Vince/Public/Common/jquery/2.0.0/jquery.min.js"></script>
    <script src="/Vince/Public/Common/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
$(function() {
    $('#myModal').modal()
    keyboard: true
});
</script>
<?php if(($msg == 3) OR ($msg == 2)): ?><!-- 登录限制 -->
    <script>
    $(function() {
        $('#myModal').on('hide.bs.modal',
        function() {
            window.location='<?php echo U(index);?>';
        })
    });
    </script>
    <!-- /.modal -->
<?php elseif($msg == 4): ?>
    <!-- 权限限制 -->
    <script>
    $(function() {
        $('#myModal').on('hide.bs.modal',
        function() {
            window.location='<?php echo U(index);?>';
        })
    });
    </script>
    <!-- /.modal -->
<?php else: ?>
    value3<?php endif; ?>

</body>
</html>