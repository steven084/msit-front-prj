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
    <!-- <h1 class="h3 mb-2 text-gray-800">住戶繳費登記</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">住戶繳費登記</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-label-group row">
                    <div class="col-md-2">
                        <label for="BuildingSelect">
                            選擇棟別
                        </label>
                        <select name="BuildingSelect" class="custom-select" onchange="getSelectItem('HouseSelect', 'BuildingSelect')" required>
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
                        <label for="PayPeriod">
                            列印繳費周期(月)
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
                        <label for="inputHandMan">
                            經手人
                        </label>
                        <input class="input-group form-control" name="inputHandMan" type="text" value="">
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
                        <a href="#" onclick="getTableValue3('tbody','#dataTable')">
                            <input class="btn btn-primary btn-block" type="button" value="過去未繳費查詢" readonly />
                        </a>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="getTableValue2('tbody','#dataTable')">
                            <input class="btn btn-primary btn-block" type="button" value="查詢金額折扣後為(0)" readonly />
                        </a>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="勾選繳費登記" readonly data-toggle="modal" data-target="#tableSubmitModal" />
                        </a>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="勾選繳費登記(紙條)" readonly data-toggle="modal" data-target="#tableSubmit2Modal" />
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
                    <div class="col-md-2">
                        <label for="startDateTime_input2">
                            選擇開始日期(年/月/日)
                        </label>
                        <input class="input-group date form-control" data-link-field="startDateTime_input2" size="16" type="text" readonly id="startDateTime2" name="startDateTime2">
                        <input type="hidden" id="startDateTime_input2" /><br />
                    </div>
                    <div class="col-md-2">
                        <label for="endDateTime_input2">
                            選擇結束日期(年/月/日)
                        </label>
                        <input class="input-group date form-control" data-link-field="endDateTime_input2" size="16" type="text" readonly id="endDateTime2" name="endDateTime2">
                        <input type="hidden" id="endDateTime_input2" /><br />
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="getTableValue4('tbody','#dataTable')">
                            <input class="btn btn-primary btn-block" type="button" value="依異動日查詢" readonly />
                        </a>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="進行使用者點數金額折扣" readonly data-toggle="modal" data-target="#userDisProcessingModal" />
                        </a>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="勾選繳費登記(例外狀況)" readonly data-toggle="modal" data-target="#tableSubmit3Modal" />
                        </a>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="勾選繳費登記(例外狀況)(紙條)" readonly data-toggle="modal" data-target="#tableSubmit4Modal" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>選擇繳費ID</th>
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
        </div>
    </div>
</div>
<div id="getPayPrint3Index">
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
<!-- alertModal-->
<div class="modal fade" id="userDisProcessingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return userDisProcessing()">
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
<!-- alertModal-->
<div class="modal fade" id="tableSubmit2Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return tableSubmit2()">
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
<!-- alertModal-->
<div class="modal fade" id="tableSubmit3Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return tableSubmit3()">
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
<!-- alertModal-->
<div class="modal fade" id="tableSubmit4Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return tableSubmit4()">
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
startGetSelectItem("BuildingSelect", "CommunitySelect");
setDataTime("#startDateTime");
setDataTime("#endDateTime");
setDataTime2("#startDateTime2");
setDataTime2("#endDateTime2");
var checkedRowsValue = [];

$(document).ready(function() {
    //如果該row被點選，則啟動checkbox的click
    $("#dataTable").delegate("tr.rows", "click", function(e) {
        if (event.target.type != 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
    });
});

function userDisProcessing() {
    $.ajax({
        type: "POST",
        url: "pages/houPayRegister/userDisProcessing2.php",
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
        alertMsg('info', msg);
        hideModal('#userDisProcessingModal');
    });
    return false;
}

function downloadTableValue() {
    var CommunityID = getSelectValue("CommunitySelect");
    var BuildingID = getSelectValue("BuildingSelect");
    var HouseSelect = getSelectValue("HouseSelect");
    var StratTime = document.getElementsByName("startDateTime")[0].value;
    var EndTime = document.getElementsByName("endDateTime")[0].value;

    if (CommunityID == "" || BuildingID == "" || HouseSelect == "" || StratTime == "" || EndTime == "") {
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
        var totalPayPeriod = totalMonth;
        $.ajax({
            type: "POST",
            url: "pages/houPayRegister/downloadTableValue.php",
            data: {
                CommunityID: CommunityID,
                BuildingID: BuildingID,
                HouseSelect: HouseSelect,
                StratTime: StratTime,
                EndTime: EndTime,
                totalPayPeriod: totalPayPeriod
            },
            cache: false
        }).done(function(msg) {
            var msgSplit = msg.split("|");
            var FileContents = "";
            for (i = 0; i < msgSplit.length - 1; i++) {
                FileContents += msgSplit[i] + "\n";
            }
            var FileName = "houPayRegister.csv";

            var EF = document.createElement('a');
            EF.setAttribute('href', 'data:text/csv;charset=utf-8,%EF%BB%BF' + encodeURIComponent(FileContents));
            EF.setAttribute('download', FileName);
            EF.click();
        });
    }
    return false;
}

function startGetSelectItem(functionName, Value) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/houPayRegister/getSelectItem.php",
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
    return false;
}

function tableSubmit() {
    var inputHandMan = document.getElementsByName("inputHandMan")[0].value;
    if (inputHandMan = "") {
        alertMsg('danger', "需求參數不得為空值!!");
    } else {
        $.ajax({
            type: "POST",
            url: "pages/houPayRegister/tableSubmit.php",
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
            var msgSplit = msg.split("|");
            alertMsg('info', msgSplit[0]);
            var checkedRowsValueTemp2 = msgSplit[1].split(",");
            var householdIDTemp2 = msgSplit[2].split(",");
            getPayPrint3(checkedRowsValueTemp2, householdIDTemp2, inputHandMan);
            getTableValue3('tbody', '#dataTable');
            hideModal('#tableSubmitModal');
        });
    }
    return false;
}

function tableSubmit2() {
    var inputHandMan = document.getElementsByName("inputHandMan")[0].value;
    if (inputHandMan = "") {
        alertMsg('danger', "需求參數不得為空值!!");
    } else {
        $.ajax({
            type: "POST",
            url: "pages/houPayRegister/tableSubmit2.php",
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
            var msgSplit = msg.split("|");
            alertMsg('info', msgSplit[0]);
            var checkedRowsValueTemp2 = msgSplit[1].split(",");
            var householdIDTemp2 = msgSplit[2].split(",");
            getPayPrint4(checkedRowsValueTemp2, householdIDTemp2, inputHandMan);
            getTableValue3('tbody', '#dataTable');
            hideModal('#tableSubmit2Modal');
        });
    }
    return false;
}

function tableSubmit3() {
    var inputHandMan = document.getElementsByName("inputHandMan")[0].value;
    if (inputHandMan = "") {
        alertMsg('danger', "需求參數不得為空值!!");
    } else {
        $.ajax({
            type: "POST",
            url: "pages/houPayRegister/tableSubmit3.php",
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
            var msgSplit = msg.split("|");
            alertMsg('info', msgSplit[0]);
            var checkedRowsValueTemp2 = msgSplit[1].split(",");
            var householdIDTemp2 = msgSplit[2].split(",");
            getPayPrint3(checkedRowsValueTemp2, householdIDTemp2, inputHandMan);
            getTableValue3('tbody', '#dataTable');
            hideModal('#tableSubmit3Modal');
        });
    }
    return false;
}

function tableSubmit4() {
    var inputHandMan = document.getElementsByName("inputHandMan")[0].value;
    if (inputHandMan == "") {
        alertMsg('danger', "需求參數不得為空值!!");
    } else {
        $.ajax({
            type: "POST",
            url: "pages/houPayRegister/tableSubmit4.php",
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
            var msgSplit = msg.split("|");
            alertMsg('info', msgSplit[0]);
            var checkedRowsValueTemp2 = msgSplit[1].split(",");
            var householdIDTemp2 = msgSplit[2].split(",");
            inputHandMan = document.getElementsByName("inputHandMan")[0].value;
            getPayPrint4(checkedRowsValueTemp2, householdIDTemp2, inputHandMan);
            getTableValue3('tbody', '#dataTable');
            hideModal('#tableSubmit4Modal');
        });
    }
    return false;
}

function getPayPrint3(checkedRowsValueTemp2, householdIDTemp2, inputHandMan) {
    var url = "./pages/houPayRegister/print/getPayPrint3.php";
    var CommunityID = getSelectValue("CommunitySelect");
    var strHTML = '<form id="getPayPrint3Form" style="display:none;" method="post" action="' + url + '" target="TheWindow">';
    strHTML += '<input type="hidden" name="inputHandMan" value="' + inputHandMan + '" />';
    strHTML += '<input type="hidden" name="CommunityID" value="' + CommunityID + '" />';
    for (i = 0; i < checkedRowsValueTemp2.length; i++) {
        if (checkedRowsValueTemp2[i] != "") {
            strHTML += '<input type="hidden" name="checkedRowsValueTemp2[]" value="' + checkedRowsValueTemp2[i] + '" />';
        }
    }
    for (i = 0; i < householdIDTemp2.length; i++) {
        if (householdIDTemp2[i] != "") {
            strHTML += '<input type="hidden" name="householdIDTemp2[]" value="' + householdIDTemp2[i] + '" />';
        }
    }
    strHTML += '</form>';
    document.getElementById('getPayPrint3Index').innerHTML = strHTML;
    document.getElementById('getPayPrint3Form').submit();
    return false;
}

function getPayPrint4(checkedRowsValueTemp2, householdIDTemp2, inputHandMan) {
    var url = "./pages/houPayRegister/print/getPayPrint4.php";
    var CommunityID = getSelectValue("CommunitySelect");
    var strHTML = '<form id="getPayPrint3Form" style="display:none;" method="post" action="' + url + '" target="TheWindow">';
    strHTML += '<input type="hidden" name="inputHandMan" value="' + inputHandMan + '" />';
    strHTML += '<input type="hidden" name="CommunityID" value="' + CommunityID + '" />';
    for (i = 0; i < checkedRowsValueTemp2.length; i++) {
        if (checkedRowsValueTemp2[i] != "") {
            strHTML += '<input type="hidden" name="checkedRowsValueTemp2[]" value="' + checkedRowsValueTemp2[i] + '" />';
        }
    }
    for (i = 0; i < householdIDTemp2.length; i++) {
        if (householdIDTemp2[i] != "") {
            strHTML += '<input type="hidden" name="householdIDTemp2[]" value="' + householdIDTemp2[i] + '" />';
        }
    }
    strHTML += '</form>';
    document.getElementById('getPayPrint3Index').innerHTML = strHTML;
    document.getElementById('getPayPrint3Form').submit();
    return false;
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

function getSelectItem(functionName, Value) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/houPayRegister/getSelectItem.php",
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

function getSelectValue(SelectName) {
    var e = document.getElementsByName(SelectName)[0];
    var result = e.options[e.selectedIndex].value;
    return result;
}

function getTableValue(functionName, dataTableID) {

    var CommunityID = getSelectValue("CommunitySelect");
    var BuildingID = getSelectValue("BuildingSelect");
    var HouseSelect = getSelectValue("HouseSelect");
    var StratTime = document.getElementsByName("startDateTime")[0].value;
    var EndTime = document.getElementsByName("endDateTime")[0].value;

    if (CommunityID == "" || BuildingID == "" || HouseSelect == "" || StratTime == "" || EndTime == "") {
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
        var totalPayPeriod = totalMonth;
        $.ajax({
            type: "POST",
            url: "pages/houPayRegister/getTableValue.php",
            data: {
                CommunityID: CommunityID,
                BuildingID: BuildingID,
                HouseSelect: HouseSelect,
                StratTime: StratTime,
                EndTime: EndTime,
                totalPayPeriod: totalPayPeriod
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

function getTableValue2(functionName, dataTableID) {

    var CommunityID = getSelectValue("CommunitySelect");
    var BuildingID = getSelectValue("BuildingSelect");
    var HouseSelect = getSelectValue("HouseSelect");
    var StratTime = document.getElementsByName("startDateTime")[0].value;
    var EndTime = document.getElementsByName("endDateTime")[0].value;

    if (CommunityID == "" || BuildingID == "" || HouseSelect == "" || StratTime == "" || EndTime == "") {
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
        var totalPayPeriod = totalMonth;
        $.ajax({
            type: "POST",
            url: "pages/houPayRegister/getTableValue2.php",
            data: {
                CommunityID: CommunityID,
                BuildingID: BuildingID,
                HouseSelect: HouseSelect,
                StratTime: StratTime,
                EndTime: EndTime,
                totalPayPeriod: totalPayPeriod
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

function getTableValue3(functionName, dataTableID) {

    var CommunityID = getSelectValue("CommunitySelect");
    var BuildingID = getSelectValue("BuildingSelect");
    var HouseSelect = getSelectValue("HouseSelect");

    if (CommunityID == "" || BuildingID == "" || HouseSelect == "") {
        alertMsg('danger', "需求參數不得為空值!!");
    } else {
        // --------------------------------------------------------------
        $.ajax({
            type: "POST",
            url: "pages/houPayRegister/getTableValue3.php",
            data: {
                CommunityID: CommunityID,
                BuildingID: BuildingID,
                HouseSelect: HouseSelect
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

function getTableValue4(functionName, dataTableID) {

    var CommunityID = getSelectValue("CommunitySelect");
    var BuildingID = getSelectValue("BuildingSelect");
    var HouseSelect = getSelectValue("HouseSelect");
    var StratTime = document.getElementsByName("startDateTime2")[0].value;
    var EndTime = document.getElementsByName("endDateTime2")[0].value;

    if (CommunityID == "" || BuildingID == "" || HouseSelect == "" || StratTime == "" || EndTime == "") {
        alertMsg('danger', "需求參數不得為空值!!");
    } else if (Date.parse(StratTime).valueOf() > Date.parse(EndTime).valueOf()) {
        alertMsg('danger', "注意 開始時間不能晚於結束時間!!");
    } else {
        $.ajax({
            type: "POST",
            url: "pages/houPayRegister/getTableValue4.php",
            data: {
                CommunityID: CommunityID,
                BuildingID: BuildingID,
                HouseSelect: HouseSelect,
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
        },
        order: [
            [3, 'asc']
        ]
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

function setDataTime2(ID) {
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