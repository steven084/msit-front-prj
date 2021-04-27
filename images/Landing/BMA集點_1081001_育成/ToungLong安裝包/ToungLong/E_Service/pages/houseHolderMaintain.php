<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">棟別住戶資料維護</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">棟別住戶資料維護</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-label-group row">
                    <div class="col-md-2">
                        <label for="BuildingSelect">
                            選擇棟別
                        </label>
                        <select name="BuildingSelect" class="custom-select" onchange="getTableValue('tbody', 'BuildingSelect', '#dataTable')" required>
                            <option value="-1" selected></option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="新增棟別住戶" data-toggle="modal" data-target="#creHouHolderModal" />
                        </a>
                    </div>
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                        <a href="#" onclick="downloadHouExample()">
                            <label for="">
                                <br />
                            </label>
                            <input class="btn btn-primary btn-block" type="button" value="輸出新增住戶大量處理範本(EXCEL)" readonly />
                        </a>
                    </div>
                    <div class="col-md-4">
                        <form method="post" enctype="multipart/form-data" id="creHouFileSubmit">
                            <label for="">
                                <br />
                            </label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="creHouFile" id="inputFile" class="custom-file-input" required>
                                    <label class="custom-file-label" for="inputFile">匯入新增住戶大量處理(EXCEL)</label>
                                </div>
                                <div class="input-group-append">
                                    <input type="submit" value="Upload" class="input-group-text">
                                </div>
                            </div>
                        </form>
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
                            <th>性別</th>
                            <th>生日</th>
                            <th>身分證字號</th>
                            <th>連絡電話</th>
                            <th>EMAIL</th>
                            <th>帳單地址</th>
                            <th>緊急聯絡人</th>
                            <th>緊急聯絡人電話</th>
                            <th>備註</th>
                            <th>維護者</th>
                            <th>異動日</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- createModal-->
<div class="modal fade" id="creHouHolderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return creHouHolderSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增住戶資料</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>戶號：</label>
                            <input type="text" name="creHouHolder" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>所有權人：</label>
                            <input type="text" name="creHouHolder" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for=""><span style='color:red'>*</span>性別：</label>
                            <select name="creHouHolder" class="custom-select" onchange="" required>
                                <option value="男" selected>男</option>
                                <option value="女">女</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">生日：</label>
                            <input type="text" name="creHouHolder" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">身分證字號：</label>
                            <input type="text" name="creHouHolder" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">聯絡電話：</label>
                            <input type="text" name="creHouHolder" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">EMAIL：</label>
                            <input type="text" name="creHouHolder" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>帳單地址：</label>
                            <input type="text" name="creHouHolder" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">緊急聯絡人：</label>
                            <input type="text" name="creHouHolder" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">緊急聯絡人電話：</label>
                            <input type="text" name="creHouHolder" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">備註：</label>
                            <input type="text" name="creHouHolder" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <!-- <a class="btn btn-primary" href="#" onclick="creCommunity()">建立</a> -->
                    <input class="btn btn-primary " type="submit" value="建立">
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
<!-- /.container-fluid -->
<script type='text/javascript'>
startGetSelectItem("BuildingSelect", "CommunitySelect");


function downloadHouExample() {

    var FileContents = "戶號,所有權人,性別,生日,身分證字號,聯絡電話,EMAIL,帳單地址,緊急聯絡人,緊急聯絡人電話,備註\n\n\n\n\n\n\n\n\n,,,,,,,,,,END";
    var FileName = "HouExample.csv";

    var EF = document.createElement('a');
    EF.setAttribute('href', 'data:text/csv;charset=utf-8,%EF%BB%BF' + encodeURIComponent(FileContents));
    EF.setAttribute('download', FileName);
    EF.click();
}

$('#inputFile').on('change', function() {
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
})

$("#creHouFileSubmit").submit(function(event) {
    var buildingID = getSelectValue("BuildingSelect");
    event.preventDefault();
    var formData = new FormData(this);
    formData.append('buildingID', buildingID);
    $.ajax({
        type: "POST",
        url: "pages/houseHolderMaintain/creHouFile.php",
        data: formData,
        dataType: 'text',
        processData: false,
        contentType: false,
        cache: false,
        timeout: 1000000,
        beforeSend: function() {
            document.getElementById("loader").style.display = "flex";
        },
        complete: function() {
            document.getElementById("loader").style.display = "none";
        }
    }).done(function(msg) {
        alertMsg('info', msg);
        getTableValue('tbody', 'BuildingSelect', '#dataTable');
    });

});

function startGetSelectItem(functionName, Value) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/houseHolderMaintain/getSelectItem.php",
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
        getTableValue("tbody", "BuildingSelect", "#dataTable");
    });
}

function getSelectItem(functionName, Value) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/houseHolderMaintain/getSelectItem.php",
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

    if (ID == 0) {
        alertMsg('danger', 'SystemTemp禁止刪除。');
    } else {
        $.ajax({
            type: "POST",
            url: "pages/houseHolderMaintain/delModal.php",
            data: { ID: ID },
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
                getTableValue("tbody", "BuildingSelect", "#dataTable");
                // location.href = "?function=houseHolderMaintain";
            } else {
                alertMsg('danger', msg);
            }
            // $('#delModal' + ID).modal('hide');
            hideModal('#delModal' + ID);
        });
    }
    return false;
}

function editModalSubmit(ID, name) {
    var ID = ID;

    if (ID == 0) {
        alertMsg('danger', 'SystemTemp禁止修改。');
    } else {
        var HouseNum = document.getElementsByName(name)[0].value;
        var Name = document.getElementsByName(name)[1].value;
        var Gender = document.getElementsByName(name)[2].value;
        var Birthday = document.getElementsByName(name)[3].value;
        var IdentityID = document.getElementsByName(name)[4].value;
        var Phone = document.getElementsByName(name)[5].value;
        var EMAIL = document.getElementsByName(name)[6].value;
        var Address = document.getElementsByName(name)[7].value;
        var ERName = document.getElementsByName(name)[8].value;
        var ERPhone = document.getElementsByName(name)[9].value;
        var Remark = document.getElementsByName(name)[10].value;
        $.ajax({
            type: "POST",
            url: "pages/houseHolderMaintain/editModal.php",
            data: {
                ID: ID,
                HouseNum: HouseNum,
                Name: Name,
                Gender: Gender,
                Birthday: Birthday,
                IdentityID: IdentityID,
                Phone: Phone,
                EMAIL: EMAIL,
                Address: Address,
                ERName: ERName,
                ERPhone: ERPhone,
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
                getTableValue("tbody", "BuildingSelect", "#dataTable");
                // location.href = "?function=houseHolderMaintain";
            } else {
                alertMsg('danger', msg);
            }
            // $('#editModal' + ID).modal('hide');
            hideModal('#editModal' + ID);
        });
    }
    return false;
}

function getSelectValue(SelectName) {
    var e = document.getElementsByName(SelectName)[0];
    var result = e.options[e.selectedIndex].value;
    return result;
}

function creHouHolderSubmit() {
    var buildingID = getSelectValue("BuildingSelect");
    var HouseNum = document.getElementsByName("creHouHolder")[0].value;
    var Name = document.getElementsByName("creHouHolder")[1].value;
    var e = document.getElementsByName("creHouHolder")[2];
    var Gender = e.options[e.selectedIndex].value;
    var Birthday = document.getElementsByName("creHouHolder")[3].value;
    var IdentityID = document.getElementsByName("creHouHolder")[4].value;
    var Phone = document.getElementsByName("creHouHolder")[5].value;
    var EMAIL = document.getElementsByName("creHouHolder")[6].value;
    var Address = document.getElementsByName("creHouHolder")[7].value;
    var ERName = document.getElementsByName("creHouHolder")[8].value;
    var ERPhone = document.getElementsByName("creHouHolder")[9].value;
    var Remark = document.getElementsByName("creHouHolder")[10].value;
    $.ajax({
        type: "POST",
        url: "pages/houseHolderMaintain/creModal.php",
        data: {
            buildingID: buildingID,
            HouseNum: HouseNum,
            Name: Name,
            Gender: Gender,
            Birthday: Birthday,
            IdentityID: IdentityID,
            Phone: Phone,
            EMAIL: EMAIL,
            Address: Address,
            ERName: ERName,
            ERPhone: ERPhone,
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
            alertMsg('success', '建立成功!!');
            getTableValue("tbody", "BuildingSelect", "#dataTable");
            // location.href = "?function=houseHolderMaintain";
        } else {
            alertMsg('danger', msg);
        }
        // $('#creHouHolderModal').modal('hide');
        hideModal('#creHouHolderModal');
    });
    return false;
}


function getTableValue(functionName, Value, dataTableID) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/houseHolderMaintain/getTableValue.php",
        data: {
            functionName: functionName,
            Value: Value
        },
        cache: false
    }).done(function(msg) {
        if ($.fn.DataTable.isDataTable(dataTableID)) {
            $(dataTableID).DataTable().destroy();
        }
        document.getElementById(functionName).innerHTML = msg;
        setDataTable(dataTableID);
    });
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
</script>