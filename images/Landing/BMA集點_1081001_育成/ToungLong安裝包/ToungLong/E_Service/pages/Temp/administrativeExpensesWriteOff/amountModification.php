<hr />
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h3 class="text-primary text-center white-text py-3"><i class="fas fa-cog"></i>住戶繳費單金額修改(已沖帳完)</h3>
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
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                住戶 :
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                列出期數：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                修改項目期數：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                修改繳費項目：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                <br />
                            </label>
                            <a data-toggle="modal" href="#" onclick="pageLoadInquire()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="查詢" />
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- indexContent3 -->
<div id="indexContent3"></div>
<script type='text/javascript'>
//查詢
function pageLoadInquire() {
    $("#indexContent3").load("pages/administrativeExpensesWriteOff/PaymentInquire.php", pageLoadComplete());
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