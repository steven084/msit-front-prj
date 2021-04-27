<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">使用者權限設置</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <!-- <h2 class="m-0 font-weight-bold text-primary"><span name="TitleNews">東隆保全系統</span> - 最新消息</h2> -->
            <h4 class="m-0 font-weight-bold text-primary"><span name="TitleNews">東隆保全系統</span> - 最新消息</h4>
        </div>
        <div class="card-body">
            <form id="frm-example" method="post" onsubmit="return tableSubmit()">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                        <h5>
                            <thead>
                                <tr class="rows">
                                    <th width="20%">更新時間</th>
                                    <th width="60%">主要內容</th>
                                    <th width="20%">維護人</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                        </h5>
                    </table>
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
getTableValue("tbody", "#dataTable");
getTitleContent("TitleNews");

function getTitleContent(functionName) {
    $.ajax({
        type: "POST",
        url: "pages/start/dashboard/getTitleContent.php",
        data: {
            functionName: functionName
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

function getTableValue(functionName, dataTableID) {
    $.ajax({
        type: "POST",
        url: "pages/start/dashboard/getTableValue.php",
        data: { functionName: functionName },
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
        },
        order: [
            [0, 'desc']
        ]
    });
}
</script>