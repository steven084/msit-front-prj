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
    <h1 class="h3 mb-2 text-gray-800">管理費收費存款日設定</h1>
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">查詢-管理費收費存款日設定</h6>
        </div>
        <div class="card-body">
            <form method="post" onsubmit="">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-2">
                            <label for="">
                                收費類別：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">管理費</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="dtp_input1">
                                繳費日(起)：
                            </label>
                            <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" readonly id="form_datetime">
                            <input type="hidden" id="dtp_input1" value="" /><br />
                        </div>
                        <div class="col-md-2">
                            <label for="dtp_input2">
                                ~ 繳費日(迄)：
                            </label>
                            <input class="input-group date form-control" data-link-field="dtp_input2" size="16" type="text" readonly id="form_datetime2">
                            <input type="hidden" id="dtp_input2" value="" /><br />
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                未設定存款日：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="Y">是</option>
                                <option value="N">否</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="dtp_input3">
                                入帳日期：
                            </label>
                            <input class="input-group date form-control" data-link-field="dtp_input3" size="16" type="text" readonly id="form_datetime3">
                            <input type="hidden" id="dtp_input3" value="" /><br />
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">
                            <label for="">
                                <br/>
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="查詢" />
                        </div>
                        <div class="col-md-10">
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                <br/>
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="入帳確定送出" />
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>入帳</th>
                            <th>入帳日期</th>
                            <th>入帳金額</th>
                            <th>銀行帳號</th>
                            <th>棟別名稱</th>
                            <th>繳費期數</th>
                            <th>住宅編號</th>
                            <th>繳費人</th>
                            <th>繳費金額</th>
                            <th>收據編號</th>
                            <th>繳費時間</th>
                            <th>收費者</th>
                            <th>收費別</th>
                            <th>備註</th>
                            <th>銀行轉帳時間</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="defaultChecked2" checked>
                                    <label class="custom-control-label" for="defaultChecked2">入帳</label>
                                </div>
                            </td>
                            <td>2019-07-13</td>
                            <td>1,000</td>
                            <td>國家大院管理委員會(3476871000234)</td>
                            <td>F棟</td>
                            <td>102年9-10月</td>
                            <td>F2</td>
                            <td>李淑美</td>
                            <td>1,000</td>
                            <td>10210043</td>
                            <td>2013-10-02-07:00:00</td>
                            <td>管理</td>
                            <td>管理室</td>
                            <td></td>
                            <td>No-No</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- indexContent2 -->
<div id="indexContent2">
</div>
<!-- /.container-fluid -->
<script type='text/javascript'>
$("#indexContent2").load("pages/administrativeExpensesTobank/ManagementFeeBadDebt.php");

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
    format: "yyyy/mm/dd",
    minuteStep: 5,
    minView: "month",
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
$('#form_datetime3').datetimepicker({
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