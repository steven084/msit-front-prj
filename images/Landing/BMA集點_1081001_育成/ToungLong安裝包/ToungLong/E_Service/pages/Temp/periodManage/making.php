<head>
    <!-- datetimepicker -->
    <link href="vendor/bootstrap/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/datetimepicker/css/bootstrap-datetimepicker-font.css" rel="stylesheet">
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<hr />
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">參數設定</h1> -->
    <!-- <p class="mb-4">說明：查詢</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">設定</h6> -->
            <h3 class="text-primary text-center white-text py-3"><i class="fas fa-cog"></i>製作多期繳費單</h3>
        </div>
        <div class="card-body">
            <form class="" method="post" onsubmit="">
                <!--Body-->
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" ">起迄年月(起) :</label>
                        <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" id="form_datetime" readonly>
                        <input type="hidden" id="dtp_input1" value="" /><br />
                    </div>
                    <div class="col-md-6">
                        <label for=" ">~起迄年月(迄) ：</label>
                        <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" id="form_datetime1" readonly>
                        <input type="hidden" id="dtp_input1" value="" /><br />
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" ">幾個月為一期管理費 :</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" ">繳費期限:</label>
                        <br />每期第幾個月
                        <select name="" class="custom-select form-control" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for=" ">
                            <br /><br />
                        </label>
                        幾號
                        <select name="" class="custom-select form-control" required>
                            <option value="1">1</option>
                            <option value="月底">月底</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <!-- --------------- -->
                <div class="md-form row">
                    <div class="col-md-5"></div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <div class="custom-control custom-checkbox ">
                            <input type="checkbox" class="custom-control-input" id="defaultChecked1">
                            <label class="custom-control-label" for="defaultChecked1">產生所有住戶繳費單</label>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <!--                     <div class="col-md-12">
                        <hr />
                    </div> -->
                </div>
                <div class="text-center">
                    <label for=""></label>
                    <input class="btn btn-primary btn-block" type="submit" name="submit" value="儲存" />
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#form_datetime').datetimepicker({
    language: 'zh-TW',
    format: 'yyyy-mm',
    autoclose: true,
    todayBtn: true,
    startView: 'year',
    minView: 'year',
    maxView: 'decade'
});
$('#form_datetime1').datetimepicker({
    language: 'zh-TW',
    format: 'yyyy-mm',
    autoclose: true,
    todayBtn: true,
    startView: 'year',
    minView: 'year',
    maxView: 'decade'
});
</script>
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<!-- Page level plugins -->
<script src='vendor/datatables/jquery.dataTables.js'></script>
<script src='vendor/datatables/dataTables.bootstrap4.js'></script>
<!-- datetimepicker -->
<script src="vendor/bootstrap/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="vendor/bootstrap/datetimepicker/js/locales/bootstrap-datetimepicker.zh-TW.js"></script>