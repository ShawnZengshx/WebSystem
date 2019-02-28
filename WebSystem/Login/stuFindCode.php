<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-02-28
 * Time: 17:08
 */



include("../Mysql/MysqlConnect.php");
session_start();
$find_name = $_POST['stuNameFind'];
$find_idenid = $_POST['stuIdenid'];

$_SESSION['find_name'] = $find_name;
$_SESSION['find_idenid'] = $find_idenid;  //保存学生的用户名和身份证

$find_email_sql = "select stuemail from stu where stuname ='$find_name'and stuidenid='$find_idenid' ";
$result = $conn->query($find_email_sql);
if($result ==null){
    echo '<script>alert("不存在这样的用户！");history.go(-1)</script>';
    exit;
}else{
    $info = $result->fetch_assoc();
    $email = $info['stuemail'];
    $url = "localhost:63342/System/Login/ResetCode.html";//作为重设密码的地址
    $to = $email;
    $subject = "ResetCode";
    $message = "Click to reset your code:".$url;
    mail($to,$subject,$message);
    $conn->close();
    exit("邮件已发送，请注意查收！");
}