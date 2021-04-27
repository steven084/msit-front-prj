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
    <h1 class="h3 mb-2 text-gray-800">管理費繳納管理</h1>
    <!-- <p class="mb-4">說明：查詢</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">查詢-管理費繳納管理</h6>
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
                                <option value="D棟">D棟</option>
                                <option value="E棟">E棟</option>
                                <option value="F棟">F棟</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                住戶：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">D1:方俊智</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                繳費時間：
                            </label>
                            <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" readonly id="form_datetime1">
                            <input type="hidden" id="dtp_input1" value="" />
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                收據編號：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">0001</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                銀行入帳日期：
                            </label>
                            <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" readonly id="form_datetime2">
                            <input type="hidden" id="dtp_input1" value="" />
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                入帳銀行帳號：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">合作金庫(3476871000234)</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">
                            </label>
                            <a data-toggle="modal" href="#" onclick="">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="收據維護" />
                            </a>
                        </div>
                        <div class="col-md-3">
                            <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="繳費登錄" />
                            </a>
                        </div>
                        <div class="col-md-3">
                            <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="住戶尚未繳款管理費記錄" />
                            </a>
                        </div>
                        <div class="col-md-3">
                            <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="近期未結算繳費明細列表" />
                            </a>
                        </div>
                        <div class="col-md-3">
                            <label for="">
                            </label>
                            <a data-toggle="modal" href="#" onclick="pageLoadModify()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="住戶管理費繳費單增加項目(已沖帳完)" />
                            </a>
                        </div>
                        <div class="col-md-3">
                            <label for="">
                            </label>
                            <a data-toggle="modal" href="#" onclick="pageLoadAmountModification()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="住戶繳費單金額修改(已沖帳完)" />
                            </a>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                            </label>
                            <a data-toggle="modal" href="#" onclick="pageLoadManagementModification()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="住宅管理費資料修改" />
                            </a>
                        </div>
                        <div class="col-md-2">
                            <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadProjectInquiry()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="項目備註查詢" />
                            </a>
                        </div>
                        <div class="col-md-2">
                            <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadReceiptInquiry()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="收據查詢" />
                            </a>
                        </div>
                        <div class="col-md-12">
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
//住戶管理費繳費單增加項目(已沖帳完)
function pageLoadModify() {
    $("#indexContent2").load("pages/administrativeExpensesPay/modify.php", pageLoadComplete());
}
//住戶繳費單金額修改(已沖帳完)
function pageLoadAmountModification() {
    $("#indexContent2").load("pages/administrativeExpensesPay/amountModification.php", pageLoadComplete());
}
//住宅管理費資料修改
function pageLoadManagementModification() {
    $("#indexContent2").load("pages/administrativeExpensesPay/ManagementModification.php", pageLoadComplete());
}
//項目備註查詢
function pageLoadProjectInquiry() {
    $("#indexContent2").load("pages/administrativeExpensesPay/ProjectInquiry.php", pageLoadComplete());
}
//收據查詢
function pageLoadReceiptInquiry() {
    $("#indexContent2").load("pages/administrativeExpensesPay/ReceiptInquiry.php", pageLoadComplete());
}
//查看
function pageLoadDetermine() {
    $("#indexContent2").load("pages/administrativeExpensesPay/determine.php", pageLoadComplete());
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
<!-- datetimepicker -->
<script type="text/javascript">
$('#form_datetime1').datetimepicker({
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
<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- datetimepicker -->
<script src="vendor/bootstrap/datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="vendor/bootstrap/datetimepicker/js/locales/bootstrap-datetimepicker.zh-TW.js"></script>