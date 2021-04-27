<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">住戶尚未繳管理費記錄列表</h1>
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">查詢-住戶尚未繳管理費記錄列表</h6>
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
                                <option value="方俊智">D1:方俊智</option>
                            </select>
                        </div>
                        <div class="col-md-7">
                        </div>
                        <div class="col-md-1">
                            <label for="">
                                <br/>
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="查詢" />
                        </div>
                        <div class="col-md-10">
                            <label for="">
                                暫列呆帳說明:
                            </label>
                            <textarea name="input" class="form-control" placeholder="" required></textarea>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                <br/><br/>
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="暫列呆帳確定送出" />
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>暫列呆帳</th>
                            <th>戶號</th>
                            <th>住戶姓名</th>
                            <th>繳費期數</th>
                            <th>費用期間</th>
                            <th>繳費期限</th>
                            <th>應繳金額</th>
                            <th>累計已繳費金額</th>
                            <th>暫列呆帳</th>
                            <th>暫列呆帳說明</th>
                            <th>記錄者</th>
                            <th>記錄日期</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>合計未繳金額</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>34,000</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox ">
                                    <input type="checkbox" class="custom-control-input" id="defaultChecked2">
                                    <label class="custom-control-label" for="defaultChecked2">暫列呆帳</label>
                                </div>
                            </td>
                            <td>D1</td>
                            <td>方俊智</td>
                            <td>103年9-10月</td>
                            <td>2014-09-01~2014-10-31</td>
                            <td>1031031</td>
                            <td>2,000</td>
                            <td>0</td>
                            <td>N</td>
                            <td></td>
                            <td>東隆保全-陳小姐</td>
                            <td>2019-04-26 09:51:56</td>
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
$("#indexContent2").load("pages/administrativeBadDebt/ManagementFeeBadDebt.php");
    
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