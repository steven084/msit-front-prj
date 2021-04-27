
<hr />

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">選擇棟別住戶繳費項目設定</h1>
    <!-- <p class="mb-4">說明：查詢</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">住宅管理費項目設定</h6>
        </div>
        <div class="card-body">
            <form method="post" onsubmit="">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-2">
                            <label for="">
                                戶號：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="All">All</option>
                                <option value="D1">D1</option>
                            </select>
                        </div>
                        <div class="col-md-7">
                            <label for="">
                                變更繳費單-所選擇期數(含)以後同步修改繳費單資料：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="Y">變更</option>
                                <option value="N" selected>不變更</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">　</label>
                            <a data-toggle="modal" href="#">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="確認變更" />
                            </a>
                        </div>
                        <div class="col-md-1">
                            <label for="">　</label>
                            <a data-toggle="modal" href="#">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="查詢" />
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>選擇</th>
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
                            <input type="checkbox" checked>
                            </td>
                            <td>B</td>
                            <td>A01</td>
                            <td>管理費</td>
                            <td>
                                <input type="text" name="" class="form-control" value="2000" required>
                            </td>
                            <td>
                                <input type="text" name="" class="form-control" value="0" required>
                            </td>
                            <td>
                                <input type="text" name="" class="form-control">
                            </td>
                        </tr>
                    </tbody>
                </table>
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
        },
        order: [
            [2, 'desc']
        ]
    });

});
</script>