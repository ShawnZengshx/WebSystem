<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-02-28
 * Time: 10:05
 * Func: 用于检验邮箱验证码是否正确，并将正确的用户信息录入到数据库中
 */

session_start();
include('../Mysql/MysqlConnect.php');

$stuname = $_SESSION['stuname'];
$password = $_SESSION['password'];
$id = $_SESSION['id'];
$idenid = $_SESSION['idenid'];
$email = $_SESSION['email'];
$stuface = $_SESSION['stuface'];

$emailValCode = $_POST['mailValCode'];
echo $_POST['stuname'];
if($emailValCode != $_SESSION['valCode']){
    exit("验证码错误".'<br/>');
}
$find_user_num ="select count(*) from stu";     //找到已有用户的数量，生成唯一id
$num_rs = $conn->query($find_user_num);
$num = $num_rs->fetch_assoc();
$id = (string)((int)$num['count(*)']+1);

//将用户的信息填入到数据库中
$sql_insert = "insert into stu(stuname, stupassword, stuid, stuidenid, stuemail, stuface)".
    "values('$stuname', '$password', '$id', '$idenid', '$email', '$stuface')";
$rs = $conn->query($sql_insert);
if($rs){
    $conn->close();
    session_destroy();    //删除session
    exit('注册成功！点击此处<a href="../views/login.php">登录</a>');
}else{
    echo'Error 数据添加失败：'.$conn->error.'<br/>';
    $conn->close();
    echo'点击此处<a href="javascript:history.back(-1);">返回</a>';
}