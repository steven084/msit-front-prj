<hr />
<head>
    <!-- datetimepicker -->
    <link href="vendor/bootstrap/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/datetimepicker/css/bootstrap-datetimepicker-font.css" rel="stylesheet">
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">設定</h6> -->
            <h3 class="text-primary text-center white-text py-3"><i class="fas fa-cog"></i>收款人編輯</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>刪除</th>
                            <th>編輯</th>
                            <th>收款人</th>
                            <th>排序位置</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a data-toggle="modal" href="#DelModal1">
                                    <i class="fas fa-times fa-stack fa-1x text-danger text-center"></i>
                                </a>
                            </td>
                            <td>
                                <a data-toggle="modal" href="#" onclick="pageLoadBMedit()">
                                    <i class="far fa-edit fa-stack fa-1x text-info text-center"></i>
                                </a>
                            </td>
                            <td>Test</td>
                            <td>Test</td>
                        </tr>
                        <tr>
                            <td>
                                <a data-toggle="modal" href="#DelModal1">
                                    <i class="fas fa-times fa-stack fa-1x text-danger text-center"></i>
                                </a>
                            </td>
                            <td>
                                <a data-toggle="modal" href="#" onclick="pageLoadBMedit()">
                                    <i class="far fa-edit fa-stack fa-1x text-info text-center"></i>
                                </a>
                            </td>
                            <td>Test</td>
                            <td>Test</td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-body">
                    <form method="post" onsubmit="">
                        <div class="form-group">
                            <div class="form-label-group row">
                                <div class="col-md-6">
                                    <label for=""></label>
                                    <input class="btn btn-primary btn-block" type="submit" name="submit" value="儲存" />
                                </div>
                                <div class="col-md-6">
                                    <label for=""></label>
                                    <input class="btn btn-primary btn-block" type="submit" name="submit" value="取消" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- DelModal1-->
<div class="modal fade" id="DelModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!-- indexContent2 -->
<div id="indexContent3"></div>
<script type='text/javascript'>
function pageLoadBMedit() {
    $("#indexContent3").load("pages/administrativeExpensesWriteOff/edit.php");
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
<!-- datetimepicker -->
<!-- <script src="vendor/bootstrap/datetimepicker/js/bootstrap-datetimepicker.min.js"></script> -->
<script src="vendor/bootstrap/datetimepicker/js/locales/bootstrap-datetimepicker.zh-TW.js"></script>