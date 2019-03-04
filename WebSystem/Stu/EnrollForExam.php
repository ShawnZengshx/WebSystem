<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-03-04
 * Time: 08:44
 */

include("../Mysql/MysqlConnect.php");
session_start();
$stuid = $_SESSION['stuid'];
if(isset($_GET['id'])){
    $room_id = $_GET['id'];
    $check_remain = "select * from examroom where roomid = '$room_id'";
    $remain_info = $conn->query($check_remain)->fetch_assoc();
    $avl_room_name = $remain_info['examroom'];
    $sql = "insert into stuexam(stuid, examroom) values ('$stuid','$avl_room_name')";
    $num = (string)((int)$remain_info['available']-1);
    $update = "update examroom set available = '$num' where roomid = '$room_id'";
    $rs = $conn->query($sql);
    $rs_up = $conn->query($update);
    if(!($rs || $rs_up)){
        exit("数据修改出错".$conn->error);
    }else{
        $conn->close();
        echo '<script>alert("报名成功！");window.setTimeout(window.location.href="info.php",1000)</script>';
        exit();
    }
}


?>
<?php
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
    $full_sql = "select * from examroom";
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
    $str = json_encode($jarr);
    $file = fopen("roomInfo.json","w");
    fwrite($file,$str);
    fclose($file);
    $conn->close();
}
outJson();
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Info</title>

    <link href="../resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../resource/bootstrap-table/css/bootstrap-table.min.css" rel="stylesheet">

    <script src="../resource/js/jquery.min.js"></script>
    <script src="../resource/bootstrap/js/bootstrap.min.js"></script>
    <script src="../resource/bootstrap-table/js/bootstrap-table.js"></script>
    <script src="../resource/bootstrap-table/js/bootstrap-table-zh-CN.js"></script>

    <!-- Custom styles for this template -->
    <link href="../resource/dashboard.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ETS info</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../controllers/stuLogout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="info.php">Overview <span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="enrollment.php">Register for exam</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Export</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="sub-header">考场信息</h2>
            <div class="btn-group operation">
                <button id="btn_add" type="button" class="btn bg-primary enroll" data-toggle="modal" data-target="#enrollExam">
                    <span class="glyphicon glyphicon-book" aria-hidden="true"></span>报名
                </button>
            </div>

            <!--报名考试的modal-->
            <div class="modal fade" id="enrollExam" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">确认要报名吗？</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <button id="delete" type="button" class="btn btn-danger" data-dismiss="modal" onclick="enroll_exam()">确认</button>
                        </div>
                    </div>
                </div>
            </div>
            <table id="table"></table>
        </div>
        <script>
            $("#table").bootstrapTable({ // 对应table标签的id
                url: "roomInfo.json",   //AJAX获取表格数据的url
                striped: true,                      //是否显示行间隔色(斑马线)
                pagination: true,                   //是否显示分页（*）
                sidePagination: "server",           //分页方式：client客户端分页，server服务端分页（*）
                paginationLoop: false,		  //当前页是边界时是否可以继续按
                queryParams: function (params) {    // 请求服务器数据时发送的参数，可以在这里添加额外的查询参数，返回false则终止请求
                    return {
                        //limit: params.limit, // 每页要显示的数据条数
                        //offset: params.offset, // 每页显示数据的开始行号
                        //sort: params.sort, // 要排序的字段
                        //sortOrder: params.order, // 排序规则
                        //dataId: $("#dataId").val() // 额外添加的参数
                    }
                },//传递参数（*）
                pageNumber:1,                       //初始化加载第一页，默认第一页
                pageSize: 10,                       //每页的记录行数（*）
                pageList: [10, 25, 50, 100,'all'],  //可供选择的每页的行数（*）
                contentType: "application/x-www-form-urlencoded",//一种编码。在post请求的时候需要用到。这里用的get请求，注释掉这句话也能拿到数据
                //search: true,                     //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
                strictSearch: false,		  //是否全局匹配,false模糊匹配
                showColumns: true,                  //是否显示所有的列
                showRefresh: true,                  //是否显示刷新按钮
                minimumCountColumns: 2,             //最少允许的列数
                clickToSelect: true,               //是否启用点击选中行
                singleSelect:true,
                //height: 500,                      //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
                //uniqueId: "id",                   //每一行的唯一标识，一般为主键列
                showToggle:true,                    //是否显示详细视图和列表视图的切换按钮
                cardView: false,                    //是否显示详细视图
                detailView: false,                  //是否显示父子表
                cache: false,                       // 设置为 false 禁用 AJAX 数据缓存， 默认为true
                sortable: true,                     //是否启用排序
                sortOrder: "asc",                   //排序方式
                sortName: 'sn', // 要排序的字段
                uniqueId:'roomid',
                columns: [
                    {
                        checkbox:true,
                    }, {
                        field: 'roomid', // 返回json数据中的name
                        title: '考场号', // 表格表头显示文字
                        align: 'center', // 左右居中
                        valign: 'middle' // 上下居中
                    }, {
                        field: 'examroom',
                        title: '考场名称',
                        align: 'center',
                        valign: 'middle'
                    }, {
                        field: 'available',
                        title: ' 剩余',
                        align: 'center',
                        valign: 'middle',
                        sortable:true
                    }
                ],
                onLoadSuccess: function(){  //加载成功时执行
                    console.info("加载成功");
                },
                onLoadError: function(){  //加载失败时执行
                    console.info("加载数据失败");
                },

                //>>>>>>>>>>>>>>导出excel表格设置
                //showExport: phoneOrPc(),              //是否显示导出按钮(此方法是自己写的目的是判断终端是电脑还是手机,电脑则返回true,手机返回falsee,手机不显示按钮)
                exportDataType: "basic",              //basic', 'all', 'selected'.
                exportTypes:['excel','xlsx'],	    //导出类型
                //exportButton: $('#btn_export'),     //为按钮btn_export  绑定导出事件  自定义导出按钮(可以不用)
                exportOptions:{
                    //ignoreColumn: [0,0],            //忽略某一列的索引
                    fileName: '数据导出',              //文件名称设置
                    worksheetName: 'Sheet1',          //表格工作区名称
                    tableName: '商品数据表',
                    excelstyles: ['background-color', 'color', 'font-size', 'font-weight'],
                    //onMsoNumberFormat: DoOnMsoNumberFormat
                }
                //导出excel表格设置<<<<<<<<<<<<<<<<
            });
        </script>
        <script>
            function enroll_exam(){
                var a =$("#table").bootstrapTable('getSelections');
                if(a[0].available == "0"){
                    alert("该考场已满");
                    return;
                }
                var room_id = a[0].roomid;
                window.location.href="EnrollForExam.php?id="+room_id;
            }
        </script>
    </div>
</div>


