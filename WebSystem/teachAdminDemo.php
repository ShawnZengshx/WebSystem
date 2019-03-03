
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

    <link href="resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="resource/bootstrap-table/css/bootstrap-table.min.css" rel="stylesheet">

    <script src="resource/js/jquery.min.js"></script>
    <script src="resource/bootstrap/js/bootstrap.min.js"></script>
    <script src="resource/bootstrap-table/js/bootstrap-table.js"></script>
    <script src="resource/bootstrap-table/js/bootstrap-table-zh-CN.js"></script>

    <!-- Custom styles for this template -->
    <link href="resource/dashboard.css" rel="stylesheet">

</head>

<body>
<script>
    $("#addBook a").click(function (e) {
        $(this).tab("show");
    })

</script>

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
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Export</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="sub-header">考生成绩</h2>
            <div class="btn-group operation">
                <button id="btn_add" type="button" class="btn bg-primary" data-toggle="modal" data-target="#addBook">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
                </button>
                <button id="btn_edit" type="button" class="btn bg-info" data-target="#editBookInfo" data-toggle="modal">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>修改
                </button>
                <button id="btn_delete" type="button" class="btn btn-success" data-toggle="modak" data-target="#deleteBook">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
                </button>
            </div>
          <!--新增成绩的modal-->
            <div class="modal fade" id="addBook" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">新增成绩</h4>
                        </div>
                        <div id="addBookModal" class="modal-body">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="bookName" class="col-sm-2 control-label">学生ID:*</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="bookName" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bookAuthor" class="col-sm-2 control-label">学生姓名:*</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="bookAuthor" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bookPrice" class="col-sm-2 control-label">学生成绩:*</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="bookPrice" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="center-block">
                                <button id="cancelAdd" type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                <button id="addBooksInfo" type="button" class="btn btn-success" data-dismiss="modal">保存</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--修改成绩的modal-->
            <div class="modal fade" id="editBookInfo" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">修改学生成绩图</h4>
                        </div>
                        <div id="editBookModal" class="modal-body">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="editBookName" class="col-sm-2 control-label">学生ID:*</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="editBookName" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="editBookAuthor" class="col-sm-2 control-label">学生姓名:*</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="editBookAuthor" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="editBookPrice" class="col-sm-2 control-label">学生成绩:*</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="editBookPrice" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="center-block">
                                <button id="cancelEdit" type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                <button id="saveEdit" type="button" class="btn btn-success" data-dismiss="modal">保存</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <!--删除成绩的modal-->
            <div class="modal fade" id="deleteBook" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">确认要删除吗？</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <button id="delete" type="button" class="btn btn-danger" data-dismiss="modal">删除</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>考场号</th>
                        <th>姓名</th>
                        <th>日期</th>
                        <th>成绩</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1,001</td>
                        <td>Lorem</td>
                        <td>ipsum</td>
                        <td>dolor</td>
                        <td>sit</td>
                    </tr>
                    <tr>
                        <td>1,002</td>
                        <td>amet</td>
                        <td>consectetur</td>
                        <td>adipiscing</td>
                        <td>elit</td>
                    </tr>
                    <tr>
                        <td>1,003</td>
                        <td>Integer</td>
                        <td>nec</td>
                        <td>odio</td>
                        <td>Praesent</td>
                    </tr>
                    <tr>
                        <td>1,003</td>
                        <td>libero</td>
                        <td>Sed</td>
                        <td>cursus</td>
                        <td>ante</td>
                    </tr>
                    <tr>
                        <td>1,004</td>
                        <td>dapibus</td>
                        <td>diam</td>
                        <td>Sed</td>
                        <td>nisi</td>
                    </tr>
                    <tr>
                        <td>1,005</td>
                        <td>Nulla</td>
                        <td>quis</td>
                        <td>sem</td>
                        <td>at</td>
                    </tr>
                    <tr>
                        <td>1,006</td>
                        <td>nibh</td>
                        <td>elementum</td>
                        <td>imperdiet</td>
                        <td>Duis</td>
                    </tr>
                    <tr>
                        <td>1,007</td>
                        <td>sagittis</td>
                        <td>ipsum</td>
                        <td>Praesent</td>
                        <td>mauris</td>
                    </tr>
                    <tr>
                        <td>1,008</td>
                        <td>Fusce</td>
                        <td>nec</td>
                        <td>tellus</td>
                        <td>sed</td>
                    </tr>
                    <tr>
                        <td>1,009</td>
                        <td>augue</td>
                        <td>semper</td>
                        <td>porta</td>
                        <td>Mauris</td>
                    </tr>
                    <tr>
                        <td>1,010</td>
                        <td>massa</td>
                        <td>Vestibulum</td>
                        <td>lacinia</td>
                        <td>arcu</td>
                    </tr>
                    <tr>
                        <td>1,011</td>
                        <td>eget</td>
                        <td>nulla</td>
                        <td>Class</td>
                        <td>aptent</td>
                    </tr>
                    <tr>
                        <td>1,012</td>
                        <td>taciti</td>
                        <td>sociosqu</td>
                        <td>ad</td>
                        <td>litora</td>
                    </tr>
                    <tr>
                        <td>1,013</td>
                        <td>torquent</td>
                        <td>per</td>
                        <td>conubia</td>
                        <td>nostra</td>
                    </tr>
                    <tr>
                        <td>1,014</td>
                        <td>per</td>
                        <td>inceptos</td>
                        <td>himenaeos</td>
                        <td>Curabitur</td>
                    </tr>
                    <tr>
                        <td>1,015</td>
                        <td>sodales</td>
                        <td>ligula</td>
                        <td>in</td>
                        <td>libero</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            -->
            <table id="table"></table>
        </div>
    </div>
</div>
<script>

     $("#table").bootstrapTable({ // 对应table标签的id
         url: "target.json",   //AJAX获取表格数据的url
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
         clickToSelect: false,               //是否启用点击选中行
         //height: 500,                      //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
         //uniqueId: "id",                   //每一行的唯一标识，一般为主键列
         showToggle:true,                    //是否显示详细视图和列表视图的切换按钮
         cardView: false,                    //是否显示详细视图
         detailView: false,                  //是否显示父子表
         cache: false,                       // 设置为 false 禁用 AJAX 数据缓存， 默认为true
         sortable: true,                     //是否启用排序
         sortOrder: "asc",                   //排序方式
         sortName: 'sn', // 要排序的字段
         columns: [
             {
                 field: 'stuid', // 返回json数据中的name
                 title: '学生ID', // 表格表头显示文字
                 align: 'center', // 左右居中
                 valign: 'middle' // 上下居中
             }, {
                 field: 'stuface',
                 title: '学生姓名',
                 align: 'center',
                 valign: 'middle'
             }, {
                 field: 'stugrade',
                 title: ' 成绩',
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
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: 张皖渝
 * Date: 3/2/2019
 * Time: 7:17 PM
 */