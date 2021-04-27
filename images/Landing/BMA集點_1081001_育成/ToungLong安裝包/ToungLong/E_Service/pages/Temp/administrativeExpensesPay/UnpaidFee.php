<hr>

<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">住戶尚未繳管理費記錄列表</h1>
    <!-- <p class="mb-4">說明：查詢</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">增加收費項目選擇</h6> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>選</th>
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
                                <input type="checkbox">
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
            <div class="card-body">
                <form method="post" onsubmit="">
                    <div class="form-group">
                        <div class="form-label-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <label for=""></label>
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="確定跳收選擇" />
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                </form>
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
<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>