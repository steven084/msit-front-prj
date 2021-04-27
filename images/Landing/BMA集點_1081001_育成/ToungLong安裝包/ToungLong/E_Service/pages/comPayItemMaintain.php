<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">社區繳費項目維護</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">社區繳費項目維護</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-label-group row">
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="新增繳費項目" data-toggle="modal" data-target="#creComPayItemModal" />
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
                            <th>類別名稱</th>
                            <th>項目名稱</th>
                            <th>項目代碼</th>
                            <th>預設金額</th>
                            <th>預設折扣金額</th>
                            <th>備註</th>
                            <th>維護者</th>
                            <th>異動日</th>
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
<div class="modal fade" id="creComPayItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return creComPayItemSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增繳費項目</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>類別名稱：</label>
                            <input type="text" name="creComPayItem" class="form-control" value="收入" readonly required>
                        </div>
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>項目名稱：</label>
                            <input type="text" name="creComPayItem" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>項目代碼：</label>
                            <input type="text" name="creComPayItem" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>預設金額：</label>
                            <input type="number" min="0" name="creComPayItem" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>預設折扣金額：</label>
                            <input type="number" min="0" name="creComPayItem" class="form-control" value="0" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">備註：</label>
                            <input type="text" name="creComPayItem" class="form-control">
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


function delModalSubmit(ID) {
    $.ajax({
        type: "POST",
        url: "pages/comPayItemMaintain/delModal.php",
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
    var ClassName = document.getElementsByName(name)[0].value;
    var ItemName = document.getElementsByName(name)[1].value;
    var ItemCode = document.getElementsByName(name)[2].value;
    var DefaultMoney = document.getElementsByName(name)[3].value;
    var DefaultDisMoney = document.getElementsByName(name)[4].value;
    var Remark = document.getElementsByName(name)[5].value;
    $.ajax({
        type: "POST",
        url: "pages/comPayItemMaintain/editModal.php",
        data: {
            ID: ID,
            ClassName: ClassName,
            ItemName: ItemName,
            ItemCode: ItemCode,
            DefaultMoney: DefaultMoney,
            DefaultDisMoney: DefaultDisMoney,
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

function creComPayItemSubmit() {
    var ID = getSelectValue("CommunitySelect");
    var ClassName = document.getElementsByName("creComPayItem")[0].value;
    var ItemName = document.getElementsByName("creComPayItem")[1].value;
    var ItemCode = document.getElementsByName("creComPayItem")[2].value;
    var DefaultMoney = document.getElementsByName("creComPayItem")[3].value;
    var DefaultDisMoney = document.getElementsByName("creComPayItem")[4].value;
    var Remark = document.getElementsByName("creComPayItem")[5].value;
    $.ajax({
        type: "POST",
        url: "pages/comPayItemMaintain/creComPayItem.php",
        data: {
            ID: ID,
            ClassName: ClassName,
            ItemName: ItemName,
            ItemCode: ItemCode,
            DefaultMoney: DefaultMoney,
            DefaultDisMoney: DefaultDisMoney,
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
        // $('#creComPayItemModal').modal('hide');
        hideModal('#creComPayItemModal');
    });
    return false;
}


function getTableValue(functionName, Value, dataTableID) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/comPayItemMaintain/getTableValue.php",
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
