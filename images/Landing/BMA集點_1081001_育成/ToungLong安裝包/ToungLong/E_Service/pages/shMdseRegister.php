<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">商城商品登記</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">商城商品登記</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-label-group row">
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="getSelectItem('creShMdseSelect','CommunitySelect')">
                            <input class="btn btn-primary btn-block" type="button" value="新增商品" data-toggle="modal" data-target="#creShMdseModal" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>刪除</th>
                            <th>修改</th>
                            <th>ID</th>
                            <th>商品名稱</th>
                            <th>商品描述</th>
                            <th>商品價格</th>
                            <th>商品數量</th>
                            <th>商品圖片</th>
                            <th>商品圖片2</th>
                            <th>商品圖片3</th>
                            <th>商品圖片4</th>
                            <th>商品圖片5</th>
                            <th>商品手續費百分比(%)</th>
                            <th>是否上架</th>
                            <th>審核狀態</th>
                            <th>備註</th>
                            <th>維護者</th>
                            <th>異動日</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- createModal-->
<div class="modal fade" id="creShMdseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- <form method="post" onsubmit="return creShMdseSubmit()"> -->
            <form method="post" enctype="multipart/form-data" id="creShMdseSubmit">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增商品</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>商品名稱：</label>
                            <input type="text" name="creShMdse[]" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>商品描述：</label>
                            <input type="text" name="creShMdse[]" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>商品價格：</label>
                            <input type="number" min="0" name="creShMdse[]" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>商品數量：</label>
                            <input type="number" min="0" name="creShMdse[]" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label>
                                <span style='color:red'>*</span>商品類別：
                            </label>
                            <select name="creShMdseSelect" class="custom-select" required>
                                <!-- <option value="1" selected></option> -->
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*(檔案大小限制1MB)</span>商品圖片：</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="creShMdseFile" id="inputFile" class="custom-file-input" required>
                                    <label class="custom-file-label" for="inputFile">選擇圖片</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>(檔案大小限制1MB)</span>商品圖片2：</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="creShMdseFile2" id="inputFile2" class="custom-file-input">
                                    <label class="custom-file-label" for="inputFile2">選擇圖片</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>(檔案大小限制1MB)</span>商品圖片3：</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="creShMdseFile3" id="inputFile3" class="custom-file-input">
                                    <label class="custom-file-label" for="inputFile3">選擇圖片</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>(檔案大小限制1MB)</span>商品圖片4：</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="creShMdseFile4" id="inputFile4" class="custom-file-input">
                                    <label class="custom-file-label" for="inputFile4">選擇圖片</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>(檔案大小限制1MB)</span>商品圖片5：</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="creShMdseFile5" id="inputFile5" class="custom-file-input">
                                    <label class="custom-file-label" for="inputFile5">選擇圖片</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>商品手續費百分比(%)</label>
                            <input type="number" min="0" name="creShMdse[]" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">備註：</label>
                            <input type="text" name="creShMdse[]" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <!-- <a class="btn btn-primary" href="#" onclick="creCommunity()">建立</a> -->
                    <input class="btn btn-primary " type="submit" value="建立">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- bootstrap.bundle -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- /.container-fluid -->
<script type='text/javascript'>
$(document).ready(function(e) {
    // setTimeout('console.log(setTimeout-1000)', 1000);
    getTableValue("tbody", "CommunitySelect", "#dataTable");
});

$('#inputFile').on('change', function() {
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
})

$('#inputFile2').on('change', function() {
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
})

$('#inputFile3').on('change', function() {
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
})

$('#inputFile4').on('change', function() {
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
})

$('#inputFile5').on('change', function() {
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
})

$("#creShMdseSubmit").submit(function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: "pages/shMdseRegister/creModal.php",
        data: formData,
        dataType: 'text',
        processData: false,
        contentType: false,
        cache: false,
        timeout: 1000000,
        beforeSend: function() {
            document.getElementById("loader").style.display = "flex";
        },
        complete: function() {
            document.getElementById("loader").style.display = "none";
        }
    }).done(function(msg) {
        if (msg == "0") {
            alertMsg('success', '建立成功!!');
            getTableValue("tbody", "CommunitySelect", "#dataTable");
            // location.href = "?function=shMdseRegister";
        } else {
            alertMsg('danger', msg);
        }
        // $('#creShMdseModal').modal('hide');
        hideModal('#creShMdseModal');
    });

});

function getSelectItem(functionName, Value) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/shMdseRegister/getSelectItem.php",
        data: {
            functionName: functionName,
            Value: Value
        },
        cache: false
        // ,
        // beforeSend: function() {
        //     document.getElementById("loader").style.display = "flex";
        // },
        // complete: function() {
        //     document.getElementById("loader").style.display = "none";
        // }
    }).done(function(msg) {
        document.getElementsByName(functionName)[0].innerHTML = msg;
    });
}

function delModalSubmit(ID) {
    $.ajax({
        type: "POST",
        url: "pages/shMdseRegister/delModal.php",
        data: {
            ID: ID
        },
        cache: false,
        beforeSend: function() {
            document.getElementById("loader").style.display = "flex";
        },
        complete: function() {
            document.getElementById("loader").style.display = "none";
        }
    }).done(function(msg) {
        if (msg == "0") {
            alertMsg('success', '刪除成功!!');
            getTableValue("tbody", "CommunitySelect", "#dataTable");
            // location.href = "?function=shMdseRegister";
        } else {
            alertMsg('danger', msg);
        }
        // $('#delModal' + ID).modal('hide');
        hideModal('#delModal' + ID);
    });
    return false;
}

function editModalSubmit(ID, name, VerifyStatus) {
    if (VerifyStatus == '通過') {
        var ID = ID;
        var Description = document.getElementsByName(name)[0].value;
        var Num = document.getElementsByName(name)[1].value;
        if (parseInt(Num) <= 0) {
            alertMsg('danger', '數量請勿低於1!!');
        } else {

            var Remark = document.getElementsByName(name)[1].value;
            var IsShelf = getSelectValue("editSelect" + ID);
            $.ajax({
                type: "POST",
                url: "pages/shMdseRegister/editModal.php",
                data: {
                    ID: ID,
                    Description: Description,
                    Num: Num,
                    IsShelf: IsShelf,
                    Remark: Remark
                },
                cache: false,
                beforeSend: function() {
                    document.getElementById("loader").style.display = "flex";
                },
                complete: function() {
                    document.getElementById("loader").style.display = "none";
                }
            }).done(function(msg) {
                if (msg == "0") {
                    alertMsg('success', '修改成功!!');
                    getTableValue("tbody", "CommunitySelect", "#dataTable");
                    // location.href = "?function=shMdseRegister";
                } else {
                    alertMsg('danger', msg);
                }
                // $('#editModal' + ID).modal('hide');
                hideModal('#editModal' + ID);
            });
        }
    } else {
        alertMsg('danger', '審核尚未通過!!');
    }
    return false;
}

function getSelectValue(SelectName) {
    var e = document.getElementsByName(SelectName)[0];
    var result = e.options[e.selectedIndex].value;
    return result;
}

function getTableValue(functionName, Value, dataTableID) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/shMdseRegister/getTableValue.php",
        data: {
            functionName: functionName,
            Value: Value
        },
        cache: false
    }).done(function(msg) {
        if ($.fn.DataTable.isDataTable(dataTableID)) {
            $(dataTableID).DataTable().destroy();
        }
        document.getElementById(functionName).innerHTML = msg;
        setDataTable(dataTableID);
    });
    return false;
}

function setDataTable(ID) {
    $(ID).DataTable({
        language: {
            'processing': '處理中...',
            'loadingRecords': '載入中...',
            'lengthMenu': '顯示 _MENU_ 項結果',
            'zeroRecords': '沒有符合的結果',
            'info': '顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項',
            'infoEmpty': '顯示第 0 至 0 項結果，共 0 項',
            'infoFiltered': '(從 _MAX_ 項結果中過濾)',
            'infoPostFix': '',
            'search': '搜尋:',
            'paginate': {
                'first': '第一頁',
                'previous': '上一頁',
                'next': '下一頁',
                'last': '最後一頁'
            },
            'aria': {
                'sortAscending': ': 升冪排列',
                'sortDescending': ': 降冪排列'
            }
        }
    });
}
</script>