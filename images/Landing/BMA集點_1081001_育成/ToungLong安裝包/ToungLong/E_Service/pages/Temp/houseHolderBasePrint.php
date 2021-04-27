<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">住戶基本資料列印</h1>
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
                        <div class="col-md-2">
                            <label for="">
                                棟別名稱：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">A1</option>
                                <option value="1">A2</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                        </div>
                        <div class="col-md-1">
                            <label for="">
                                <br />
                            </label>
                            <a data-toggle="modal" href="#" onclick="pageLoadBMOutput()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="報表輸出" />
                            </a>
                        </div>
                        <div class="col-md-1">
                            <label for="">
                                <br />
                            </label>
                            <a data-toggle="modal" href="#" onclick="pageLoadBMInquiry()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="查詢" />
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>棟別</th>
                            <th>樓層</th>
                            <th>戶號</th>
                            <th>坪數</th>
                            <th>現住屬性</th>
                            <th>區權人</th>
                            <th>性別</th>
                            <th>生日年/月/日</th>
                            <th>身份證字號</th>
                            <th>電話(公)</th>
                            <th>電話(家)</th>
                            <th>電話(行動)</th>
                            <th>EMAIL</th>
                            <th>管理費帳單收件者</th>
                            <th>管理費帳單地址</th>
                            <th>通訊地址</th>
                            <th>緊急聯絡人</th>
                            <th>關係</th>
                            <th>緊急聯絡人電話</th>
                            <th>緊急聯絡人行動電話</th>
                            <th>緊急聯絡人通訊地址</th>
                            <th>備註</th>
                            <th>維護者</th>
                            <th>異動日</th>
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
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
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
<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>