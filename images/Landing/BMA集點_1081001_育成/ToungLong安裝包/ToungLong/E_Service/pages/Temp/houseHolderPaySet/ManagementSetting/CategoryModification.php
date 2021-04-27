<hr />
<head>
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">類別修改</h1>
    <!-- <p class="mb-4">說明：查詢</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-body">
            <form class="" method="post" onsubmit="">
                <!--Body-->
                <div class="md-form row">
                    <div class="col-md-3">
                        <label for="">社區名稱</label>
                        <input type="text" name="" class="form-control" value="NCBIG" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="">類別</label>
                        <select name="" class="custom-select form-control" required>
                            <option value="0">收入</option>
                            <option value="1">支出</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for=""><span style='color:red'>*</span>類別名稱</label>
                        <input type="text" name="" class="form-control" value="管理費" required>
                    </div>
                    <div class="col-md-3">
                        <label for=""><span style='color:red'>*</span>排序位至</label>
                        <input type="text" name="" class="form-control" value="10" required>
                    </div>
                    <div class="text-center col-md-12">
                        <label for=""></label>
                        <input class="btn btn-primary btn-block" type="submit" name="submit" value="儲存送出" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>