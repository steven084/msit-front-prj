<hr>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">住戶繳費單資料列表</h1>
    <div class="card shadow mb-4 m-auto">
        <div class="card-body">
            <div class="table-responsive">
                <!--Body-->
                <table class="table table-bordered text-nowrap" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>刪除</th>
                            <th>繳費期數</th>
                            <th>戶號</th>
                            <th>代碼</th>
                            <th>類別名稱</th>
                            <th>金額</th>
                            <th>折扣金額</th>
                            <th>實繳金額</th>
                            <th>備註</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                            <a data-toggle="modal" href="#DelModal1">
                                    <i class="fas fa-times fa-stack fa-1x text-danger text-center"></i>
                                </a>
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
                            <a data-toggle="modal" href="#DelModal1">
                                    <i class="fas fa-times fa-stack fa-1x text-danger text-center"></i>
                                </a>
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