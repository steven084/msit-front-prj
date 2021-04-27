<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">住戶繳費項目預設維護</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">住戶繳費項目預設維護</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-label-group row">
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="新增繳費項目" data-toggle="modal" data-target="#creModal" />
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" onclick="downloadHouExample()">
                            <label for="">
                                <br />
                            </label>
                            <input class="btn btn-primary btn-block" type="button" value="輸出新增大量處理範本(EXCEL)" readonly />
                        </a>
                    </div>
                    <div class="col-md-4">
                        <form method="post" enctype="multipart/form-data" id="creFileSubmit">
                            <label for="">
                                <br />
                            </label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="creFile" id="inputFile" class="custom-file-input" required>
                                    <label class="custom-file-label" for="inputFile">匯入新增大量處理(EXCEL)</label>
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
                            <th>刪除</th>
                            <th>修改</th>
                            <th>ID</th>
                            <th>類別名稱</th>
                            <th>項目名稱</th>
                            <th>項目代碼</th>
                            <th>預設金額</th>
                            <th>預設折扣金額</th>
                            <th>備註</th>
                            <th>維護者</th>
                            <th>異動日</th>
                            <th>社區繳費項目ID</th>
                            <th>住戶ID</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>總數</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th name="tfootTotalNum"></th>
                            <th name="tfootTotalNum"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody id="tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- createModal-->
<div class="modal fade" id="creModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return creModalSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增繳費項目</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>預設金額：</label>
                            <input type="number" min="0" name="creModalItem" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>預設折扣金額：</label>
                            <input type="number" min="0" name="creModalItem" class="form-control" value="0" required>
                        </div>
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>社區繳費ID：</label>
                            <input type="number" min="0" name="creModalItem" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>住戶ID：</label>
                            <input type="number" min="0" name="creModalItem" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">備註：</label>
                            <input type="text" name="creModalItem" class="form-control">
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

function downloadHouExample() {

    var FileContents = "預設金額,預設折扣金額,社區繳費ID,住戶ID,備註\n\n\n\n\n\n\n\n\n,,,,END";
    var FileName = "Example.csv";

    var EF = document.createElement('a');
    EF.setAttribute('href', 'data:text/csv;charset=utf-8,%EF%BB%BF' + encodeURIComponent(FileContents));
    EF.setAttribute('download', FileName);
    EF.click();
}

$('#inputFile').on('change', function() {
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
})

$("#creFileSubmit").submit(function(event) {
    var CommunityID = getSelectValue("CommunitySelect");
    event.preventDefault();
    var formData = new FormData(this);
    formData.append('CommunityID', CommunityID);
    $.ajax({
        type: "POST",
        url: "pages/houpayitemdefMaintain/creFile.php",
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
        getTableValue("tbody", "CommunitySelect", "#dataTable");
    });

});

function delModalSubmit(ID) {
    $.ajax({
        type: "POST",
        url: "pages/houpayitemdefMaintain/delModal.php",
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
            // location.href = "?function=comPayItemMaintain";
        } else {
            alertMsg('danger', msg);
        }
        // $('#delModal' + ID).modal('hide');
        hideModal('#delModal' + ID);
    });
    return false;
}

function editModalSubmit(ID, name) {
    var ID = ID;
    var CommunityID = getSelectValue("CommunitySelect");
    var DefaultMoney = document.getElementsByName(name)[0].value;
    var DefaultDisMoney = document.getElementsByName(name)[1].value;
    var es_compayitemID = document.getElementsByName(name)[2].value;
    var es_householdID = document.getElementsByName(name)[3].value;
    var Remark = document.getElementsByName(name)[4].value;
    $.ajax({
        type: "POST",
        url: "pages/houpayitemdefMaintain/editModal.php",
        data: {
            ID: ID,
            CommunityID: CommunityID,
            DefaultMoney: DefaultMoney,
            DefaultDisMoney: DefaultDisMoney,
            es_compayitemID: es_compayitemID,
            es_householdID: es_householdID,
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
            // location.href = "?function=comPayItemMaintain";
        } else {
            alertMsg('danger', msg);
        }
        // $('#editModal' + ID).modal('hide');
        hideModal('#editModal' + ID);
    });
    return false;
}

function getSelectValue(SelectName) {
    var e = document.getElementsByName(SelectName)[0];
    var result = e.options[e.selectedIndex].value;
    return result;
}

function creModalSubmit() {
    var ID = getSelectValue("CommunitySelect");
    var DefaultMoney = document.getElementsByName("creModalItem")[0].value;
    var DefaultDisMoney = document.getElementsByName("creModalItem")[1].value;
    var es_compayitemID = document.getElementsByName("creModalItem")[2].value;
    var es_householdID = document.getElementsByName("creModalItem")[3].value;
    var Remark = document.getElementsByName("creModalItem")[4].value;
    $.ajax({
        type: "POST",
        url: "pages/houpayitemdefMaintain/creModal.php",
        data: {
            ID: ID,
            DefaultMoney: DefaultMoney,
            DefaultDisMoney: DefaultDisMoney,
            es_compayitemID: es_compayitemID,
            es_householdID: es_householdID,
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
            alertMsg('success', '建立成功!!');
            getTableValue("tbody", "CommunitySelect", "#dataTable");
            // location.href = "?function=comPayItemMaintain";
        } else {
            alertMsg('danger', msg);
        }
        // $('#creModal').modal('hide');
        hideModal('#creModal');
    });
    return false;
}


function getTableValue(functionName, Value, dataTableID) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/houpayitemdefMaintain/getTableValue.php",
        data: {
            functionName: functionName,
            Value: Value
        },
        cache: false
    }).done(function(msg) {
                var msgTemp = msg.split('$');
                var msgTemp2 = msgTemp[1].split(',');
                document.getElementsByName("tfootTotalNum")[0].innerHTML = msgTemp2[0];
                document.getElementsByName("tfootTotalNum")[1].innerHTML = msgTemp2[1];
                msg = msgTemp[0];
                // ------------------------------------------
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
