<?php
$phone = $email = $password = "";
$phoneErr = $emailErr = $passwordErr = "";
$success = true;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $password = test_input($_POST["password"]);
    $phone = test_input($_POST["phone"]);
    $email = test_input($_POST["email"]);
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
    if($success){
        header("location:../views/register.html");
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
/**
 * Created by PhpStorm.
 * User: 张皖渝
 * Date: 2/28/2019
 * Time: 4:04 PM
 */