<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-03-02
 * Time: 20:39
 */

function outJson(){
    $mysql_conf = array(
        'host' => '127.0.0.1',
        'db' => 'websql',
        'db_user' => 'root',
        'db_pwd' => 'Zengshx@9869',
    );
    @$conn = new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd'], $mysql_conf['db']);
    if(mysqli_connect_errno()){
        die("could not connect to mysql: \n". mysqli_connect_error());
    }   //若发生连接异常
    $conn->set_charset("utf-8");
    $sql = "select stuid  from stuexam";
    $id_info = $conn->query($sql)->fetch_assoc();
    $id = $id_info['stuid'];
    $full_sql = "select stu.stuid,stuface,stugrade from stu,stuexam where stu.stuid = stuexam.stuid";
    $res = mysqli_query($conn,$full_sql);
    if(!$res){
        exit($conn->error);
    }
    $jarr = array();
    while($rows = mysqli_fetch_array($res,MYSQLI_ASSOC)){
        $count = count($rows);
        for($i=0;$i<$count;$i++){
            unset($rows[$i]);//删除冗余数据
        }
        array_push($jarr,$rows);
    }
    print_r($jarr);
    echo "<br/>";
    echo '<hr>';
    echo '编码后的json字符串：';
    echo $str = json_encode($jarr);
    $file = fopen("target.json","w");
    echo fwrite($file,$str);
    fclose($file);
    $conn->close();

}
outJson();

?>