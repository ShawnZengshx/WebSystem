<?php
$phone = $email = $password = $repassword = "";
$phoneErr = $emailErr = $passwordErr  = $repasswordErr = "";
$success = true;
session_start();
include("../Mysql/MysqlConnect.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $password = test_input($_POST["password"]);
    $phone = test_input($_POST["phone"]);
    $email = test_input($_POST["email"]);
    $repassword = test_input($_POST["repassword"]);

    $emailpattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";

    if(empty($_POST["phone"])){
        $phoneErr = "电话是必需的";
        $success = false;
    }
    if(empty($_POST['email'])){
        $emailErr = "邮箱是必需的";
        $success = false;
    }
    if(empty($_POST["password"])){
        $passwordErr = "密码是必需的";
        $success = false;
    }
    if(!preg_match("/^1[34578]\d{9}/", $phone)){
        $phoneErr = "手机格式不对，请重新输入";
        $success = false;
    }
    if(!preg_match($emailpattern, $email)){
        $emailErr = "邮件格式不对，请重新输入";
        $success = false;
    }
    if(strlen($_POST["password"])<8){
        $passwordErr = "请增加密码长度";
        $success = false;
    }
    if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/",$password)){
        $passwordErr = "请包含大小写字母，数字和特殊符号四类字符";
        $success = false;
    }
    if($repassword != $password){
        $repasswordErr = "两次输入密码不一致，请重新输入";
        $success = false;
    }
    if($success){
        //$_SESSION['stuname'] = $stuname;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        //$_SESSION['idenid'] = $idenid;
        //$_SESSION['stuface'] = $stuface;

        //查询用户名是否已经存在
        /*$sql_query = mysqli_query($conn, "select * from stu where stuname='$stuname' limit 1");
        if(mysqli_fetch_array($sql_query)){
            echo'错误：用户名',$stuname,'已存在.<a href ="javascript:history.back(-1);">返回</a>';
            exit;
        }*/

        $mail_query = mysqli_query($conn,"select * from stu where stuemail = '$email' limit 1");
        if(mysqli_fetch_array($mail_query)){
            echo'错误：邮箱',$email,'已存在.<a href ="javascript:history.back(-1);">返回</a>';
            exit;
        }

        $conn->close();  //关闭数据连接

        sendemail($email);

        echo "2秒后将自动跳转到验证界面".'<meta http-equiv="Refresh" content="2;URL=validate.html" />';
        exit;



        //header("location:../views/register.html");
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function sendemail($email){
    $to = $email;
    $subject = "VerifyCode";
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
/**
 * Created by PhpStorm.
 * User: 张皖渝
 * Date: 2/28/2019
 * Time: 4:04 PM
 */