<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-03-04
 * Time: 19:12
 */

include("../Mysql/MysqlConnect.php");
header('Content-type: text/html; charset=utf-8');
header("Content-type:application/vnd.ms-excel;charset=UTF-8");
header("Content-Disposition:filename=stuGrade.xls");

$sql="select * from stuexam";
$result = mysqli_query($conn, $sql);
echo "stuid\texamroom\tgrade\n";
while($row=mysqli_fetch_array($result)){
    echo $row[0]."\t".$row[1]."\t".$row[2]."\n";
}
?>