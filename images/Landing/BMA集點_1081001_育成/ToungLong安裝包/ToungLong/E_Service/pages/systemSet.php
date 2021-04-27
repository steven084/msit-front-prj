<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- custom -->
    <link href="vendor/custom/css/custom.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">系統社區權限使用設置</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">系統社區權限使用設置</h4>
        </div>
        <div class="card-body">
            <form id="frm-example" method="post" onsubmit="return tableSubmit()">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-2">
                            <label for="">
                                選擇系統
                            </label>
                            <select name="SystemSelect" class="custom-select" onchange="getTableValue('tbody','SystemSelect','#dataTable')" required>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                <br />
                            </label>
                            <a href="#" onclick="">
                                <input class="btn btn-primary btn-block" type="button" value="新增系統" data-toggle="modal" data-target="#creSystemModal" />
                            </a>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                <br />
                            </label>
                            <a href="#" onclick="editSystemData()">
                                <input class="btn btn-primary btn-block" type="button" value="修改系統" data-toggle="modal" data-target="#editSystemModal" />
                            </a>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                <br />
                            </label>
                            <a href="#" onclick="">
                                <input class="btn btn-primary btn-block" type="button" value="刪除系統" data-toggle="modal" data-target="#delSystemModal" />
                            </a>
                        </div>
                        <div class="col-md-2" style="margin-bottom: 10px;">
                            <label for="">
                                <br />
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="確定修改" />
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>選擇社區ID</th>
                                <th>社區名稱</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal-->
<div class="modal fade" id="delSystemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return delSystemSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">確定要刪除?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    注意!! 此動作會刪除與此系統相關的所有資料。<br />
                    如果您已經確定，請選擇"刪除"。
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <input class="btn btn-danger " type="submit" value="刪除">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- editModal-->
<div class="modal fade" id="editSystemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return editSystemSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">修改系統</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>系統名稱：</label>
                            <input type="text" name="editSystem" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <input class="btn btn-primary " type="submit" value="修改">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- createModal-->
<div class="modal fade" id="creSystemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return creSystemSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">創建系統</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>系統名稱：</label>
                            <input type="text" name="creSystem" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">取消</button>
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
startGetSelectItem("SystemSelect", "");
var checkedRowsValue = [];

$(document).ready(function() {
    //如果該row被點選，則啟動checkbox的click
    $("#dataTable").delegate("tr.rows", "click", function(e) {
        if (event.target.type != 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
    });
});

function startGetSelectItem(functionName, Value) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/systemSet/getSelectItem.php",
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
        getTableValue("tbody", "SystemSelect", "#dataTable");
    });
}

function editSystemData() {
    var e = document.getElementsByName("SystemSelect")[0];
    var result = e.options[e.selectedIndex].text;
    document.getElementsByName("editSystem")[0].value = result;
}

function editSystemSubmit() {
    var ID = getSelectValue("SystemSelect");
    if (ID == 0) {
        alertMsg('danger', 'SystemTemp禁止修改。');
    } else {
        var Name = document.getElementsByName("editSystem")[0].value;
        $.ajax({
            type: "POST",
            url: "pages/systemSet/editSystem.php",
            data: {
                Name: Name,
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
                alertMsg('success', '修改成功!!');
                startGetSelectItem("SystemSelect", "");
                // location.href = "?function=systemSet";
            } else {
                alertMsg('danger', msg);
            }
            // $('#editSystemModal').modal('hide');
            hideModal('#editSystemModal');
        });
    }
    return false;
}

function creSystemSubmit() {
    var Name = document.getElementsByName("creSystem")[0].value;
    $.ajax({
        type: "POST",
        url: "pages/systemSet/creSystem.php",
        data: {
            Name: Name
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
            alertMsg('success', '建立成功!!');
            startGetSelectItem("SystemSelect", "");
            // location.href = "?function=systemSet";
        } else {
            alertMsg('danger', msg);
        }
        // $('#creSystemModal').modal('hide');
        hideModal('#creSystemModal');
    });
    return false;
}

function delSystemSubmit() {
    var ID = getSelectValue("SystemSelect");
    if (ID == 0) {
        alertMsg('danger', 'SystemTemp禁止刪除。');
    } else {
        $.ajax({
            type: "POST",
            url: "pages/systemSet/delSystem.php",
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
                location.href = "?function=systemSet";
            } else {
                alertMsg('danger', msg);
            }
            // $('#delSystemModal').modal('hide');
            hideModal('#delSystemModal');
        });
    }
    return false;
}

function checkedChange(e) {
    //判斷e 是否被checked,有則增加value至陣列.
    var value = e.value;
    if (e.checked) {
        e.closest('tr').classList.add("table-tr");;
        //增加值進入陣列
        checkedRowsValue.push(e.value);
    } else {
        e.closest('tr').classList.remove("table-tr");
        //刪除陣列中某個數值
        checkedRowsValue = checkedRowsValue.filter(function(e) { return e != value });
    }
}

function tableSubmit() {
    ID = getSelectValue("SystemSelect");
    $.ajax({
        type: "POST",
        url: "pages/systemSet/tableSubmit.php",
        data: {
            ID: ID,
            checkedRowsValue: checkedRowsValue
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
            alertMsg('success', '更新成功!!');
            getSelectItemIndex("CommunitySelect");
            // location.href = "?function=systemSet";
        } else {
            alertMsg('danger', msg);
        }
    });
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
        url: "pages/systemSet/getTableValue.php",
        data: { functionName: functionName, Value: Value },
        cache: false
        // ,
        // beforeSend: function() {
        //     document.getElementById("loader").style.display = "flex";
        // },
        // complete: function() {
        //     document.getElementById("loader").style.display = "none";
        // }
    }).done(function(msg) {
        result = msg.split("|");
        if (result.length > 1) {
            checkedRowsValue = [];
            value = result[0].split(",");
            for (i = 0; i < value.length - 1; i++) {
                checkedRowsValue.push(value[i]);
            }
            if ($.fn.DataTable.isDataTable(dataTableID)) {
                $(dataTableID).DataTable().destroy();
            }
            document.getElementById(functionName).innerHTML = result[1];
            setDataTable(dataTableID);
        } else {
            if ($.fn.DataTable.isDataTable(dataTableID)) {
                $(dataTableID).DataTable().destroy();
            }
            document.getElementById(functionName).innerHTML = result[0];
            setDataTable(dataTableID);
        }
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