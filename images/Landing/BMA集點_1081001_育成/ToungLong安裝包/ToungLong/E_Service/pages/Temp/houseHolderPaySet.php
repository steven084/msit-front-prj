<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">住宅管理費項目設定</h1>
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
                                <option value="D棟">D棟</option>
                                <option value="E棟">E棟</option>
                                <option value="F棟">F棟</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                列出未設定住宅管理資料：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="Y">Y</option>
                                <option value="N" selected>N</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3">
                            <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadBMManagementSetting()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="管理費科目設定" />
                            </a>
                        </div>
                        <div class="col-md-3">
                            <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadBMPaymentSetting()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="選擇棟別住戶繳費項目設定" />
                            </a>
                        </div>
                        <div class="col-md-3">
                            <!-- <label for=""></label>
                            <a data-toggle="modal" href="#" onclick="pageLoadBMPaymentModification()">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="選擇棟別住戶單一繳費項目修改" />
                            </a> -->
                        </div>
                        <div class="col-md-2">
                            <label for=""></label>
                            <a data-toggle="modal" href="#">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="住宅繳款項目明細表(報表)" />
                            </a>
                        </div>
                        <div class="col-md-1">
                            <label for=""></label>
                            <a data-toggle="modal" href="#">
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
                            <th>編輯</th>
                            <th>歷史</th>
                            <th>樓層</th>
                            <th>戶號</th>
                            <th>坪數</th>
                            <th>所有權人</th>
                            <th>代碼</th>
                            <th>類別名稱</th>
                            <th>金額</th>
                            <th>折扣金額</th>
                            <th>實繳金額</th>
                            <th>備註</th>
                            <th>維護者</th>
                            <th>異動日</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a data-toggle="modal" href="#editModal" onclick="pageLoadBMedit()">
                                    <i class="far fa-edit fa-stack fa-1x text-info text-center"></i>
                                </a>
                            </td>
                            <td>
                                <a data-toggle="modal" href="#viewModal" onclick="pageLoadBMInquiry()">
                                    <i class="far fa-eye fa-stack fa-1x text-info text-center"></i>
                                </a>
                            </td>
                            <td>1</td>
                            <td>D1</td>
                            <td></td>
                            <td>方俊智</td>
                            <td>A01</td>
                            <td>管理費</td>
                            <td>2,000</td>
                            <td>0</td>
                            <td>2,000</td>
                            <td></td>
                            <td>管理</td>
                            <td>2015-10-08 14:32:45</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>D1</td>
                            <td></td>
                            <td>方俊智</td>
                            <td></td>
                            <td>住戶小計</td>
                            <td></td>
                            <td></td>
                            <td>2,000</td>
                            <td></td>
                            <td></td>
                            <td></td>
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
function pageLoadBMedit() {
    $("#indexContent2").load("pages/houseHolderPaySet/edit.php", pageLoadComplete());
}

function pageLoadBMInquiry() {
    $("#indexContent2").load("pages/houseHolderPaySet/Inquiry.php", pageLoadComplete());
}
//管理費科目設定
function pageLoadBMManagementSetting() {
    $("#indexContent2").load("pages/houseHolderPaySet/ManagementSetting.php", pageLoadComplete());
}
//選擇棟別住戶繳費項目設定
function pageLoadBMPaymentSetting() {
    $("#indexContent2").load("pages/houseHolderPaySet/PaymentSetting.php", pageLoadComplete());
}
//選擇棟別住戶單一繳費項目修改
function pageLoadBMPaymentModification() {
    $("#indexContent2").load("pages/houseHolderPaySet/PaymentModification.php", pageLoadComplete());
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
        },
        order: [
            [2, 'desc']
        ]
    });

});
</script>
<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>