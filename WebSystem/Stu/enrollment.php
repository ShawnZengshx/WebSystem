<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">

    <title>ENROLLMENT</title>
</head>

<body>
<form action="enrollment.php" method="post">
    <label class="radio-inline">
        <input type="radio" name="optionsRadiosinline" id="optionsRadios3" value="option1" checked> 选项 1
    </label>
    <label class="radio-inline">
        <input type="radio" name="optionsRadiosinline" id="optionsRadios4"  value="option2"> 选项 2
    </label>
    <button class="btn" type="submit" name="exam">submit</button>
</form>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: 张皖渝
 * Date: 2/28/2019
 * Time: 3:26 PM
 */


if(isset($_POST['exam'])){
    session_start();
    include("../Mysql/MysqlConnect.php");
    $source = $_POST['optionsRadiosinline'];
    $stuid = $_SESSION['stuid'];
    $check = "select * from stuexam where stuid = '$stuid'";
    $check_res = mysqli_query($conn,$check);
    if(mysqli_fetch_array($check_res)){
        echo '您已报名考试'.'<meta http-equiv="Refresh" content="0.5;URL=stuinfo.php" />';
    }else{
        $sql = "insert into stuexam(stuid, examroom) values ('$stuid','$source')";
        $rs = $conn->query($sql);
        if(!$rs){
            exit("数据修改出错".$conn->error);
        }else{
            $conn->close();
            exit("考试报名成功！");
        }
    }
}



