<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- custom -->
    <link href="vendor/custom/css/custom.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">使用者權限設置</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">使用者權限設置</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-label-group row">
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="pageLoadClass()">
                            <input class="btn btn-primary btn-block" type="button" value="預設創建類別" readonly />
                        </a>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            創建使用者預設權限類別
                        </label>
                        <select name="ClassSelect" class="custom-select" onchange="getSelectItem('UserSelect','ClassSelect')" required>
                            <!-- <option value="1" selected></option> -->
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            選擇使用者
                        </label>
                        <select name="UserSelect" class="custom-select" onchange="getTableValue('tbody','UserSelect','#dataTable');getSelectItem('SystemSelect', 'UserSelect');" required>
                            <!-- <option value="1" selected></option> -->
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            目前此使用者所選系統
                        </label>
                        <input type="text" name="curUserSelect" class="form-control" readonly>
                        </input>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            選擇使用者使用系統
                        </label>
                        <select name="SystemSelect" class="custom-select" required>
                            <!-- <option value="1" selected></option> -->
                        </select>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="新增使用者" data-toggle="modal" data-target="#creUserModal" />
                        </a>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="editUserData()">
                            <input class="btn btn-primary btn-block" type="button" value="修改使用者" data-toggle="modal" data-target="#editUserModal" />
                        </a>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="刪除使用者" data-toggle="modal" data-target="#delUserModal" />
                        </a>
                    </div>
                    <div class="col-md-2" style="margin-bottom: 10px;">
                        <form id="frm-example" method="post" onsubmit="return tableSubmit()">
                            <label for="">
                                <br />
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="確定修改" />
                        </form>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <a href="#" onclick="downloadUserExample()">
                            <label for="">
                                <br />
                            </label>
                            <input class="btn btn-primary btn-block" type="button" value="輸出新增使用者大量處理範本(EXCEL)" readonly />
                        </a>
                    </div>
                    <div class="col-md-4">
                        <form method="post" enctype="multipart/form-data" id="crePerFileSubmit">
                            <label for="">
                                <br />
                            </label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="crePerFile" id="inputFile" class="custom-file-input" required>
                                    <label class="custom-file-label" for="inputFile">匯入新增使用者大量處理(EXCEL)</label>
                                </div>
                                <div class="input-group-append">
                                    <input type="submit" value="Upload" class="input-group-text">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>選擇功能ID</th>
                            <th>功能名稱</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal-->
<div class="modal fade" id="delUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return delUserSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">確定要刪除?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    注意!! 此動作會刪除與此使用者相關的所有資料。<br />
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
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return editUserSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">修改使用者</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>使用者名稱：</label>
                            <input type="text" name="editUser" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>住戶ID：</label>
                            <input type="text" name="editUser" class="form-control" required>
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
<div class="modal fade" id="creUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return creUserSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">創建使用者</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>使用者名稱：</label>
                            <input type="text" name="creUser" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>使用者密碼：</label>
                            <input type="text" name="creUser" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>住戶ID：</label>
                            <input type="text" name="creUser" class="form-control" value="0" required>
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
<!-- indexContent2 -->
<div id="indexContent2">
</div>
<!-- <div style="display: none;">
    <table id="jqGrid"></table>
</div> -->
<!-- bootstrap.bundle -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- JQGrid -->
<!-- <script src="vendor/Guriddo_jqGrid_JS_5.4.0/js/jquery.jqGrid.min.js"></script> -->
<!-- <script src="vendor/Guriddo_jqGrid_JS_5.4.0/js/i18n/grid.locale-tw.js"></script> -->
<!-- JQGrid Excel -->
<!-- <script src="vendor/Guriddo_jqGrid_JS_5.4.0/js/jszip.min.js"></script> -->
<script type="text/javascript">
// setJQGrid('#jqGrid', 'creUserExample');

$('#inputFile').on('change', function() {
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
})

$("#crePerFileSubmit").submit(function(event) {
    var ID = getSelectValue("ClassSelect");
    event.preventDefault();
    var formData = new FormData(this);
    formData.append('ID', ID);
    $.ajax({
        type: "POST",
        url: "pages/permissionSet/crePerFile.php",
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
        alertMsg('info', msg);
    });

});

function downloadUserExample() {

    var FileContents = "userName,passWord,householdID\n\n\n\n\n\n\n\n\n,,END";
    var FileName = "UserExample.csv";

    var EF = document.createElement('a');
    EF.setAttribute('href', 'data:text/csv;charset=utf-8,%EF%BB%BF' + encodeURIComponent(FileContents));
    EF.setAttribute('download', FileName);
    EF.click();
}

// function setJQGrid(ID, fileName) {
//     $(ID).jqGrid({
//         url: 'pages/permissionSet/jqGrid/' + fileName + '.json',
//         datatype: "json",
//         colModel: [
//             { label: 'userName', name: 'userName', width: 100, resizable: true },
//             { label: 'passWord', name: 'passWord', width: 100, resizable: true },
//             { label: 'householdID', name: 'householdID', width: 100, resizable: true }
//         ],
//         loadonce: true,
//         viewrecords: true,
//         footerrow: true,
//         userDataOnFooter: true,
//         // width: 780,
//         // height: 200,
//         // rowNum: 150,
//         loadComplete: function(data) {
//             getJQGrid(ID, fileName);
//         }
//     }).trigger('reloadGrid');
// }

// function getJQGrid(ID, fileName) {
//     $(ID).jqGrid("exportToCsv", {
//         includeLabels: true,
//         includeGroupHeader: true,
//         includeFooter: true,
//         fileName: fileName + ".csv",
//         maxlength: 40 // maxlength for visible string data
//     });
// }
</script>
<!-- /.container-fluid -->
<script type='text/javascript'>
startGetSelectItem("ClassSelect", "", "1");
var checkedRowsValue = [];

function getSelectItem3(functionName, Value) {
    if (Value != "") {
        Value2 = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/permissionSet/getSelectItem.php",
        data: {
            functionName: functionName,
            Value: Value2
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
        var curValue = "";
        if (functionName == "curUserSelect") {
            curValue = document.getElementsByName('SystemSelect')[0].options[msg].text;
        } else {
            curValue = document.getElementsByName('SystemSelect2')[0].options[msg].text;
        }
        document.getElementsByName(functionName)[0].value = curValue;
    });
}
$(document).ready(function() {
    //如果該row被點選，則啟動checkbox的click
    $("#dataTable2").delegate("tr.rows", "click", function(e) {
        if (event.target.type != 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
    });
});

function startGetSelectItem(functionName, Value, sequence) {
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
        if (sequence == "1") {
            startGetSelectItem("UserSelect", "ClassSelect", "2");
        } else if (sequence == "2") {
            startGetSelectItem("SystemSelect", "UserSelect", "3");
            getTableValue("tbody", "UserSelect", "#dataTable");
        }
    });
}

$(document).ready(function() {
    //如果該row被點選，則啟動checkbox的click
    $("#dataTable").delegate("tr.rows", "click", function(e) {
        if (event.target.type != 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
    });
});

function pageLoadClass() {
    $("#indexContent2").load("pages/permissionSet/Class.php");
}

function editUserData() {
    var e = document.getElementsByName("UserSelect")[0];
    var result = e.options[e.selectedIndex].text;
    document.getElementsByName("editUser")[0].value = result;
    var ID = getSelectValue("UserSelect");
    $.ajax({
        type: "POST",
        url: "pages/permissionSet/editUserData.php",
        data: {
            ID: ID
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
        document.getElementsByName("editUser")[1].value = msg;
    });
}

function editUserSubmit() {
    var ID = getSelectValue("UserSelect");
    if (ID == 0) {
        alertMsg('danger', 'SystemTemp禁止修改。');
    } else {
        var Name = document.getElementsByName("editUser")[0].value;
        var householdID = document.getElementsByName("editUser")[1].value;
        $.ajax({
            type: "POST",
            url: "pages/permissionSet/editUser.php",
            data: {
                Name: Name,
                ID: ID,
                householdID: householdID
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
                getSelectItem('UserSelect', 'ClassSelect');
                // location.href= "?function=permissionSet";
            } else {
                alertMsg('danger', msg);
            }
            // $('#editUserModal').modal('hide');
            hideModal('#editUserModal');
        });
    }
    return false;
}

function creUserSubmit() {
    var ID = getSelectValue("ClassSelect");
    var Name = document.getElementsByName("creUser")[0].value;
    var Password = document.getElementsByName("creUser")[1].value;
    var householdID = document.getElementsByName("creUser")[2].value;
    $.ajax({
        type: "POST",
        url: "pages/permissionSet/creUser.php",
        data: {
            ID: ID,
            Name: Name,
            Password: Password,
            householdID: householdID
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
            getSelectItem('UserSelect', 'ClassSelect');
            // location.href = "?function=permissionSet";
        } else {
            alertMsg('danger', msg);
        }
        // $('#creUserModal').modal('hide');
        hideModal('#creUserModal');
    });
    return false;
}

function delUserSubmit() {
    var ID = getSelectValue("UserSelect");
    if (ID == 0) {
        alertMsg('danger', 'SystemTemp禁止刪除。');
    } else {
        $.ajax({
            type: "POST",
            url: "pages/permissionSet/delUser.php",
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
                getSelectItem('UserSelect', 'ClassSelect');
                // location.href = "?function=permissionSet";
            } else {
                alertMsg('danger', msg);
            }
            // $('#delUserModal').modal('hide');
            hideModal('#delUserModal');
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
    ID = getSelectValue("UserSelect");

    if (ID == 0) {
        alertMsg('danger', 'SystemTemp禁止修改。');
    } else {
        SystemID = getSelectValue("SystemSelect");
        $.ajax({
            type: "POST",
            url: "pages/permissionSet/tableSubmit.php",
            data: {
                ID: ID,
                checkedRowsValue: checkedRowsValue,
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
                alertMsg('success', '更新成功!!');
                var e = document.getElementsByName('SystemSelect')[0];
                var curValue = e.options[e.selectedIndex].text;
                document.getElementsByName('curUserSelect')[0].value = curValue;

                // location.href = "?function=permissionSet";
            } else {
                alertMsg('danger', msg);
            }
        });
    }
    return false;
}


function getSelectValue(SelectName) {
    var e = document.getElementsByName(SelectName)[0];
    var result = e.options[e.selectedIndex].value;
    return result;
}

function getSelectItem(functionName, Value) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/permissionSet/getSelectItem.php",
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
        document.getElementsByName(functionName)[0].innerHTML = msg;
        getTableValue("tbody", "UserSelect", "#dataTable");
        if(functionName == 'SystemSelect'){
            var e = document.getElementsByName(functionName)[0];
            var result = e.options[e.selectedIndex].text;
            document.getElementsByName('curUserSelect')[0].value = result;
        }
    });
}

function getTableValue(functionName, Value, dataTableID) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/permissionSet/getTableValue.php",
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
        getSelectItem3("curUserSelect", "UserSelect");
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