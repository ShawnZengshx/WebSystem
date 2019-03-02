<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LOGIN</title>

    <!-- Bootstrap core CSS -->
    <link href="../resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../resource/signin.css" rel="stylesheet">

</head>
<?php require '../controllers/loginTest.php' ?>
<body>
<div class="container ">
    <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
        <div class="container-fluid">
            <div class="navbar-header ">
                <a href="#" class="navbar-brand center-block ">Welcome</a>
            </div>
            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav" id="mytab">
                    <li ><a href="Welcom.html">Home</a></li>
                    <li class="active"><a href="#">Student</a></li>
                    <li><a href="adminLogin.html">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="inputPassword" class="form-control" placeholder="Password" required >
        <input type="text" name="captcha" class="form-control" placeholder="验证码" required >
        <img src="../controllers/verification.php" onclick="this.src='../controllers/verification.php'"><?php echo $captchaErr?>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    </form>
</div>

<script>
    $("#mytab a").click(function (e) {
        $(this).tab("show");
    })

</script>


<div class="container">


</div> <!-- /container -->

</body>
</html>


