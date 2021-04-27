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
    <h1 class="h3 mb-2 text-gray-800">預繳管理費統計表</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">查詢-預繳管理費統計表</h6>
        </div>
        <div class="card-body">
            <form method="post" onsubmit="">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-3">
                            <label for="">
                                社區名稱：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                棟別名稱：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                收費類別：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="dtp_input2">
                                預繳項目：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="dtp_input1"><br />
                                繳費截止日：
                            </label>
                            <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" readonly id="form_datetime1">
                            <input type="hidden" id="dtp_input1" value="" /><br />
                        </div>
                        <div class="col-md-3">
                            <label for=""><br />
                                開始期數：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for=""><br />
                                觀點
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                <br /><br />
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="查詢" />
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                報名顯示姓名：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                下載檔案格式：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                <br />
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="匯總表" />
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>戶號</th>
                            <th>繳費者</th>
                            <th>累計預繳期數</th>
                            <th>累計預繳費金額</th>
                            <th>累計折扣金額</th>
                            <th>累計預繳期數資訊</th>
                            <th>累計預繳期數資訊</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                        </tr>
                        <tr>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                        </tr>
                        <tr>
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
<!-- /.container-fluid -->
<script type='text/javascript'>
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
$('#form_datetime1').datetimepicker({
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
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<!-- Page level plugins -->
<script src='vendor/datatables/jquery.dataTables.js'></script>
<script src='vendor/datatables/dataTables.bootstrap4.js'></script>
<!-- datetimepicker -->
<script src="vendor/bootstrap/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="vendor/bootstrap/datetimepicker/js/locales/bootstrap-datetimepicker.zh-TW.js"></script>