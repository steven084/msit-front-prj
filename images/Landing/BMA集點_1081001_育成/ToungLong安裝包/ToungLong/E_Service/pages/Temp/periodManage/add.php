<hr />
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h3 class="text-primary text-center white-text py-3"><i class="fas fa-cog"></i>住戶管理費繳費單項目增加(已沖帳完)</h3>
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
                                住戶：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="inputCommunity">列出期數 :</label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="inputCommunity">增加項目期數 :</label>
                            <select name="" class="custom-select" required>
                                <option value="1">TEST</option>
                                <option value="1">TEST</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label for=""></label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="查詢" />
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                    <br />
                    <h6 class="m-0 font-weight-bold text-primary" align="center">增加項目後請重新查詢該住戶繳費單資料! 原繳費單若已經存在該項目則無法重複增加!</h6>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!--Body-->
                <table class="table table-bordered text-nowrap" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>選</th>
                            <th>戶號</th>
                            <th>繳費期數</th>
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
                                <div class="custom-control custom-checkbox ">
                                    <input type="checkbox" class="custom-control-input" id="defaultChecked">
                                    <label class="custom-control-label" for="defaultChecked"></label>
                                </div>
                            </td>
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
                            <td>
                                <div class="custom-control custom-checkbox ">
                                    <input type="checkbox" class="custom-control-input" id="defaultChecked">
                                    <label class="custom-control-label" for="defaultChecked"></label>
                                </div>
                            </td>
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
            <div class="text-center">
                <label for=""></label>
                <input class="btn btn-primary btn-block" type="submit" name="submit" value="儲存" />
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
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