<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">商城利潤分配設定</h1>
    <p class="mb-4">
        說明：利潤分配依照百分比分配，如有超過百分比或低於百分比將會導致利潤分配不平衡!!<br />
        注意：如果將給予使用者目標設定為 0 ，意旨給予購買者的回饋點數。
    </p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">商城利潤分配設定</h4>
            <br />
            <h6 class="m-0 font-weight-bold text-gray">
                說明：利潤分配依照百分比分配，如有超過百分比或低於百分比將會導致利潤分配不平衡!!<br />
                注意：如果將給予使用者目標設定為 0 ，意旨給予購買者的回饋點數。
            </h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-label-group row">
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="新增利潤分配" data-toggle="modal" data-target="#creProfitModal" />
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
                            <th>利潤率</th>
                            <th>給予使用者ID</th>
                            <th>使用者帳號</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>總數</th>
                            <th></th>
                            <th></th>
                            <th name="tfootTotalNum"></th>
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
<div class="modal fade" id="creProfitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return creProfitSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增利潤分配</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>利潤分配百分比(%)</label>
                            <input type="number" min="0" name="creProfit" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>利潤分配人ID</label>
                            <input type="number" min="0" name="creProfit" class="form-control" required>
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
    getTableValue("tbody", "#dataTable", "CommunitySelect");
});

function delModalSubmit(ID) {
    $.ajax({
        type: "POST",
        url: "pages/shProfitSetting/delModal.php",
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
            getTableValue("tbody", "#dataTable", "CommunitySelect");
            // location.href = "?function=shProfitSetting";
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
    var profitRate = document.getElementsByName(name)[0].value;
    var es_accountID = document.getElementsByName(name)[1].value;
    $.ajax({
        type: "POST",
        url: "pages/shProfitSetting/editModal.php",
        data: {
            ID: ID,
            profitRate: profitRate,
            es_accountID: es_accountID
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
            getTableValue("tbody", "#dataTable", "CommunitySelect");
            // location.href = "?function=shProfitSetting";
        } else {
            alertMsg('danger', msg);
        }
        // $('#editModal' + ID).modal('hide');
        hideModal('#editModal' + ID);
    });
    return false;
}

function creProfitSubmit() {
    var CommunitySelect = getSelectValue("CommunitySelect");
    var profitRate = document.getElementsByName("creProfit")[0].value;
    var es_accountID = document.getElementsByName("creProfit")[1].value;
    $.ajax({
        type: "POST",
        url: "pages/shProfitSetting/creModal.php",
        data: {
            CommunitySelect: CommunitySelect,
            profitRate: profitRate,
            es_accountID: es_accountID
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
            getTableValue("tbody", "#dataTable", "CommunitySelect");
            // location.href = "?function=shProfitSetting";
        } else {
            alertMsg('danger', msg);
        }
        // $('#creProfitModal').modal('hide');
        hideModal('#creProfitModal');
    });
    return false;
}

function getSelectValue(SelectName) {
    var e = document.getElementsByName(SelectName)[0];
    var result = e.options[e.selectedIndex].value;
    return result;
}

function getTableValue(functionName, dataTableID, CommunitySelect) {
    var CommunitySelect = getSelectValue(CommunitySelect);
    $.ajax({
        type: "POST",
        url: "pages/shProfitSetting/getTableValue.php",
        data: {
            functionName: functionName,
            CommunitySelect: CommunitySelect
        },
        cache: false
    }).done(function(msg) {
        var msgTemp = msg.split('$');
        var msgTemp2 = msgTemp[1].split(',');
        document.getElementsByName("tfootTotalNum")[0].innerHTML = msgTemp2[0];
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