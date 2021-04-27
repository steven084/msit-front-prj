<head>
    <!-- datetimepicker -->
    <link href="vendor/bootstrap/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/datetimepicker/css/bootstrap-datetimepicker-font.css" rel="stylesheet">
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">管理費繳納管理(代銷帳)</h1>
    <!-- <p class="mb-4">說明：查詢</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">查詢-管理費繳納管理(代銷帳)</h6>
        </div>
        <div class="card-body">
            <form method="post" onsubmit="">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-2">
                            <label for="">
                                棟別名稱：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                住戶：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                繳費時間：
                            </label>
                            <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" readonly id="form_datetime">
                            <input type="hidden" id="dtp_input1" value="" />
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                收據編號：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="dtp_input1">
                                銀行入帳日期：
                            </label>
                            <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" readonly id="form_datetime2">
                            <input type="hidden" id="dtp_input1" value="" /><br />
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                入帳銀行帳號：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                收款人：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for=""><br>
                            </label>
                            <a data-toggle="modal" href="#" onclick="pageLoadPayeeEditing()">
                            <button class="btn btn-primary btn-block" onclick="" type="button">收款人編輯</button>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <!-- <label for=""><br>
                            </label>
                            <a data-toggle="modal" href="#" onclick="pageLoadModify()">
                            <button class="btn btn-primary btn-block" onclick="" type="button">住戶管理費繳費單增加項目(已沖帳完)</button>
                            </a> -->
                        </div>
                        <div class="col-md-3">
                            <!-- <label for=""><br>
                            </label>
                            <a data-toggle="modal" href="#" onclick="pageLoadAmountModification()">
                            <button class="btn btn-primary btn-block" onclick="" type="button">住戶繳費單金額修改(已沖帳完)</button>
                            </a> -->
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-2">
                            <!-- <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadProduction()">
                            <button class="btn btn-primary btn-block" onclick="" type="button">單戶繳費單製作</button>
                            </a> -->
                        </div>
                        <div class="col-md-2">
                            <!-- <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadPaymentDeleted()">
                            <button class="btn btn-primary btn-block" onclick="" type="button">繳費單刪除</button>
                            </a> -->
                        </div>
                        <div class="col-md-2">
                            <!-- <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadManagementModification()">
                            <button class="btn btn-primary btn-block" onclick="" type="button">住宅管理費資料修改</button>
                            </a> -->
                        </div>
                        <div class="col-md-2">
                            <!-- <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadProjectInquiry()">
                            <button class="btn btn-primary btn-block" onclick="" type="button">項目備註查詢</button>
                            </a> -->
                        </div>
                        <div class="col-md-2">
                            <!-- <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadReceiptInquiry()">
                            <button class="btn btn-primary btn-block" onclick="" type="button">收據查詢</button>
                            </a> -->
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-12">
                            <hr />
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>選擇</th>
                            <th>繳費期數</th>
                            <th>費用期間</th>
                            <th>繳費期限</th>
                            <th>應繳金額</th>
                            <th>累計已繳費金額</th>
                            <th>暫列呆帳</th>
                            <th>暫列呆帳說明</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a data-toggle="modal" href="#viewModal" onclick="pageLoadDetermine()">
                                    <i class="far fa-eye fa-stack fa-1x text-info text-center"></i>
                                </a>
                            </td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- indexContent2 -->
<div id="indexContent2"></div>
<!-- /.container-fluid -->
<script type='text/javascript'>
//查看
function pageLoadDetermine() {
    $("#indexContent2").load("pages/administrativeExpensesWriteOff/determine.php", pageLoadComplete());
}
//收款人編輯
function pageLoadPayeeEditing() {
    $("#indexContent2").load("pages/administrativeExpensesWriteOff/PayeeEditing.php", pageLoadComplete());
}
//住戶管理費繳費單增加項目(已沖帳完)
function pageLoadModify() {
    $("#indexContent2").load("pages/administrativeExpensesWriteOff/modify.php", pageLoadComplete());
}
//住戶繳費單金額修改(已沖帳完)
function pageLoadAmountModification() {
    $("#indexContent2").load("pages/administrativeExpensesWriteOff/amountModification.php", pageLoadComplete());
}
//住宅管理費資料修改
function pageLoadManagementModification() {
    $("#indexContent2").load("pages/administrativeExpensesWriteOff/ManagementModification.php", pageLoadComplete());
}
//項目備註查詢
function pageLoadProjectInquiry() {
    $("#indexContent2").load("pages/administrativeExpensesWriteOff/ProjectInquiry.php", pageLoadComplete());
}
//收據查詢
function pageLoadReceiptInquiry() {
    $("#indexContent2").load("pages/administrativeExpensesWriteOff/ReceiptInquiry.php", pageLoadComplete());
}
//單戶繳費單製作
function pageLoadProduction() {
    $("#indexContent2").load("pages/administrativeExpensesWriteOff/production.php", pageLoadComplete());
}
//繳費單刪除
function pageLoadPaymentDeleted() {
    $("#indexContent2").load("pages/administrativeExpensesWriteOff/delete.php", pageLoadComplete());
}

$(document).ready(function() {
    $('#dataTable').DataTable({
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

});
</script>
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- datetimepicker -->
<!-- <script src="vendor/bootstrap/datetimepicker/js/bootstrap-datetimepicker.min.js"></script> -->
<script src="vendor/bootstrap/datetimepicker/js/locales/bootstrap-datetimepicker.zh-TW.js"></script>
<script type="text/javascript">
$('#form_datetime').datetimepicker({
    language: 'zh-TW',
    weekStart: 7,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1,
    format: "yyyy/mm/dd-HH:ii",
    minuteStep: 5,
});
$('#form_datetime2').datetimepicker({
    language: 'zh-TW',
    weekStart: 7,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1,
    format: "yyyy/mm/dd",
    minuteStep: 5,
    minView: "month",
});
</script>