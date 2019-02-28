<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-02-27
 * Time: 19:26
 */


session_start();
if($_GET['action']=="logout"){
    unset($_SESSION['stuname']);
    unset($_SESSION['stuid']);
    echo '注销登录成功！点击此处<a href="login.html">重新登录</a>';
    exit;
}

if(!isset($_POST['login'])){
    exit('非法访问');
}
$stuname = htmlspecialchars($_POST['stuname']);
$stupassword = $_POST['stupassword'];
include("../Mysql/MysqlConnect.php");
$check_query = "select * from stu where stuname = '$stuname' and stupassword=
'$stupassword' limit 1 ";
$result = $conn->query($check_query);
$row = mysqli_fetch_assoc($result);
$conn->close();
if($stuname==null || $stupassword==null){
    echo "用户名或者密码不能为空！".'<a href="login.html">点此重新登录</a>';
    exit;

}elseif($stuname == $row['stuname'] && $stupassword==$row['stupassword']){
    $_SESSION['stuname'] = $stuname;
    $_SESSION['stuid'] = $row['stuid'];
    echo $stuname,' 欢迎登录'.'<br/>';
    echo '3秒后将跳转到学生界面 <meta http-equiv="Refresh" content="3;URL=../Stu/stuinfo.php"><br/>';
    echo '点击此处 <a href="login.php?action=logout">注销</a> 登录<br/>';
    exit;
}else{
    exit('登录失败，点击此处<a href="javascript:history.back(-1)">返回</a> 重试');
}

?>