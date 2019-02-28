<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>REGISTER</title>
    <style>
        .error {color: #FF0000}
    </style>
    <!-- Bootstrap core CSS -->
    <link href="../resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php

    require '../controllers/registerTest.php';

?>
<?php

?>

<body>
<p><span class="error">* 必填字段。</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Password:<br>
            <input type="password" name="password">
        <span class="error">*<?php echo $passwordErr;?></span>
        <br>
        Phone:<br>
        <input type="text" name="phone">
        <span class="error">*<?php echo $phoneErr;?></span>
        <br>
        Email:<br>
        <input type="email" name="email">
        <span class="error">*<?php echo $emailErr;?></span>
        <br>
        <button class="btn btn-primary" type="submit">submit</button>
    </form>
<?php echo  $_POST["phone"]; ?>
</body>
<?php
/**
 * Created by PhpStorm.
 * User: 张皖渝
 * Date: 2/27/2019
 * Time: 6:51 PM
 */