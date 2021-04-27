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
        <!-- <div class="card-header py-3"> -->
        <!-- <h6 class="m-0 font-weight-bold text-primary">增加收費項目選擇</h6> -->
        <!-- </div> -->
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
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                管理費項目：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                應繳金額：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                折扣金額：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                累計已繳費金額：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                累計已折扣金額：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <label for="">
                                累計溢繳折抵金額：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                溢繳折抵金額：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                實繳金額：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                折扣項目金額：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                備註：
                            </label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </form>
            <div class="card-body">
                <form method="post" onsubmit="">
                    <div class="form-group">
                        <div class="form-label-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <label for=""></label>
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="完成繳費" />
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- <div class="card-body">
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
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <label for=""></label>
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="完成繳費" />
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> -->
    </div>
</div>
<script type='text/javascript'>
</script>
<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>