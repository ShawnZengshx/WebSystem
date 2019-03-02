<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>ENROLLMENT</title>
    <link rel="stylesheet" href="../resource/bootstrap/css/bootstrap.min.css">
    <meta name="vieport" content="width=device-width,initial-scale=1"/>
</head>

<body>
<script>
    function getRommInfo(room){
        window.location.href='enrollment.php?type=' + room;
    }



</script>
<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a href="#" class="navbar-brand center-block">Test Enrollment</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#" >Home</a></li>
                <li><a href="stuinfo.php">Back</a></li>

            </ul>
        </div>
    </div>
</nav>

<form action="enrollment.php" method="post">
    <!--<label class="radio-inline">
       <input type="radio" name="optionsRadiosinline" id="optionsRadios3" value="option1" checked> 选项 1
   </label>
   <label class="radio-inline">
       <input type="radio" name="optionsRadiosinline" id="optionsRadios4"  value="option2"> 选项 2
   </label> -->
    <div class="select">
        <h2>select an examroom</h2>
        <span>  </span>
        <label for="examRoomSelect">考场选择</label>
        <select id="examRoomSelect" name="examRoomSelect" onchange="getRommInfo(this.value)" >
            <option value="1">room1</option>
            <option value="2">room2</option>
            <option value="3">room3</option>
            <option value="4">room4</option>
            <option value="5">room5</option>
        </select>
        <br/>
            <input class="sub" type="submit" name="enrollment" value="确认报名" />
    </div>


    <!--<button class="btn" type="submit" name="exam">submit</button>-->
</form>
</body>
</html>
<style type="text/css">
    body {
        text-align: center;
    }
    .select {
        display: inline-block;
        width: 500px;
        position: relative;
        vertical-align: middle;
        padding: 0;
        overflow: hidden;
        background-color: #f9f2f4;
        color: #555;
        border: 1px solid #aaa;
        text-shadow: none;
        border-radius: 4px;
        transition: box-shadow 0.25s ease;
        z-index: 2;
        margin:200px;
        height: 300px;
    }
    select{
        width:200px;
        height:50px;
        margin:50px;
    }
    .sub{
        width:90px;
        height:30px;
        color: #000;
        background-color: #f5f5f5;
    }


</style>


<?php
/**
 * Created by PhpStorm.
 * User: 张皖渝
 * Date: 2/28/2019
 * Time: 3:26 PM
 */

include("../Mysql/MysqlConnect.php");
if(isset($_POST['exam'])){
    session_start();
    include("../Mysql/MysqlConnect.php");
    $source = $_POST['examRoomSelect'];
    $stuid = $_SESSION['stuid'];
    $check = "select * from stuexam where stuid = '$stuid'";
    $check_res = mysqli_query($conn,$check);
    if(mysqli_fetch_array($check_res)){
        echo '您已报名考试'.'<meta http-equiv="Refresh" content="0.5;URL=stuinfo.php" />';
    }else{
        $check_remain = "select * from examroom where roomid = '$source'";
        $remain_info = $conn->query($check_remain)->fetch_assoc();

        if($remain_info['available'] != "0"){
            $avl_room_name = $remain_info['examroom'];
            $sql = "insert into stuexam(stuid, examroom) values ('$stuid','$avl_room_name')";
            $num = (string)((int)$remain_info['available']-1);
            $update = "update examroom set available = '$num' where roomid = '$source'";
            $rs = $conn->query($sql);
            $rs_up = $conn->query($update);
            if(!($rs || $rs_up)){
                exit("数据修改出错".$conn->error);
            }else{
                $conn->close();
                echo '<script>alert("报名成功！");window.setTimeout(window.location.href="stuinfo.php",1000)</script>';
            }
        }else{
            $conn->close();
            echo '<script>alert("该考场已经满额！请选其他考场！");history.go(-1)</script>';
            exit;
        }
    }
}
if(isset($_GET['type'])){
    $room = $_GET['type'];

    $sql = "select * from examroom where roomid = '$room'";
    $res = $conn->query($sql)->fetch_assoc();
    $conn->close();
    $room_name = $res['examroom'];
    $room_remain = $res['available'];
    $message = "考场名称：".$room_name."     剩余名额：".$room_remain;
    echo '<script>alert("'.$message.'");history.go(-1)</script>';
}
?>

