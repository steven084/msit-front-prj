<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">商城訂單維護-訂單完成處理</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">商城訂單維護-訂單完成處理</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>訂單完成</th>
                            <th>訂單編號</th>
                            <th>訂購人戶號</th>
                            <th>訂購人</th>
                            <th>訂購人電話</th>
                            <th>訂單狀態</th>
                            <th>訂購日期</th>
                            <th>明細查看</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="getPayPrintIndex">
</div>
<!-- bootstrap.bundle -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- /.container-fluid -->
<script type='text/javascript'>
$(document).ready(function(e) {
    getTableValue("tbody", "#dataTable");
});

function finishModalSubmit(ID) {
    var CommunityID = getSelectValue("CommunitySelect");
    $.ajax({
        type: "POST",
        url: "pages/shOrderMaintain2/finishModalSubmit.php",
        data: {
            ID: ID,
            CommunityID: CommunityID
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
            getPayPrint(ID,CommunityID);
            getTableValue("tbody", "#dataTable");
            // location.href = "?function=shOrderMaintain2";
        } else {
            alertMsg('danger', msg);
        }
        // $('#finishModal' + ID).modal('hide');
        hideModal('#finishModal' + ID);
    });
    return false;
}

function getPayPrint(ID,CommunityID) {
    var url = "./pages/shOrderMaintain2/print/getPayPrint.php";
    var strHTML = '<form id="getPayPrintForm" style="display:none;" method="post" action="' + url + '" target="TheWindow">';
    strHTML += '<input type="hidden" name="CommunityID" value="' + CommunityID + '" />';
    strHTML += '<input type="hidden" name="ID" value="' + ID + '" />';
    strHTML += '</form>';
    document.getElementById('getPayPrintIndex').innerHTML = strHTML;
    document.getElementById('getPayPrintForm').submit();
    return false;
}

function getTableValue(functionName, dataTableID) {
    var CommunityID = getSelectValue("CommunitySelect");
    $.ajax({
        type: "POST",
        url: "pages/shOrderMaintain2/getTableValue.php",
        data: {
            functionName: functionName,
            CommunityID: CommunityID
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

function getSelectValue(SelectName) {
    var e = document.getElementsByName(SelectName)[0];
    var result = e.options[e.selectedIndex].value;
    return result;
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
        },
        order: [
            [1, 'desc']
        ]
    });
}
</script>