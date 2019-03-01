<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">

    <title>ENROLLMENT</title>
</head>

<body>
<script>
    function getRommInfo(room){
        window.location.href='enrollment.php?type=' + room;
    }

</script>

<form action="enrollment.php" method="post">
    <!--<label class="radio-inline">
       <input type="radio" name="optionsRadiosinline" id="optionsRadios3" value="option1" checked> 选项 1
   </label>
   <label class="radio-inline">
       <input type="radio" name="optionsRadiosinline" id="optionsRadios4"  value="option2"> 选项 2
   </label> -->
    <label for="examRoomSelect"><?php echo "选择考场" ?></label>
    <select id="examRoomSelect" name="examRoomSelect" onchange="getRommInfo(this.value)"">
        <option value="1">room1</option>
        <option value="2">room2</option>
    </select> <br/>
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
    include("../Mysql/MysqlConnect.php");
    $sql = "select * from examroom where roomid = '$room'";
    $res = $conn->query($sql)->fetch_assoc();
    $conn->close();
    $room_name = $res['examroom'];
    $room_remain = $res['available'];
    $message = "考场：".$room_name."     剩余：".$room_remain;
    echo '<script>alert("'.$message.'");history.go(-1)</script>';
}
?>

