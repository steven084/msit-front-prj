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
    <h1 class="h3 mb-2 text-gray-800">未繳管理費統計表</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">查詢-未繳管理費統計表</h6>
        </div>
        <div class="card-body">
            <form method="post" onsubmit="">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-2">
                            <label for="">
                                社區名稱：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label for="">
                                棟別名稱：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label for="">
                                收費類別：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">管理費</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                未繳項目：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">列出所有項目合併</option>
                                <option value="1">列出所有分項目</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label for="">
                                <br />
                            </label>
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" class="custom-control-input" id="defaultChecked">
                                <label class="custom-control-label" for="defaultChecked">包含本期</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                截止期數(起)：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">102年9-10月:1021031</option>
                                <option value="1">102年11月-12月:1021231</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                ~ 截止期數(迄)：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">102年9-10月:1021031</option>
                                <option value="1">102年11月-12月:1021231</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label for="">
                                <br />
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="查詢" />
                        </div>
                        <div class="col-md-3">
                            <label for=" ">列出大於金額資料：</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                報名顯示姓名：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">Test</option>
                                <option value="1">Test</option>
                                <option value="1">Test</option>
                                <option value="1">Test</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="dtp_input1">
                                繳費截止日：
                            </label>
                            <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" readonly id="form_datetime1">
                            <input type="hidden" id="dtp_input1" value="" /><br />
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                <br />
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="清空" />
                        </div>
                        <div class="col-md-1">
                            <label for=""><br />
                            </label>
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" class="custom-control-input" id="defaultChecked2">
                                <label class="custom-control-label" for="defaultChecked2">過濾呆帳</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label for=""><br />
                            </label>
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" class="custom-control-input" id="defaultChecked3">
                                <label class="custom-control-label" for="defaultChecked3">顯示地址</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for=""><br />
                            </label>
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" class="custom-control-input" id="defaultChecked4">
                                <label class="custom-control-label" for="defaultChecked4">SHOW承租人</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                下載檔案格式：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">網頁</option>
                                <option value="1">EXCEL檔</option>
                                <option value="1">WORD檔</option>
                            </select>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3">
                            <label for="">
                                <span> </span>
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="匯總表" />
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                <span> </span>
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="明細表" />
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                <span> </span>
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="催繳公告列印" />
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                <span> </span>
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="住戶繳納管理費查詢" />
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>戶號</th>
                            <th>所有權人</th>
                            <th>累計未繳期數</th>
                            <th>繳費項目(管理費)</th>
                            <th>累計應繳金額</th>
                            <th>累計折扣金額</th>
                            <th>累計欠繳管理費</th>
                            <th>累計未繳費期數資訊</th>
                            <th>累計未繳費期數資訊</th>
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
<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- datetimepicker -->
<script src="vendor/bootstrap/datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="vendor/bootstrap/datetimepicker/js/locales/bootstrap-datetimepicker.zh-TW.js"></script>