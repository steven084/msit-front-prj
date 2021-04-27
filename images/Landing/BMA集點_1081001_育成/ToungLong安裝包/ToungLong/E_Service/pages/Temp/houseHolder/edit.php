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
                <h3 class="text-primary text-center white-text py-3"><i class="fas fa-cog"></i> 編輯功能</h3>
        </div>
        <div class="card-body">
            <form class="" method="post" onsubmit="">
                <!--Body-->
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" ">社區代號：</label>
                        <input type="text" name="" class="form-control" value="NCBIG" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for=" ">棟別名稱：</label>
                        <input type="text" name="" class="form-control" value="D棟" readonly>
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" ">樓層：</label>
                        <input type="text" name="" class="form-control" value="1" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for=" ">戶號：</label>
                        <input type="text" name="" class="form-control" value="D1" readonly>
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" ">現住屬性：</label>
                        <select name="" class="custom-select form-control" required>
                            <option value="1">自住</option>
                            <option value="1">承租</option>
                            <option value="1">空</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for=" "><span style='color:red'>*</span>所有權人：</label>
                        <input type="text" name="" class="form-control" value="方俊智" required>
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <!-- --------------- -->
                <div class="md-form row">
                    <div class="col-md-3">
                        <label for=" ">性別：</label>
                        <select name="" class="custom-select form-control" required>
                            <option value="男">男</option>
                            <option value="女">女</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for=" ">生日年/月/日：</label>
                        <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" id="form_datetime" readonly>
                        <input type="hidden" id="dtp_input1" value="" /><br />
                    </div>
                    <div class="col-md-6">
                        <label for=" ">身份證字號：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-3">
                        <label for=" ">電話(公)：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for=" ">傳真：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for=" ">電話(家)：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" ">電話(行動)：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for=" "><span style='color:red'>*</span>管理費帳單收件者：</label>
                        <input type="text" name="" class="form-control" value="方俊智" required>
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" "><span style='color:red'>*</span>管理費帳單地址：</label>
                        <input type="text" name="" class="form-control" value="高雄市仁武區文安二街23巷2號" required>
                    </div>
                    <div class="col-md-6">
                        <label for=" ">E-mail：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" "><span style='color:red'>*</span>通訊地址：</label>
                        <input type="text" name="" class="form-control" value="高雄市仁武區文安二街23巷2號" required>
                    </div>
                    <div class="col-md-6">
                        <label for=" ">緊急聯絡人：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" ">關係：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for=" ">緊急聯絡人電話：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" ">緊急聯絡人行動電話：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for=" ">原因：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" ">交屋日期：</label>
                        <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" id="form_datetime1" readonly>
                        <input type="hidden" id="dtp_input1" value="" /><br />
                    </div>
                    <div class="col-md-6">
                        <label for=" ">限制資料查詢日：</label>
                        <input class="input-group date form-control" data-link-field="dtp_input1" size="16" type="text" id="form_datetime2" readonly>
                        <input type="hidden" id="dtp_input1" value="" /><br />
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" ">備註：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <!-- <label for=" ">備註：</label>
                        <input type="text" name="" class="form-control"> -->
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<hr />
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4 m-auto">
        <div class="card-body">
            <form class="" method="post" onsubmit="">
                <!--Body-->
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" ">同住人姓名：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for=" ">電話(行動)：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-6">
                        <label for=" ">需繳管理費：</label>
                        <select name="" class="custom-select form-control" required>
                            <option value="Y">Y</option>
                            <option value="N">N</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for=" ">變更繳費單-所選擇期數(含)以後同步修改繳費單繳費者及寄件地址：</label>
                        <select name="" class="custom-select form-control" required>
                            <option value="Y">變更</option>
                            <option value="N" selected>不變更</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="text-center">
                    <label for="">
                        <span> </span>
                    </label>
                    <input class="btn btn-primary btn-block" type="submit" name="submit" value="儲存送出" />
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$('#form_datetime').datetimepicker({
    language: 'zh-TW',
    weekStart: 7,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 4,
    forceParse: 0,
    showMeridian: 1,
    format: "yyyy/mm/dd",
    minuteStep: 5,
    minView: "month",
});
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
</script>

<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- datetimepicker -->
<script src="vendor/bootstrap/datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="vendor/bootstrap/datetimepicker/js/locales/bootstrap-datetimepicker.zh-TW.js"></script>