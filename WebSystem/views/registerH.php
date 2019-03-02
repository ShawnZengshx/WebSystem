<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>REGISTER</title>
    <style>
        .error {color: #FF0000}
    </style>
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/bootstrap/js/bootstrap.min.js"></script>
    <link href="../resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php

require '../controllers/registerTest.php';

?>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">
                用户注册基本信息
            </h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="row" >
                <div class="col-md-6">
                    <div class="col-md-offset-6">

                        用户名<input type="text" /> <span class="help-block"></span>
                        email<input type="text" name="email"/><span class="error" >*<?php echo $emailErr;?></span>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="col-md-6">
                            电话<input type="text" name="phone"/><span class="error">*<?php echo $phoneErr;?></span>
                            <span class="help-block"></span>
                            身份证<input type="text" /> <span class="help-block"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-3">
                            地址<input type="text" name="address"/> <span class="help-block"></span>
                            <label>密码</label><input type="password" name="password"/> <span class="error">*<?php echo $passwordErr;?></span>
                            <span class="help-block"></span>
                            <label>再次确认密码</label><input type="password" name="repassword"/> <span class="error">*<?php echo $repasswordErr;?></span>
                    <br><button class="btn btn-large btn-success" type="submit">按钮</button>
                    <p><span class="error">* 必填字段。</span>
                </div>
            </div>
                <form>
        </div>
    </div>
</div>
</body>