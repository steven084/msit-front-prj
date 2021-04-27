<hr />
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">參數設定</h1> -->
    <!-- <p class="mb-4">說明：查詢</a></p> -->
    <!-- DataTales Example -->
    <h1 class="h3 mb-2 text-gray-800">交易類別新增</h1>
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">設定</h6> -->
            <h3 class="text-primary text-center white-text py-3"><i class="fas fa-cog"></i>管理費科目設定</h3>
        </div>
        <div class="card-body">
            <form method="post" onsubmit="">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-2">
                            <label for="">
                                類別：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="0">0.收入</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                <span style='color:red'>*</span>類別名稱:
                            </label>
                            <input type="text" name="" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <label for=""></label>
                    <input class="btn btn-primary btn-block" type="submit" name="submit" value="儲存送出" />
                </div>
            </form>
        </div>
    </div>
</div>
<hr />
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">查詢-交易類別查詢</h1>
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">設定</h6> -->
            <h3 class="text-primary text-center white-text py-3"><i class="fas fa-cog"></i>查詢-交易類別查詢</h3>
        </div>
        <div class="card-body">
            <form method="post" onsubmit="">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-2">
                            <label for="">
                                資料作廢：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">拷貝社區選擇:</label>
                            <select name="" class="custom-select" required>
                                <option value="溫莎堡">溫莎堡</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                        </div>
                        <div class="col-md-2">
                            <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadBMCopy()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="拷貝社區選擇科目資料" />
                            </a>
                        </div>
                        <div class="col-md-1">
                            <label for=""></label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="查詢" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!--Body-->
                <table class="table table-bordered text-nowrap" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>類別修改</th>
                            <th>交易科目新增</th>
                            <th>類別</th>
                            <th>類別名稱</th>
                            <th>排序位置</th>
                            <th>交易科目修改</th>
                            <th>刪除</th>
                            <th>交易科目代碼</th>
                            <th>交易科目名稱</th>
                            <th>項目屬性</th>
                            <th>預設交易銀行帳號</th>
                            <th>金額</th>
                            <th>摘要前加月</th>
                            <th>摘要</th>
                            <th>入帳方式</th>
                            <th>付款廠商</th>
                            <th>廠商帳號</th>
                            <th>排序位置</th>
                            <th>資料作廢</th>
                            <th>維護者</th>
                            <th>維護日</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a data-toggle="modal" href="#" onclick="pageLoadBMCategoryModification()">
                                    <i class="far fa-edit fa-stack fa-1x text-info text-center"></i>
                                </a>
                            </td>
                            <td>
                                <a data-toggle="modal" href="#" onclick="pageLoadBMTransactionAdded()">
                                    <i class="far fa-edit fa-stack fa-1x text-info text-center"></i>
                                </a>
                            </td>
                            <td>收入</td>
                            <td>管理費</td>
                            <td>10</td>
                            <td>
                                <a data-toggle="modal" href="#" onclick="pageLoadBMTransactionModification()">
                                    <i class="far fa-edit fa-stack fa-1x text-info text-center"></i>
                                </a>
                            </td>
                            <td>
                                <a data-toggle="modal" href="#delModal1">
                                    <i class="fas fa-times fa-stack fa-1x text-danger text-center"></i>
                                </a>
                            </td>
                            <td>A01</td>
                            <td>管理費</td>
                            <td>管理費</td>
                            <td>合作金庫(3476871000234)</td>
                            <td>0</td>
                            <td></td>
                            <td></td>
                            <td>現金</td>
                            <td></td>
                            <td></td>
                            <td>10</td>
                            <td>N</td>
                            <td>許旗忠</td>
                            <td>2013-09-28 11:12:25</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- delModal1-->
<div class="modal fade" id="delModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">確定要刪除?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">如果您已經確定刪除，請選擇"刪除"。</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">取消</button>
                <a class="btn btn-danger" href="#" onclick="">刪除</a>
            </div>
        </div>
    </div>
</div>

<div id="indexContent3">
</div>
<script type='text/javascript'>
//拷貝社區選擇科目資料 
function pageLoadBMCopy() {
    $("#indexContent3").load("pages/houseHolderPaySet/ManagementSetting/Copy.php");
}
//類別修改 
function pageLoadBMCategoryModification() {
    $("#indexContent3").load("pages/houseHolderPaySet/ManagementSetting/CategoryModification.php");
}
//交易科目新增 
function pageLoadBMTransactionAdded() {
    $("#indexContent3").load("pages/houseHolderPaySet/ManagementSetting/TransactionAdded.php");
}
//交易科目修改
function pageLoadBMTransactionModification() {
    $("#indexContent3").load("pages/houseHolderPaySet/ManagementSetting/TransactionModification.php");
}
$(document).ready(function() {
    $('#dataTable3').DataTable({
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