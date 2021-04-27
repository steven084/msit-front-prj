<hr>

<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">繳費登錄</h1>
    <!-- <p class="mb-4">說明：查詢</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">增加收費項目選擇</h6> -->
        </div>
        <div class="card-body">
            <form method="post" onsubmit="">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-3">
                            <label for="">
                                費用期間：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                繳費帳號：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <label for="">
                                <br>
                            </label>
                            <a data-toggle="modal" href="#" onclick="pageLoadModify()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="變更繳費項目" />
                            </a>
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                付款方式：
                            </label>
                            <select name="" class="custom-select form-control" required>
                            <option value="1">Test</option>
                        </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                繳費日：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                繳費時間：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                收款人：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="">
                                收據編號：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                銀行入帳日期：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                入帳銀行帳號：
                            </label>
                            <select name="" class="custom-select form-control" required>
                            <option value="1">Test</option>
                        </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                備註：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>管理費項目</th>
                            <th>應繳金額</th>
                            <th>折扣金額</th>
                            <th>累計已繳費金額</th>
                            <th>累計已折扣金額</th>
                            <th>累計溢繳折抵金額</th>
                            <th>溢繳折抵金額</th>
                            <th>實繳金額</th>
                            <th>折扣項目金額</th>
                            <th>備註</th>
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
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                <form method="post" onsubmit="">
                    <div class="form-group">
                        <div class="form-label-group row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <label for=""></label>
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="完成繳費" />
                            </div>
                            <div class="col-md-4">
                                <label for=""></label>
                                <a data-toggle="modal" href="#" onclick="pageLoadUnpaidFee()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="住戶尚未繳管理費記錄列表" />
                                </a>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- indexContent3 -->
<div id="indexContent3"></div>
<script type='text/javascript'>

//住戶管理費繳費單增加項目(已沖帳完)
function pageLoadUnpaidFee() {
    $("#indexContent3").load("pages/administrativeExpensesPay/UnpaidFee.php", pageLoadComplete());
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