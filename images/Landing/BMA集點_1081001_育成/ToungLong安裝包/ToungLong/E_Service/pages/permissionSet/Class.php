<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<hr />
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">創建使用者預設設置</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">創建使用者預設設置</h4>
        </div>
        <div class="card-body">
            <form id="frm-example" method="post" onsubmit="return tableSubmit2()">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-2">
                            <label for="">
                                <br />
                            </label>
                            <a href="#" onclick="">
                                <input class="btn btn-primary btn-block" type="button" value="新增類別" data-toggle="modal" data-target="#creClassModal" />
                            </a>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                選擇使用者預設權限類別
                            </label>
                            <select name="ClassSelect2" class="custom-select" onchange="getTableValue2('tbody2','ClassSelect2','#dataTable2')" required>
                                <!-- <option value="1" selected></option> -->
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                目前此權限類別所選系統
                            </label>
                            <input type="text" name="curClassSelect2" class="form-control" readonly>
                            </input>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                創建使用者預設系統類別
                            </label>
                            <select name="SystemSelect2" class="custom-select" required>
                                <!-- <option value="1" selected></option> -->
                            </select>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                <br />
                            </label>
                            <a href="#" onclick="editClassData()">
                                <input class="btn btn-primary btn-block" type="button" value="修改類別" data-toggle="modal" data-target="#editClassModal" />
                            </a>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                <br />
                            </label>
                            <a href="#" onclick="">
                                <input class="btn btn-primary btn-block" type="button" value="刪除類別" data-toggle="modal" data-target="#delClassModal" />
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
                    <table class="table table-bordered text-nowrap" id="dataTable2" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>選擇功能ID</th>
                                <th>功能名稱</th>
                            </tr>
                        </thead>
                        <tbody id="tbody2">
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal-->
<div class="modal fade" id="delClassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return delClassSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">確定要刪除?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    注意!! 此動作會刪除與此類別相關的所有使用者。<br />
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
<div class="modal fade" id="editClassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return editClassSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">修改類別</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>類別名稱：</label>
                            <input type="text" name="editClass" class="form-control" required>
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
<div class="modal fade" id="creClassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return creClassSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">創建類別</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>類別名稱：</label>
                            <input type="text" name="creClass" class="form-control" required>
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
<script>
startGetSelectItem2("ClassSelect2", "");

var checkedRowsValue2 = [];

$(document).ready(function() {
    //如果該row被點選，則啟動checkbox的click
    $("#dataTable2").delegate("tr.rows", "click", function(e) {
        if (event.target.type != 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
    });
});

function startGetSelectItem2(functionName, Value) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/permissionSet/getSelectItem.php",
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
        getSelectItem2("SystemSelect2", "ClassSelect2");
        getTableValue2("tbody2", "ClassSelect2", "#dataTable2");
    });
}

function getSelectItem2(functionName, Value) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/permissionSet/getSelectItem.php",
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

function editClassData() {
    var e = document.getElementsByName("ClassSelect2")[0];
    var result = e.options[e.selectedIndex].text;
    document.getElementsByName("editClass")[0].value = result;
}

function editClassSubmit() {
    var ID = getSelectValue("ClassSelect2");
    var Name = document.getElementsByName("editClass")[0].value;
    if (ID == 0) {
        alertMsg('danger', 'SystemTemp禁止修改。');
    } else {
        $.ajax({
            type: "POST",
            url: "pages/permissionSet/Class/editClass.php",
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
                startGetSelectItem2("ClassSelect2", "");
                // location.href = "?function=permissionSet";
            } else {
                alertMsg('danger', msg);
            }
            // $('#editClassModal').modal('hide');
            hideModal('#editClassModal');
        });
    }
    return false;
}

function creClassSubmit() {
    var Name = document.getElementsByName("creClass")[0].value;
    var SystemID = getSelectValue("SystemSelect2");
    $.ajax({
        type: "POST",
        url: "pages/permissionSet/Class/creClass.php",
        data: {
            Name: Name,
            SystemID: SystemID
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
            startGetSelectItem("ClassSelect", "", "1");
            startGetSelectItem2("ClassSelect2", "");
            // location.href = "?function=permissionSet";
        } else {
            alertMsg('danger', msg);
        }
        // $('#creClassModal').modal('hide');
        hideModal('#creClassModal');
    });
    return false;
}

function delClassSubmit() {
    var ID = getSelectValue("ClassSelect2");

    if (ID == 0) {
        alertMsg('danger', 'SystemTemp禁止刪除。');
    } else {
        $.ajax({
            type: "POST",
            url: "pages/permissionSet/Class/delClass.php",
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
                startGetSelectItem2("ClassSelect2", "");
                // location.href = "?function=permissionSet";
            } else {
                alertMsg('danger', msg);
            }
            // $('#delClassModal').modal('hide');
            hideModal('#delClassModal');
        });
    }
    return false;
}

function checkedChange2(e) {
    //判斷e 是否被checked,有則增加value至陣列.
    var value = e.value;
    if (e.checked) {
        e.closest('tr').classList.add("table-tr");;
        //增加值進入陣列
        checkedRowsValue2.push(e.value);
    } else {
        e.closest('tr').classList.remove("table-tr");
        //刪除陣列中某個數值
        checkedRowsValue2 = checkedRowsValue2.filter(function(e) { return e != value });
    }
}

function getTableValue2(functionName, Value, dataTableID) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/permissionSet/getTableValue.php",
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
        result = msg.split("|");
        if (result.length > 1) {
            checkedRowsValue2 = [];
            value = result[0].split(",");
            for (i = 0; i < value.length - 1; i++) {
                checkedRowsValue2.push(value[i]);
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
        getSelectItem3("curClassSelect2", "ClassSelect2");
    });
    return false;
}

function tableSubmit2() {
    var SystemID = getSelectValue("SystemSelect2");
    var ID = getSelectValue("ClassSelect2");

    if (ID == 0) {
        alertMsg('danger', 'SystemTemp禁止修改。');
    } else {
        $.ajax({
            type: "POST",
            url: "pages/permissionSet/tableSubmit2.php",
            data: {
                ID: ID,
                checkedRowsValue: checkedRowsValue2,
                SystemID: SystemID
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
                getSelectItem3("curClassSelect2", "ClassSelect2");
                alertMsg('success', '更新成功!!');
                // location.href = "?function=permissionSet";
            } else {
                alertMsg('danger', msg);
            }
        });
    }
    return false;
}
</script>
