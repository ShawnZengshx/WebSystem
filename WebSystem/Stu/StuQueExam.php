<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-03-01
 * Time: 09:52
 */

session_start();
include("../Mysql/MysqlConnect.php");
$stuid = $_SESSION['stuid'];
$stuname = $_SESSION['stuname'];

$query_exam_info = "select * from stuexam where stuid = '$stuid'";

$res = mysqli_query($conn, $query_exam_info);
if(!mysqli_fetch_array($res)){
    echo "您当前没有报名任何考试".'<a href="stuinfo.php">点此返回</a>';
    exit;
}

$info = $conn->query($query_exam_info)->fetch_assoc();
echo "考场号：".$info['examroom'];
exit;
