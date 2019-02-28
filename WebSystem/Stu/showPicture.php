<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-02-28
 * Time: 13:15
 */
include("../Mysql/MysqlConnect.php");
$stuid = "zhangwanyu";
$select = "select picture from stu where stuname = '$stuid'";
$res = $conn->query($select);
$data = $res->fetch_assoc();
if(!$res){
    echo $conn->error;
}
$conn->close();
$data = $data['picture'];
Header("Content-type:jpg");
echo $data;