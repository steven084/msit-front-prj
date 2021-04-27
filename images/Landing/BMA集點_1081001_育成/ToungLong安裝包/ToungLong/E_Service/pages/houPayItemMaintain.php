<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- datetimepicker -->
    <link href="vendor/bootstrap/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/datetimepicker/css/bootstrap-datetimepicker-font.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">住戶繳費項目維護</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">住戶繳費項目維護</h4>
        </div>
        <div class="card-body">
            <form id="frm-example" method="post" onsubmit="tableSubmit(); return false;">
                <div class="form-group">
                    <div class="form-label-group row">
                        <div class="col-md-2">
                            <label for="BuildingSelect">
                                選擇棟別
                            </label>
                            <select name="BuildingSelect" class="custom-select" onchange="getSelectItem('HouseSelect', 'BuildingSelect');" required>
                                <!-- <option value="1" selected></option> -->
                            </select>
                        </div>
	                    <div class="col-md-2">
	                        <label for="HouseSelect">
	                            選擇住戶
	                        </label>
	                        <select name="HouseSelect" class="custom-select" onchange="" required>
	                            <option value="1" selected></option>
	                        </select>
	                    </div>
                        <div class="col-md-2">
                            <label for="startDateTime_input">
                                選擇開始日期(年/月)
                            </label>
                            <input class="input-group date form-control" data-link-field="startDateTime_input" size="16" type="text" readonly id="startDateTime" name="startDateTime">
                            <input type="hidden" id="startDateTime_input" /><br />
                        </div>
                        <div class="col-md-2">
                            <label for="endDateTime_input">
                                選擇結束日期(年/月)
                            </label>
                            <input class="input-group date form-control" data-link-field="endDateTime_input" size="16" type="text" readonly id="endDateTime" name="endDateTime">
                            <input type="hidden" id="endDateTime_input" /><br />
                        </div>
                        <div class="col-md-2">
                            <label for="PayPeriod">
                                繳費周期(月)
                            </label>
                            <select name="PayPeriod" class="custom-select" onchange="" required>
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-2">
                            <label for="">
                                <br />
                            </label>
                            <a href="#" onclick="getTableValue('tbody','#dataTable')">
                                <input class="btn btn-primary btn-block" type="button" value="查詢" readonly />
                            </a>
                        </div>
                        <!-- <div class="col-md-2">
                            <label for="">
                                <br />
                            </label>
                            <a href="#" onclick="CrePayBill()">
                                <input class="btn btn-primary btn-block" type="button" value="製作繳費單(依照社區預設項目)" readonly />
                            </a>
                        </div> -->
                        <div class="col-md-2">
                            <label for="">
                                <br />
                            </label>
                            <a href="#" onclick="CrePayBill2()">
                                <input class="btn btn-primary btn-block" type="button" value="製作繳費單(依照住戶預設項目)" readonly />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>刪除</th>
                                <th>修改</th>
                                <th>ID</th>
                                <th>戶號</th>
                                <th>所有權人</th>
                                <th>期間(年/月)</th>
                                <th>金額</th>
                                <th>折扣金額</th>
                                <th>項目名稱</th>
                                <th>項目代碼</th>
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
                                <th></th>
                                <th></th>
                                <th></th>
                                <th name="tfootTotalNum"></th>
                                <th name="tfootTotalNum"></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <div style="display: none;">
    <table id="houPayItemJqGrid"></table>
</div> -->
<!-- bootstrap.bundle -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- datetimepicker -->
<script src="vendor/bootstrap/datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="vendor/bootstrap/datetimepicker/js/locales/bootstrap-datetimepicker.zh-TW.js"></script>
<!-- JQGrid -->
<!-- <script src="vendor/Guriddo_jqGrid_JS_5.4.0/js/jquery.jqGrid.min.js"></script> -->
<!-- <script src="vendor/Guriddo_jqGrid_JS_5.4.0/js/i18n/grid.locale-tw.js"></script> -->
<!-- JQGrid Excel -->
<!-- <script src="vendor/Guriddo_jqGrid_JS_5.4.0/js/jszip.min.js"></script> -->
<!-- /.container-fluid -->
<script type='text/javascript'>
startGetSelectItem("BuildingSelect", "CommunitySelect");
setDataTime("#startDateTime");
setDataTime("#endDateTime");

function startGetSelectItem(functionName, Value) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/houPayItemMaintain/getSelectItem.php",
        data: {
            functionName: functionName,
            Value: Value
        },
        cache: false
        // ,
        // beforeSend: function() {
        //     document.getElementById("loader").style.display = "flex";
        // },
        // complete: function() {
        //     document.getElementById("loader").style.display = "none";
        // }
    }).done(function(msg) {
        document.getElementsByName(functionName)[0].innerHTML = msg;
        getSelectItem("HouseSelect", "BuildingSelect");
    });
}

function getSelectItem(functionName, Value) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/houPayItemMaintain/getSelectItem.php",
        data: {
            functionName: functionName,
            Value: Value
        },
        cache: false
        // ,
        // beforeSend: function() {
        //     document.getElementById("loader").style.display = "flex";
        // },
        // complete: function() {
        //     document.getElementById("loader").style.display = "none";
        // }
    }).done(function(msg) {
        document.getElementsByName(functionName)[0].innerHTML = msg;
    });
}

function delModalSubmit(ID) {
    $.ajax({
        type: "POST",
        url: "pages/houPayItemMaintain/delModal.php",
        data: {
            ID: ID
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
            alertMsg('success', '刪除成功!!');
            getTableValue('tbody', '#dataTable');
            // location.href = "?function=houPayItemMaintain";
        } else {
            alertMsg('danger', msg);
        }
        // $('#delModal' + ID).modal('hide');
        hideModal('#delModal' + ID);
    });
    return false;
}

function editModalSubmit(ID, name) {
    var ID = ID;
    var Money = document.getElementsByName(name)[0].value;
    var DisMoney = document.getElementsByName(name)[1].value;
    var Remark = document.getElementsByName(name)[2].value;
    $.ajax({
        type: "POST",
        url: "pages/houPayItemMaintain/editModal.php",
        data: {
            ID: ID,
            Money: Money,
            DisMoney: DisMoney,
            Remark: Remark
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
            alertMsg('success', '修改成功!!');
            getTableValue('tbody', '#dataTable');
            // location.href = "?function=houPayItemMaintain";
        } else {
            alertMsg('danger', msg);
        }
        // $('#editModal' + ID).modal('hide');
        hideModal('#editModal' + ID);
    });
    return false;
}

function CrePayBill() {
    var CommunityID = getSelectValue("CommunitySelect");
    var BuildingID = getSelectValue("BuildingSelect");
    var StratTime = document.getElementsByName("startDateTime")[0].value;
    var EndTime = document.getElementsByName("endDateTime")[0].value;
    var PayPeriod = parseInt(getSelectValue("PayPeriod"));

    if (CommunityID == "" || BuildingID == "" || StratTime == "" || EndTime == "" || PayPeriod == "") {
        alertMsg('danger', "需求參數不得為空值!!");
    } else if (Date.parse(StratTime).valueOf() > Date.parse(EndTime).valueOf()) {
        alertMsg('danger', "注意 開始時間不能晚於結束時間!!");
    } else {
        // --------------------------------------------------------------
        // 計算總月份
        var StartTimeSpl = StratTime.split("-");
        var EndTimeSpl = EndTime.split("-");
        var totalMonth = 0;
        if (EndTimeSpl[0] - StartTimeSpl[0] == 0) {
            totalMonth = EndTimeSpl[1] - StartTimeSpl[1] + 1;
        } else {
            var startTemp = parseInt(12 - StartTimeSpl[1] + 1); //6
            var endTemp = parseInt(EndTimeSpl[1]);
            totalMonth = parseInt(startTemp) + parseInt(endTemp);
            for (i = 1; i < (EndTimeSpl[0] - StartTimeSpl[0]); i++) {
                totalMonth += 12;
            }
        }
        // --------------------------------------------------------------
        if ((totalMonth % PayPeriod) == 0) {
            var totalPayPeriod = totalMonth / PayPeriod;
            $.ajax({
                type: "POST",
                url: "pages/houPayItemMaintain/CrePayBill.php",
                data: {
                    CommunityID: CommunityID,
                    BuildingID: BuildingID,
                    StratTime: StratTime,
                    EndTime: EndTime,
                    totalPayPeriod: totalPayPeriod,
                    PayPeriod: PayPeriod
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
                    alertMsg('success', '建立成功!!');
                } else {
                    alertMsg('danger', msg);
                }
            });
        } else {
            alertMsg('danger', "注意 時間與繳費周期不一致!!");
        }
    }
}

function CrePayBill2() {
    var CommunityID = getSelectValue("CommunitySelect");
    var BuildingID = getSelectValue("BuildingSelect");
    var HouseID = getSelectValue("HouseSelect");
    var StratTime = document.getElementsByName("startDateTime")[0].value;
    var EndTime = document.getElementsByName("endDateTime")[0].value;
    var PayPeriod = parseInt(getSelectValue("PayPeriod"));

    if (CommunityID == "" || BuildingID == "" || StratTime == "" || EndTime == "" || PayPeriod == "" || HouseID == "") {
        alertMsg('danger', "需求參數不得為空值!!");
    } else if (Date.parse(StratTime).valueOf() > Date.parse(EndTime).valueOf()) {
        alertMsg('danger', "注意 開始時間不能晚於結束時間!!");
    } else {
        // --------------------------------------------------------------
        // 計算總月份
        var StartTimeSpl = StratTime.split("-");
        var EndTimeSpl = EndTime.split("-");
        var totalMonth = 0;
        if (EndTimeSpl[0] - StartTimeSpl[0] == 0) {
            totalMonth = EndTimeSpl[1] - StartTimeSpl[1] + 1;
        } else {
            var startTemp = parseInt(12 - StartTimeSpl[1] + 1); //6
            var endTemp = parseInt(EndTimeSpl[1]);
            totalMonth = parseInt(startTemp) + parseInt(endTemp);
            for (i = 1; i < (EndTimeSpl[0] - StartTimeSpl[0]); i++) {
                totalMonth += 12;
            }
        }
        // --------------------------------------------------------------
        if ((totalMonth % PayPeriod) == 0) {
            var totalPayPeriod = totalMonth / PayPeriod;
            $.ajax({
                type: "POST",
                url: "pages/houPayItemMaintain/CrePayBill2.php",
                data: {
                    CommunityID: CommunityID,
                    BuildingID: BuildingID,
                    HouseID: HouseID,
                    StratTime: StratTime,
                    EndTime: EndTime,
                    totalPayPeriod: totalPayPeriod,
                    PayPeriod: PayPeriod
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
                    alertMsg('success', '建立成功!!');
                } else {
                    alertMsg('danger', msg);
                }
            });
        } else {
            alertMsg('danger', "注意 時間與繳費周期不一致!!");
        }
    }
}

function getSelectValue(SelectName) {
    var e = document.getElementsByName(SelectName)[0];
    var result = e.options[e.selectedIndex].value;
    return result;
}

function getTableValue(functionName, dataTableID) {

    var CommunityID = getSelectValue("CommunitySelect");
    var BuildingID = getSelectValue("BuildingSelect");
    var StratTime = document.getElementsByName("startDateTime")[0].value;
    var EndTime = document.getElementsByName("endDateTime")[0].value;
    var PayPeriod = parseInt(getSelectValue("PayPeriod"));

    if (CommunityID == "" || BuildingID == "" || StratTime == "" || EndTime == "" || PayPeriod == "") {
        alertMsg('danger', "需求參數不得為空值!!");
    } else if (Date.parse(StratTime).valueOf() > Date.parse(EndTime).valueOf()) {
        alertMsg('danger', "注意 開始時間不能晚於結束時間!!");
    } else {
        // --------------------------------------------------------------
        // 計算總月份
        var StartTimeSpl = StratTime.split("-");
        var EndTimeSpl = EndTime.split("-");
        var totalMonth = 0;
        if (EndTimeSpl[0] - StartTimeSpl[0] == 0) {
            totalMonth = EndTimeSpl[1] - StartTimeSpl[1] + 1;
        } else {
            var startTemp = parseInt(12 - StartTimeSpl[1] + 1); //6
            var endTemp = parseInt(EndTimeSpl[1]);
            totalMonth = parseInt(startTemp) + parseInt(endTemp);
            for (i = 1; i < (EndTimeSpl[0] - StartTimeSpl[0]); i++) {
                totalMonth += 12;
            }
        }
        // --------------------------------------------------------------
        if ((totalMonth % PayPeriod) == 0) {
            var totalPayPeriod = totalMonth / PayPeriod;
            $.ajax({
                type: "POST",
                url: "pages/houPayItemMaintain/getTableValue.php",
                data: {
                    CommunityID: CommunityID,
                    BuildingID: BuildingID,
                    StratTime: StratTime,
                    EndTime: EndTime,
                    totalPayPeriod: totalPayPeriod,
                    PayPeriod: PayPeriod
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
                document.getElementById(functionName).innerHTML = msg;
                setDataTable(dataTableID);
            });
        } else {
            alertMsg('danger', "注意 時間與繳費周期不一致!!");
        }
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
        format: "yyyy-mm",
        minuteStep: 5,
        startView: 3,
        minView: 3
    });
}
</script>
