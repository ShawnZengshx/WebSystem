<?php
$captcha = $email = $password = "";
$captchaErr = "";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
    $captcha = $_POST["captcha"];   //验证码
    $email = $_POST["inputEmail"];  //用户名
    $password = $_POST['inputPassword'];

    include("../Mysql/MysqlConnect.php");
    $check_query = "select * from stu where stuemail = '$email' and stupassword='$password' limit 1 ";
    $result = $conn->query($check_query);
    $row = mysqli_fetch_assoc($result);
    if ($_SESSION["verification"] == $captcha) {

    } else {
        $captchaErr = "验证码错误！";
    }
    if($row['logstatus'] == "1"){
        $conn->close();
        echo '<script>alert("用户已经登录，请勿重复登录!");history.go(-1)</script>';
        exit;
    }
    elseif ($email == $row['stuemail'] && $password == $row['stupassword']) {
        $_SESSION['stuname'] = $row['stuname'];
        $_SESSION['stuid'] = $row['stuid'];
        $id = $row['stuid'];
        $update_status = "update stu set logstatus = '1' where stuid = '$id'";
        $res = mysqli_query($conn,$update_status);
        if($res){
            $conn->close();

            echo '<script>alert("欢迎登录，即将跳转到学生界面！");window.setTimeout(window.location.href="../Stu/stuinfo.php",2000)</script>';
            //echo $stuname,' 欢迎登录'.'<br/>';
            //echo '3秒后将跳转到学生界面 <meta http-equiv="Refresh" content="3;URL=../Stu/stuinfo.php"><br/>';
            //echo '点击此处 <a href="../views/login.php?action=logout">注销</a> 登录<br/>';
            exit;
        }
    }else{
        exit('登录失败，点击此处<a href="javascript:history.back(-1)">返回</a> 重试');
    }
}

/**
 * Created by PhpStorm.
 * User: 张皖渝
 * Date: 2/28/2019
 * Time: 2:09 PM
 */