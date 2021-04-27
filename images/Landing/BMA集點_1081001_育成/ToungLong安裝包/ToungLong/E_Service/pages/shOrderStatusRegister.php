<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- datetimepicker -->
    <link href="vendor/bootstrap/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/datetimepicker/css/bootstrap-datetimepicker-font.css" rel="stylesheet">
    <!-- custom -->
    <link href="vendor/custom/css/custom.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">訂單繳費入帳登記(未入帳)</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">訂單繳費入帳登記(未入帳)</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-label-group row">
                    <div class="col-md-2">
                        <label for="startDateTime_input">
                            選擇開始日期(年/月/日)
                        </label>
                        <input class="input-group date form-control" data-link-field="startDateTime_input" size="16" type="text" readonly id="startDateTime" name="startDateTime">
                        <input type="hidden" id="startDateTime_input" /><br />
                    </div>
                    <div class="col-md-2">
                        <label for="endDateTime_input">
                            選擇結束日期(年/月/日)
                        </label>
                        <input class="input-group date form-control" data-link-field="endDateTime_input" size="16" type="text" readonly id="endDateTime" name="endDateTime">
                        <input type="hidden" id="endDateTime_input" /><br />
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="getTableValue('tbody','#dataTable')">
                            <input class="btn btn-primary btn-block" type="button" value="查詢" readonly />
                        </a>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="勾選入帳登記" readonly data-toggle="modal" data-target="#tableSubmitModal" />
                        </a>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="downloadTableValue()">
                            <input class="btn btn-primary btn-block" type="button" value="輸出查詢資料(EXCEL)" readonly />
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>選擇繳費ID</th>
                            <th>訂單編號</th>
                            <th>狀態</th>
                            <th>總金額</th>
                            <th>總手續費</th>
                            <th>備註</th>
                            <th>維護者</th>
                            <th>異動日</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>總數</th>
                            <th></th>
                            <th></th>
                            <th name="tfootTotalNum"></th>
                            <th name="tfootTotalNum"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody id="tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- alertModal-->
<div class="modal fade" id="tableSubmitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return tableSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">再次確認是否執行此功能</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    請再次確認是否要執行此功能!!
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <!-- <a class="btn btn-primary" href="#" onclick="creCommunity()">建立</a> -->
                    <input class="btn btn-primary " type="submit" value="執行">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- bootstrap.bundle -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- datetimepicker -->
<script src="vendor/bootstrap/datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="vendor/bootstrap/datetimepicker/js/locales/bootstrap-datetimepicker.zh-TW.js"></script>
<!-- /.container-fluid -->
<script type='text/javascript'>
setDataTime("#startDateTime");
setDataTime("#endDateTime");
var checkedRowsValue = [];

function downloadTableValue() {
    var CommunityID = getSelectValue("CommunitySelect");
    var StratTime = document.getElementsByName("startDateTime")[0].value;
    var EndTime = document.getElementsByName("endDateTime")[0].value;

    if (CommunityID == "" || StratTime == "" || EndTime == "") {
        alertMsg('danger', "需求參數不得為空值!!");
    } else if (Date.parse(StratTime).valueOf() > Date.parse(EndTime).valueOf()) {
        alertMsg('danger', "注意 開始時間不能晚於結束時間!!");
    } else {
        $.ajax({
            type: "POST",
            url: "pages/shOrderStatusRegister/downloadTableValue.php",
            data: {
                CommunityID: CommunityID,
                StratTime: StratTime,
                EndTime: EndTime
            },
            cache: false
        }).done(function(msg) {
            var msgSplit = msg.split("|");
            var FileContents = "";
            for (i = 0; i < msgSplit.length - 1; i++) {
                FileContents += msgSplit[i] + "\n";
            }
            var FileName = "shOrderStatusRegister.csv";
            var EF = document.createElement('a');
            EF.setAttribute('href', 'data:text/csv;charset=utf-8,%EF%BB%BF' + encodeURIComponent(FileContents));
            EF.setAttribute('download', FileName);
            EF.click();
        });
    }
    return false;
}

$(document).ready(function() {
    //如果該row被點選，則啟動checkbox的click
    $("#dataTable").delegate("tr.rows", "click", function(e) {
        if (event.target.type != 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
    });
});

function tableSubmit() {
    $.ajax({
        type: "POST",
        url: "pages/shOrderStatusRegister/tableSubmit.php",
        data: {
            checkedRowsValue: checkedRowsValue
        },
        cache: false,
        beforeSend: function() {
            document.getElementById("loader").style.display = "flex";
        },
        complete: function() {
            document.getElementById("loader").style.display = "none";
        }
    }).done(function(msg) {
        if (msg == "0") {
            alertMsg('success', '更新成功!!');
            getTableValue('tbody', '#dataTable');
            // location.href = "?function=comPayRegister";
        } else {
            alertMsg('danger', msg);
        }
        hideModal('#tableSubmitModal');
    });
}

function checkedChange(e) {
    //判斷e 是否被checked,有則增加value至陣列.
    var value = e.value;
    if (e.checked) {
        e.closest('tr').classList.add("table-tr");;
        //增加值進入陣列
        checkedRowsValue.push(e.value);
    } else {
        e.closest('tr').classList.remove("table-tr");
        //刪除陣列中某個數值
        checkedRowsValue = checkedRowsValue.filter(function(e) { return e != value });
    }
    // alert(checkedRowsValue);
}

function getSelectValue(SelectName) {
    var e = document.getElementsByName(SelectName)[0];
    var result = e.options[e.selectedIndex].value;
    return result;
}

function getTableValue(functionName, dataTableID) {
    var CommunityID = getSelectValue("CommunitySelect");
    var StratTime = document.getElementsByName("startDateTime")[0].value;
    var EndTime = document.getElementsByName("endDateTime")[0].value;

    if (CommunityID == "" || StratTime == "" || EndTime == "") {
        alertMsg('danger', "需求參數不得為空值!!");
    } else if (Date.parse(StratTime).valueOf() > Date.parse(EndTime).valueOf()) {
        alertMsg('danger', "注意 開始時間不能晚於結束時間!!");
    } else {
        $.ajax({
            type: "POST",
            url: "pages/shOrderStatusRegister/getTableValue.php",
            data: {
                CommunityID: CommunityID,
                StratTime: StratTime,
                EndTime: EndTime
            },
            cache: false
        }).done(function(msg) {
            var msgTemp = msg.split('$');
            var msgTemp2 = msgTemp[1].split(',');
            document.getElementsByName("tfootTotalNum")[0].innerHTML = msgTemp2[0];
            document.getElementsByName("tfootTotalNum")[1].innerHTML = msgTemp2[1];
            msg = msgTemp[0];
            // ------------------------------------------
            if ($.fn.DataTable.isDataTable(dataTableID)) {
                $(dataTableID).DataTable().destroy();
            }
            checkedRowsValue = [];
            var result = msg.split('|');
            var checkedValue = result[1].split(',');
            for (i = 0; i < checkedValue.length - 1; i++) {
                checkedRowsValue.push(checkedValue[i]);
            }
            document.getElementById(functionName).innerHTML = result[0];
            setDataTable(dataTableID);
        });
    }
    return false;
}

function setDataTable(ID) {
    $(ID).DataTable({
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
}

function setDataTime(ID) {
    $(ID).datetimepicker({
        language: 'zh-TW',
        weekStart: 7,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        forceParse: 0,
        showMeridian: 1,
        format: "yyyy-mm-dd",
        minuteStep: 5,
        startView: 2,
        minView: 2
    });
}
</script>