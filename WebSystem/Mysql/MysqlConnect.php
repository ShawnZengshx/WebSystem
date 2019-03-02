<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-02-28
 * Time: 08:08
 */

$mysql_conf = array(
    'host' => '127.0.0.1',
    'db' => 'websql',
    'db_user' => 'root',
    'db_pwd' => 'admin',
);
@$conn = new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd'], $mysql_conf['db']);
if(mysqli_connect_errno()){
    die("could not connect to mysql: \n". mysqli_connect_error());
}   //若发生连接异常
$conn->set_charset("utf-8");

?>