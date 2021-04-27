<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">管理費繳費單資料管理</h1>
    <!-- <p class="mb-4">說明：查詢</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">管理費繳費單資料管理</h6>
        </div>
        <div class="card-body">
            <form method="post" onsubmit="">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-2">
                            <label for="">
                                繳費期數：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="108年5-6月">108年5-6月</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                        </div>
                        <div class="col-md-4">
                            <label for="">
                                <br />
                            </label>
                            <a data-toggle="modal" href="#" onclick="pageLoadBMImport()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="第一次系統導入住戶累積未繳管理費資料輸入" />
                            </a>
                        </div>
                        <div class="col-md-1">
                            <label for="">
                                <br />
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="查詢" />
                        </div>
                        <div class="col-md-3">
                            <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadBMBilling()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="開立單期繳費單期數" />
                            </a>
                            <!-- <button class="btn btn-primary btn-block" onclick="pageLoadBMBilling()" >開立單期繳費單期數</button> -->
                        </div>
                        <div class="col-md-3">
                            <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadBMMaking()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="製作多期繳費單" />
                            </a>
                        </div>
                        <div class="col-md-3">
                            <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadBMDescription()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="繳費說明維護" />
                            </a>
                        </div>
                        <div class="col-md-3">
                            <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadBMADD()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="住戶管理繳費單項目增加(已沖帳完)" />
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>繳費公告列印(報表)</th>
                            <th>整批繳費單製作</th>
                            <th>單戶繳費單製作</th>
                            <th>繳費單列印(整批)</th>
                            <th>繳費單列印(單張)</th>
                            <th>刪除</th>
                            <th>修改</th>
                            <th>社區名稱</th>
                            <th>繳費期數</th>
                            <th>繳費期限</th>
                            <th>繳費期限(條碼)</th>
                            <th>費用期間</th>
                            <th>維護者</th>
                            <th>維護日</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a data-toggle="modal" href="#editModal">
                                    <i class="fas fa-print fa-stack fa-1x text-info text-center"></i>
                                </a>
                            </td>
                            <td>
                                <a data-toggle="modal" href="#viewModal">
                                    <i class="far fa-edit fa-stack fa-1x text-info text-center"></i>
                                </a>
                            </td>
                            <td>
                                <a data-toggle="modal" href="#viewModal">
                                    <i class="far fa-edit fa-stack fa-1x text-info text-center"></i>
                                </a>
                            </td>
                            <td>
                                <a data-toggle="modal" href="#editModal">
                                    <i class="fas fa-print fa-stack fa-1x text-info text-center"></i>
                                </a>
                            </td>
                            <td>
                                <a data-toggle="modal" href="#editModal">
                                    <i class="fas fa-print fa-stack fa-1x text-info text-center"></i>
                                </a>
                            </td>
                            <td>
                                <a data-toggle="modal" href="#editModal">
                                    <i class="fas fa-times fa-stack fa-1x text-danger text-center"></i>
                                </a>
                            </td>
                            <td>
                                <a data-toggle="modal" href="#viewModal">
                                    <i class="far fa-edit fa-stack fa-1x text-info text-center"></i>
                                </a>
                            </td>
                            <td>國家大院社區</td>
                            <td>108年5-6月</td>
                            <td>1080630</td>
                            <td>1080630</td>
                            <td>108/05/01~108/06/30</td>
                            <td>東隆保全-陳小姐</td>
                            <td>2019-07-12 13:47:39</td>
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
//開立單期繳費單期數
function pageLoadBMBilling() {
    $("#indexContent2").load("pages/periodManage/billing.php", pageLoadComplete());
}
//製作多期繳費單
function pageLoadBMMaking() {
    $("#indexContent2").load("pages/periodManage/making.php", pageLoadComplete());
}
//繳費說明維護
function pageLoadBMDescription() {
    $("#indexContent2").load("pages/periodManage/description.php", pageLoadComplete());
}
//住戶管理繳費單項目增加(已沖帳完)
function pageLoadBMADD() {
    $("#indexContent2").load("pages/periodManage/add.php", pageLoadComplete());
}
//第一次系統導入住戶累積未繳管理費資料輸入
function pageLoadBMImport() {
    $("#indexContent2").load("pages/periodManage/import.php", pageLoadComplete());
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
<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>