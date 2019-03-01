<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-02-27
 * Time: 21:11
 */

session_start();
include('../Mysql/MysqlConnect.php');

if(!isset($_SESSION['stuid'])){
    header("Location:../Login/login.html");
    echo("请先登录！");
}

$stuname = $_SESSION['stuname'];
$stuid = $_SESSION['stuid'];

$get_info = "select * from stu where stuid = '$stuid' and stuname='$stuname'";
$result = $conn->query($get_info);
if(!$result){
    echo "数据查询发生错误".$conn->error.'<br/>';
    echo '点击此处<a href="javascript:history.back(-1)">返回</a>';
    exit();
}
$row = $result->fetch_assoc();
$conn->close();
echo "<meta charset=\"UTF-8\"/>";
echo '<h1>'.$row['stuface']."，您好！".'</h1>'.'<br/>';
echo '<tr1>'."用户名：".$row['stuname'].'</tr1>'.'<br/>';
echo "ID:".$row['stuid'].'<br/>';
echo "电子邮箱：".$row['stuemail'].'<br/>';
echo "<form action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\">
    <label>上传照片</label>
    <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"100000000000\"/>
    <input type=\"file\" name=\"picture\" /><br/>
    <input type=\"submit\" name=\"submit\" value=\"上传\"/>
</form>";
echo "<form action=\"enrollment.php\" method=\"post\">
    <label>考试报名</label>
    <input type=\"submit\" name=\"submit\" value=\"报名\"/>
</form>";

echo "<form action=\"StuQueExam.php\" method=\"post\">
    <label>查询考试报名信息</label>
    <input type=\"submit\" name=\"getExamInfo\" value=\"查看\" class=\"input\" />
</form>";
echo "<form action=\"../StuGetGrade/StuQueryGrade.php\" method=\"post\">
    <label>查询成绩</label>
    <input type=\"submit\" name=\"queryGrade\" value=\"查询\" class=\"input\"/>
</form>";
echo "<form action=\"../controllers/stuLogout.php\" method=\"post\">
    <input type=\"submit\" name=\"logout\" value=\"注销登录\" class=\"input\">
</form>";

?>










