<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-03-04
 * Time: 18:59
 */


include("../Mysql/MysqlConnect.php");
session_start();
$stuid = $_SESSION['stuid'];
header('Content-type: text/html; charset=utf-8');
header("Content-type:application/vnd.ms-excel;charset=UTF-8");
header("Content-Disposition:filename=".$stuid.".xls");

$sql="select * from stuexam where stuid = '$stuid'" ;
$result = mysqli_query($conn, $sql);

echo "stuid\texamroom\tgrade\n";
while($row=mysqli_fetch_array($result)){
    echo $row[0]."\t".$row[1]."\t".$row[2]."\n";
}
echo '<script>alert("成绩单导出成功！");window.history.go(0)</script>';
?>