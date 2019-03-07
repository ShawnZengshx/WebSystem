<?php
$phone = $email = $password = "";
$phoneErr = $emailErr = $passwordErr = "";
$success = true;
session_start();
include("../Mysql/MysqlConnect.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $password = test_input($_POST["password"]); //学生密码
    $email = test_input($_POST["email"]);   //学生电子邮件
    $stuname = test_input($_POST['stuname']);   //学生用户名
    $idenid = test_input($_POST['stuidenid']); //学生身份证
    $stuface = test_input($_POST['stuface']);   //学生真是姓名
    $emailpattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";

    /*if(empty($_POST["phone"])){
        $phoneErr = "电话是必需的\\n";
        $success = false;
    }*/
    if(empty($_POST['email'])){
        $emailErr = "邮箱是必需的\\n";
        $success = false;
    }
    if(empty($_POST["password"])){
        $passwordErr = "密码是必需的\\n";
        $success = false;
    }
    /*if(!preg_match("/^1[34578]\d{9}/", $phone)){
        $phoneErr = "手机格式不对，请重新输入\\n";
        $success = false;
    }*/
    if(!preg_match($emailpattern, $email)){
        $emailErr = "邮件格式不对，请重新输入\\n";
        $success = false;
    }
    if(strlen($_POST["password"])<8){
        $passwordErr = "请增加密码长度\\n";
        $success = false;
    }
    if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/",$password)){
        $passwordErr = "请包含大小写字母，数字和特殊符号四类字符\\n";
        $success = false;
    }
    if($success){
        $_SESSION['stuname'] = $stuname;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        $_SESSION['idenid'] = $idenid;
        $_SESSION['stuface'] = $stuface;

        //查询用户名是否已经存在
        $sql_query = mysqli_query($conn, "select * from stu where stuname='$stuname' limit 1");
        if(mysqli_fetch_array($sql_query)){
            $errorin = '错误：用户名'.$stuname.'已存在';
            echo '<script>alert("'.$errorin.'");history.go(-1)</script>';
            exit;
        }

        $mail_query = mysqli_query($conn,"select * from stu where stuemail = '$email' limit 1");
        if(mysqli_fetch_array($mail_query)){
            $errinfo = "邮箱：".$email."已经存在！";
            echo '<script>alert("'.$errinfo.'");history.go(-1)</script>';
            exit;
        }

        $conn->close();  //关闭数据连接

        sendemail($email);
        echo '<script>alert("提交成功！验证码已发到邮箱！1秒后将自动跳转到验证界面");window.setTimeout(window.location.href="../Reg/EmailValidate.php",1000)</script>';
        //echo "2秒后将自动跳转到验证界面".'<meta http-equiv="Refresh" content="2;URL=../Reg/validate.html" />';
        exit;



        //header("location:../views/register.html");
    }else{
        $error = $phoneErr.$emailErr.$passwordErr;
        echo "<script>alert('".$error."');history.go(-1)</script>";
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