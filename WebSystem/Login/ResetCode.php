<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-02-28
 * Time: 18:45
 * Func: 进行用户密码的重设
 */

include("../Mysql/MysqlConnect.php");
session_start();
$stuname = $_SESSION['find_name'];
$stuidenid = $_SESSION['find_idenid'];

$new_pwd = $_POST['resetCode'];

$sql = "update stu set stupassword = '$new_pwd' where stuname='$stuname' and stuidenid='$stuidenid'";
$res = $conn->query($sql);
if($res){
    $conn->close();
    session_destroy();
    echo "重设密码成功！".'<a href="login.html">点击这里登录</a>';
    exit;
}else{
    echo"重设失败".$conn->error;
    exit;
}
