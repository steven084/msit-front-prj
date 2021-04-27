<hr />
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">選擇棟別住戶單一繳費項目修改</h1>
    <!-- <p class="mb-4">說明：查詢</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-body">
            <form method="post" onsubmit="">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-3">
                            <label for="">
                                棟別名稱：
                            </label>
                            <select name="" class="custom-select" required>
                                <option value="1">A1</option>
                                <option value="1">A2</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                <br />
                            </label>
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" class="custom-control-input" id="defaultChecked2">
                                <label class="custom-control-label" for="defaultChecked2">所有住戶</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                <br />
                            </label>
                            <a data-toggle="modal" href="#">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="查詢" />
                            </a>
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                <br />
                            </label>
                            <a data-toggle="modal" href="#">
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="選擇項目繳費項目刪除" />
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>戶號</th>
                            <th>金額</th>
                            <th>折扣金額</th>
                            <th>備註</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                        </tr>
                        <tr>
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
                <input class="btn btn-primary btn-block" type="submit" name="submit" value="確定" />
            </div>
        </div>
    </div>
</div>