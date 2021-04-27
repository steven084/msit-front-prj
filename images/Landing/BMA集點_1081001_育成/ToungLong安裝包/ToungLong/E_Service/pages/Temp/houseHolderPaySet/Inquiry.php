
<hr />

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">住社區棟別、住宅資料維護</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <h1 class="h3 mb-2 text-gray-800">住戶繳費項目歷史資料查詢</h1>
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h3 class="text-primary text-center white-text py-3"><i class="fas fa-cog"></i>查詢</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
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
                            <td>108年5-6月</td>
                            <td>B</td>
                            <td>A01</td>
                            <td>管理費</td>
                            <td>2,000</td>
                            <td>0</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- indexContent4 -->
<div id="indexContent4">
</div>

<!-- /.container-fluid -->
<script type='text/javascript'>

function pageLoadBMAIEdit() {
    $("#indexContent4").load("pages/buildMaintain/addInquiryEdit.php");
}

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
        }
    });

});
</script>
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>