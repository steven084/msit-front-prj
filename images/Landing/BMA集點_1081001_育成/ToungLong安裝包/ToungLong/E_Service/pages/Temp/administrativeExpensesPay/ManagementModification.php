<hr />
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
    <!-- <h1 class="h3 mb-2 text-gray-800">參數設定</h1> -->
    <!-- <p class="mb-4">說明：查詢</a></p> -->
    <!-- DataTales Example -->
    <h1 class="h3 mb-2 text-gray-800">住宅管理費資料修改</h1>
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">設定</h6> -->
            <h3 class="text-primary text-center white-text py-3"><i class="fas fa-cog"></i>住宅管理費項目設定</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>選</th>
                            <th>類別</th>
                            <th>代碼</th>
                            <th>類別名稱</th>
                            <th>金額</th>
                            <th>折扣金額</th>
                            <th>備註</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-body">
                    <form method="post" onsubmit="">
                        <div class="form-group">
                            <div class="md-form row">
                                <div class="col-md-12">
                                    <label for=" ">變更繳費單-所選擇期數(含)以後同步修改繳費單資料：</label>
                                    <select name="" class="custom-select form-control">
                                        <option value="1">TEST</option>
                                        <option value="1">TEST</option>
                                    </select>
                                    <!-- <input type="text" name="" class="form-control"> -->
                                </div>
                                <div class="col-md-12">
                                    <!-- <hr /> -->
                                </div>
                            </div>
                            <div class="form-label-group row">
                                <div class="col-md-6">
                                    <label for=""></label>
                                    <input class="btn btn-primary btn-block" type="submit" name="submit" value="儲存" />
                                </div>
                                <div class="col-md-6">
                                    <label for=""></label>
                                    <input class="btn btn-primary btn-block" type="submit" name="submit" value="取消" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

$(document).ready(function() {
    $('#dataTable2').DataTable({
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