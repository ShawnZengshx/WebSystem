<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-03-01
 * Time: 10:54
 */

session_start();
include("../Mysql/MysqlConnect.php");
$logid = $_SESSION['stuid'];
$logout = "update stu set logstatus='0' where stuid = '$logid'";
$res = mysqli_query($conn, $logout);
if($res){
    session_destroy();
    $conn->close();
    echo '<script>alert("注销登录成功，即将返回登录界面");window.setTimeout(window.location.href="../views/login.php",2000)</script>';
    exit;
}