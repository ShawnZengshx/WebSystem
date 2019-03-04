<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-02-28
 * Time: 08:04
 */



session_start();
$teachId = htmlspecialchars($_POST['teachname']);
$teachpwd = $_POST['teachpwd'];

if($_GET['action']=='logout'){
    unset($_SESSION['teachId']);
    echo"注销成功".'<a href="../views/adminLogin.html">点击此处重新登录</a>';
    exit();
}


if(isset($_POST['go'])){
    include('../Mysql/MysqlConnect.php');
    $check_query = "select * from teacher where teachid = '$teachId'and teachpwd='$teachpwd'";
    $result = $conn->query($check_query);
    if(!$result){
        echo "数据查询出错".$conn->error.'<br/>';
        $conn->close();
        echo '<a href="login.html">点击此处返回</a>';
        exit();
    }
    $row = $result->fetch_assoc();
    $conn->close();
    if($teachId==null||$teachpwd==null){
        //echo "用户名或者密码不能为空！".'<a href="teacherLogin.html">点此重新登录</a>';
        echo '<script>alert("用户名或者密码不能为空！");history.go(-1)</script>';
        exit;
    }
    elseif($teachId == $row['teachid'] && $teachpwd==$row['teachpwd']){
        $_SESSION['teachId'] = $teachId;
        setcookie('teachId',$teachId);
        //echo '<script>alert("登录成功！2秒后将跳转到用户界面")</script>';
        echo '<script>alert("登录成功！即将跳转");window.setTimeout(window.location.href="../TeacherAdmin/TeachAdminGrade.php")</script>';

        //echo '点击此处 <a href="teacherLogin.php?action=logout">注销</a> 登录<br/>';
        exit();
    }else{
        //echo"登录失败".'<a href="teacherLogin.html">点击此处重新登录</a>'.'<br/>';
        echo '<script>alert("登录失败！");history.go(-1)</script>';
        exit;
    }


}
/*include('../Mysql/MysqlConnect.php');
$check_query = "select * from teacher where teachid = '$teachId'and teachpwd='$teachpwd'";
$result = $conn->query($check_query);
if(!$result){
    echo "数据查询出错".$conn->error.'<br/>';
    $conn->close();
    echo '<a href="login.html">点击此处返回</a>';
    exit();
}
$row = $result->fetch_assoc();
$conn->close();
if($teachId==null||$teachpwd==null){
        //echo "用户名或者密码不能为空！".'<a href="teacherLogin.html">点此重新登录</a>';
    echo '<script>alert("用户名或者密码不能为空！");history.go(-1)</script>';
    exit;
}
elseif($teachId == $row['teachid'] && $teachpwd==$row['teachpwd']){
    $_SESSION['teachId'] = $teachId;
    setcookie('teachId',$teachId);
    echo "登陆成功！".'<br/>';
    echo "3秒后将跳转到用户界面".'<meta http-equiv="Refresh" content="3;URL=" />';
    echo '点击此处 <a href="teacherLogin.php?action=logout">注销</a> 登录<br/>';
    exit();
}else{
    //echo"登录失败".'<a href="teacherLogin.html">点击此处重新登录</a>'.'<br/>';
    echo"登录失败".'<meta http-equiv="Refresh" content="URL=teacherLogin.html"/>';
}*/



