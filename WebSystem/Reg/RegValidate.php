<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-02-28
 * Time: 10:05
 * Func: 检测用户输入的用户名、邮箱以及身份证是否是重复的
 */

include('../Mysql/MysqlConnect.php');
session_start();
$stuname = $_POST['stuname'];       //用户名
$password = $_POST['stupassword'];  //密码
$email = $_POST['email'];       //电子邮箱
//$id = $_POST['stuid'];
$idenid = $_POST['stuidenid'];  //身份证
$stuface = $_POST['stuface'];   //真实姓名

//保存用户数据到服务器
$_SESSION['stuname'] = $stuname;
$_SESSION['password'] = $password;
$_SESSION['email'] = $email;
$_SESSION['idenid'] = $idenid;
$_SESSION['stuface'] = $stuface;


//查询用户名是否已经存在
$sql_query = mysqli_query($conn, "select * from stu where stuname='$stuname' limit 1");
if(mysqli_fetch_array($sql_query)){
    echo'错误：用户名',$stuname,'已存在.<a href ="javascript:history.back(-1);">返回</a>';
    exit;
}

//查询身份证是否已经被注册
$stuidenid = mysqli_query($conn,"select * from stu where stuidenid = '$idenid' limit 1");
if(mysqli_fetch_array($stuidenid)){
    echo '该身份证已经注册'.'<a href="javascript:history.back(-1)"></a>';
    exit;
}


$mail_query = mysqli_query($conn,"select * from stu where stuemail = '$email' limit 1");
if(mysqli_fetch_array($mail_query)){
    echo'错误：邮箱',$email,'已存在.<a href ="javascript:history.back(-1);">返回</a>';
    exit;
}
$conn->close();  //关闭数据连接
function sendemail($email){
    $to = $email;
    $subject = "验证码";
    $message = "";
    $code="123456780abcedfghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $length = strlen($code);
    for($i=0;$i<8;$i++){
        $cd = mt_rand(0,$length -1);
        $message .= $code[$cd];
    }
    //$message = "9kiwq1";
    $_SESSION['valCode'] = $message;    //保存密钥
    mail($to,$subject,$message);
    echo "验证码已发送至邮箱，请注意查收！".'<br/>';
}

function resendEmail($email){
    unset($_SESSION['valCode']); //删除之前保存的密钥
    sendemail($email);
}
sendemail($email);

echo "2秒后将自动跳转到验证界面".'<meta http-equiv="Refresh" content="2;URL=validate.html" />';
exit;

