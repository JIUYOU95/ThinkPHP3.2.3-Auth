<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>登录后台</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
    <!-- CSS -->
    <link rel="stylesheet" href="/Vince/Public/Admin/Login/css/supersized.css">
    <link rel="stylesheet" href="/Vince/Public/Admin/Login/css/style.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="/Vince/Public/Admin/Login/js/html5.js"></script>
    <![endif]-->
</head>
<body>

<div class="page-container">
    <h1>登录(Login)</h1>
    <form action="<?php echo U('sign');?>" method="post">
        <input type="text" name="username" class="username" placeholder="请输入您的用户名！">
        <input type="password" name="password" class="password" placeholder="请输入您的用户密码！">
        <?php if($verify == 'Y'): ?><div class="verify">
            <input type="text" name="code" placeholder="请输入验证码！"  /><img src='<?php echo U('Login/verify');?>' onclick='this.src=this.src+"?"+Math.random()' title="点击刷新" />
        </div>
        <?php else: endif; ?>
        <button type="submit" class="submit_button">登录</button>
        <div class="error"><span>+</span></div>
    </form>
    <div class="connect">
        <p>快捷</p>
        <p>
            <a class="facebook" href=""></a>
            <a class="twitter" href=""></a>
        </p>
    </div>
</div>
    <!-- Javascript -->
    <script src="/Vince/Public/Common/jquery/2.0.0/jquery.min.js"></script>
    <script src="/Vince/Public/Admin/Login/js/supersized.3.2.7.min.js" ></script>
    <script src="/Vince/Public/Admin/Login/js/supersized-init.js" ></script>
    <script src="/Vince/Public/Admin/Login/js/scripts.js" ></script>

</body>
</html>