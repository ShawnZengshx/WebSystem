<fieldset>
    <meta charset="UTF-8" />
    <legend>录入成绩</legend>
    <form action="TeachAdminGrade.php" method="post">
        <p>
            <label for="targetId">学生ID</label>
            <input type="text" id="targetId" name="targetId" class="input"/>
        </p>
        <p>
            <label for="grade">成绩</label>
            <input type="text" id="grade" name="grade" class="input" />
        </p>
        <input type="submit" name="uploadGrade" class="input" value="确认上传"/>
        <input type="submit" name="logout" class="input" value="注销" />

    </form>
</fieldset>


<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-02-28
 * Time: 15:01
 */

if(isset($_POST['uploadGrade'])){
    include("../Mysql/MysqlConnect.php");
    $targetId = $_POST['targetId'];
    $grade = $_POST['grade'];
    $update_grade = "update stu set stugrade = '$grade' where stuid = '$targetId'";
    $res = mysqli_query($conn, $update_grade);
    if(mysqli_affected_rows($conn)!=0){
        echo '<script>alert("成绩录入成功！")</script>';
        exit;
    }else{
        echo '<script>alert("没有该考生的考试信息！")</script>';
        exit;
    }
}

if(isset($_POST['logout'])){
    echo '<script>alert("注销登录成功！");window.setTimeout(window.location.href="../Login/teacherLogin.html")</script>';
}
