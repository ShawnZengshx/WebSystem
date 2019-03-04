<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-02-27
 * Time: 22:53
 */
include("../Mysql/MysqlConnect.php");
session_start();

$stuName = $_SESSION['stuname'];    //获取保存的用户名已经id号
$stuId = $_SESSION['stuid'];
if(isset($_POST['submit'])){
    $form_data = $_FILES['uploadPic']['tmp_name'];
    //$form_data = mysqli_real_escape_string($conn,file_get_contents($_FILES['picture']['temp_name']));

    $data = addslashes(fread(fopen($form_data,"r"), filesize($form_data)));

    $insert_query = "update stu set picture ='$data' where stuid = '$stuId' ";
    $rs = $conn->query($insert_query);
    if(!$rs){
        $conn->close();
        echo "照片上传出错".$conn->error."<br/>";
        exit();
    }else{
        $conn->close();
        echo'<script>alert("上传成功！");history.go(-1)</script>'.'<br/>';
        exit;
    }
}