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
            <h3 class="text-primary text-center white-text py-3"><i class="fas fa-cog"></i>管理費繳費單資料管理</h3>
        </div>
        <div class="card-body">
            <form method="post" onsubmit="">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-3">
                            <label for="">
                                繳費期數：
                            </label>
                            <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" readonly id="form_datetime1">
                            <input type="hidden" id="dtp_input1" value="" />
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                第一段-繳費期限：
                            </label>
                            <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" readonly id="form_datetime2">
                            <input type="hidden" id="dtp_input1" value="" />
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-3">
                            <label for="inputCommunity">
                                第一段-費用期間(起) :
                            </label>
                            <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" readonly id="form_datetime3">
                            <input type="hidden" id="dtp_input1" value="" />
                        </div>
                        <div class="col-md-3">
                            <label for="inputCommunity">
                                ~第一段-費用期間(迄) <br />
                            </label>
                            <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" readonly id="form_datetime4">
                            <input type="hidden" id="dtp_input1" value="" />
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <label for=""></label>
                    <input class="btn btn-primary btn-block" type="submit" name="submit" value="儲存送出" />
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script type="text/javascript">
$('#form_datetime1').datetimepicker({
    language: 'zh-TW',
    weekStart: 7,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1,
    format: "yyyy/mm/dd",
    minuteStep: 5,
    minView: "month",
});
$('#form_datetime2').datetimepicker({
    language: 'zh-TW',
    weekStart: 7,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1,
    format: "yyyy/mm/dd",
    minuteStep: 5,
    minView: "month",
});
$('#form_datetime3').datetimepicker({
    language: 'zh-TW',
    weekStart: 7,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1,
    format: "yyyy/mm/dd",
    minuteStep: 5,
    minView: "month",
});
$('#form_datetime4').datetimepicker({
    language: 'zh-TW',
    weekStart: 7,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1,
    format: "yyyy/mm/dd",
    minuteStep: 5,
    minView: "month",
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