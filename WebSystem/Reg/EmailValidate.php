
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Validation</title>
    <!-- Bootstrap core CSS -->
    <link href="../resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../resource/js/jquery-3.3.1.min.js"></script>
    <script src="../resource/bootstrap/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="../resource/signin.css" rel="stylesheet">




    <!--[endif]-->
</head>

<body>
<?php
require "WriteSql.php"
?>
<div class="container">

    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
        <h2 class="form-signin-heading">Validate your Email</h2>
        <label for="inputCode" class="sr-only">Verify Code</label>
        <input type="text" id="inputCode" class="form-control" placeholder="Verify Code"  name="mailValCode">
        <button class="btn btn-sm btn-primary btn-block" type="submit">Validate</button>
    </form>

</div> <!-- /container -->


</body>
</html>
