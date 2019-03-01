<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-03-01
 * Time: 10:05
 */

session_start();
include("../Mysql/MysqlConnect.php");
$stuid = $_SESSION['stuid'];

$query_grade = "select stugrade from stu where stuid = '$stuid'";
$grade = $conn->query($query_grade)->fetch_assoc();
$conn->close();
if($grade['stugrade'] == null){
    echo '<script>alert("考试成绩尚未发布，请等候！");history.go(-1)</script>';
    exit;
}else{
    echo "成绩：".$grade['stugrade'];
    echo '<a href="../Stu/stuinfo.php">点此返回</a>';
    exit;
}