<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">項目備註查詢</h1>
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">查詢</h6>
        </div> -->
        <div class="card-body">
            <form method="post" onsubmit="">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-12">
                        </div>
                        <div class="col-md-10">
                            <label for="">
                                備註:
                            </label>
                            <textarea name="input" class="form-control" placeholder="" required></textarea>
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                <br/><br/>
                            </label>
                            <input class="btn btn-primary btn-block" type="submit" name="submit" value="查詢" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>