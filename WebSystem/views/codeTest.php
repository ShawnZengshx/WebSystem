
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
<style>
    .content {
        margin: 50px auto;
        border: 1px solid #ccc;
    }
    .operation {
        margin: 10px;
    }
    .operation>button {
        margin: 10px;
    }
    #books_length {
        float: left;
        margin-left: 20px;
    }
    #books_filter {
        float: right;
        margin-right: 20px;
    }
    #books {
        margin: 5px;
    }
    .center-block {
        display: block;
        width: 21%;
        margin: auto;
    }
</style>
</head>

<body>
<section class="content">
    <div class="btn-group operation">
        <button id="btn_add" type="button" class="btn bg-primary">
            <span class="glyphicon glyphicon-plus" aria-hidden="true" data-toggle="modal" data-target="#addBook"></span>新增
        </button>
        <button id="btn_edit" type="button" class="btn bg-info">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true" data-target="#editBookInfo" data-toggle="modal"></span>修改
        </button>
        <button id="btn_delete" type="button" class="btn btn-success" data-toggle="modak" data-target="#deleteBook">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
        </button>
    </div>
    <div class="modal fade" id="addBook" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">添加图书</h4>
                </div>
                <div id="addBookModal" class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="bookName" class="col-sm-2 control-label">书名:*</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="bookName" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bookAuthor" class="col-sm-2 control-label">作者:*</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="bookAuthor" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bookPrice" class="col-sm-2 control-label">价格:*</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="bookPrice" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bookPublish" class="col-sm-2 control-label">出版社:*</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="bookPublish" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bookISBN" class="col-sm-2 control-label">ISBN:*</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="bookISBN" type="text">
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
    <div class="modal fade" id="editBookInfo" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">修改图书内容</h4>
                </div>
                <div id="editBookModal" class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="editBookName" class="col-sm-2 control-label">书名:*</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="editBookName" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editBookAuthor" class="col-sm-2 control-label">作者:*</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="editBookAuthor" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editBookPrice" class="col-sm-2 control-label">价格:*</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="editBookPrice" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editBookPublish" class="col-sm-2 control-label">出版社:*</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="editBookPublish" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editBookISBN" class="col-sm-2 control-label">ISBN:*</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="editBookISBN" type="text">
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

    <table id="books" class="table table-striped table-bordered row-border hover order-column" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>序号</th>
            <th>书名</th>
            <th>作者</th>
            <th>价格</th>
            <th>出版社</th>
            <th>ISBN</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</section>
</body>
<script>
    var data = [['', '三体', '刘慈欣', '39.00', '重庆出版社', '982513213516']]
    var titles = ['书名', '作者', '价格', '出版社', 'ISBN']
    $(function () {
        var table = $('#books').DataTable({
            data: data,
            "pagingType": "full_numbers",
            "bSort": true,
            "language": {
                "sProcessing": "处理中...",
                "sLengthMenu": "显示 _MENU_ 项结果",
                "sZeroRecords": "没有匹配结果",
                "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                "sInfoPostFix": "",
                "sSearch": "搜索:",
                "sUrl": "",
                "sEmptyTable": "表中数据为空",
                "sLoadingRecords": "载入中...",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "上页",
                    "sNext": "下页",
                    "sLast": "末页"
                },
                "oAria": {
                    "sSortAscending": ": 以升序排列此列",
                    "sSortDescending": ": 以降序排列此列"
                }
            },
            "columnDefs": [{
                "searchable": false,
                "orderable": true,
                "targets": 0
            }],
            "order": [[1, 'asc']]
        });
        table.on('order.dt search.dt', function() {
            table.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
        $('#books tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
        $("#cancelAdd").on('click', function() {
            console.log('cancelAdd');
            $("#addBookModal").find('input').val('')
        })
        $("#addBooksInfo").on('click', function() {
            console.log('addBooksInfo');
            if (data.length) {
                if ($("#addBookModal").find('input').val() !== '') {
                    var bookName = $("#bookName").val()
                    var bookAuthor = $("#bookAuthor").val()
                    var bookPrice = $("#bookPrice").val()
                    var bookPublish = $("#bookPublish").val()
                    var bookISBN = $("#bookISBN").val()
                    var addBookInfos = [].concat(bookName, bookAuthor, bookPrice, bookPublish, bookISBN);
                    for (var i = 0; i < addBookInfos.length; i++) {
                        if (addBookInfos[i] === '') {
                            alert(titles[i] + '内容不能为空')
                        }
                    }
                    table.row.add(['', bookName, bookAuthor, bookPrice, bookPublish, bookISBN]).draw();
                    $("#addBookModal").find('input').val('')
                }
            } else {
                alert('请输入内容')
            }
        })
        $("#addBooksInfo").click();
        $("#btn_add").click(function(){
            console.log('add');
            $("#addBook").modal()
        });
        $('#btn_edit').click(function () {
            console.log('edit');
            if (table.rows('.selected').data().length) {
                $("#editBookInfo").modal()
                var rowData = table.rows('.selected').data()[0];
                var inputs = $("#editBookModal").find('input')
                for (var i = 0; i < inputs.length; i++) {
                    $(inputs[i]).val(rowData[i + 1])
                }
            } else {
                alert('请选择项目');
            }
        });
        $("#saveEdit").click(function() {
            var editBookName = $("#editBookName").val()
            var editBookAuthor = $("#editBookAuthor").val()
            var editBookPrice = $("#editBookPrice").val()
            var editBookPublish = $("#editBookPublish").val()
            var editBookISBN = $("#editBookISBN").val()
            var newRowData = [].concat(editBookName, editBookAuthor, editBookPrice, editBookPublish, editBookISBN);
            var tds = Array.prototype.slice.call($('.selected td'))
            for (var i = 0; i < newRowData.length; i++) {
                if (newRowData[i] !== '') {
                    tds[i + 1].innerHTML = newRowData[i];
                } else {
                    alert(titles[i] + '内容不能为空')
                }
            }
        })
        $("#cancelEdit").click(function() {
            console.log('cancelAdd');
            $("#editBookModal").find('input').val('')
        })
        $('#btn_delete').click(function () {
            if (table.rows('.selected').data().length) {
                $("#deleteBook").modal()
            } else {
                alert('请选择项目');
            }
        });
        $('#delete').click(function () {
            table.row('.selected').remove().draw(false);
        });
    })
</script>
</html>
