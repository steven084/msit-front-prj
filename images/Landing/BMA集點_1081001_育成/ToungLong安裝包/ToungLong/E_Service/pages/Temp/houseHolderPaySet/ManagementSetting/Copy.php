<hr>
<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">拷貝選擇社區科目資料</h1>
    <!-- <p class="mb-4">說明：查詢</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">查詢</h6>
        </div>
        <div class="card-body">
            <form method="post" onsubmit="">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-6">
                            <label for="">預設交易銀行帳號：</label>
                            <select name="" class="custom-select" required>
                                <option value="1">國家大院管理委員會:3476871000234:合作金庫</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                        </div>
                        <div class="col-md-1">
                            <label for=""></label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="確定複製" />
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable4" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>類別</th>
                            <th>類別名稱</th>
                            <th>排序位置</th>
                            <th>交易科目代碼</th>
                            <th>交易科目名稱</th>
                            <th>項目屬性</th>
                            <th>金額</th>
                            <th>摘要前加月</th>
                            <th>摘要</th>
                            <th>入帳方式</th>
                            <th>排序位置</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>收入</td>
                            <td>管理費</td>
                            <td>10</td>
                            <td>A01</td>
                            <td>公共管理費</td>
                            <td>管理費</td>
                            <td>0</td>
                            <td></td>
                            <td></td>
                            <td>現金</td>
                            <td>10</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#dataTable4').DataTable({
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