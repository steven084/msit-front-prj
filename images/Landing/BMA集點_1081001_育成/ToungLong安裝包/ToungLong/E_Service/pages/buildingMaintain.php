<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">棟別資料維護</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">棟別資料維護</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-label-group row">
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="新增棟別" data-toggle="modal" data-target="#creBuildingModal" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>刪除</th>
                            <th>修改</th>
                            <th>ID</th>
                            <th>棟別名稱</th>
                            <th>棟別地址</th>
                            <th>備註</th>
                            <th>維護者</th>
                            <th>異動日</th>
                        </tr>
                    </thead>
                    <tbody id="tbody2">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- createModal-->
<div class="modal fade" id="creBuildingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return creBuildingSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增棟別</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>棟別名稱：</label>
                            <input type="text" name="creBuilding" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>棟別地址：</label>
                            <input type="text" name="creBuilding" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'></span>備註：</label>
                            <input type="text" name="creBuilding" class="form-control">
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
<script type='text/javascript'>
getTableValue("tbody2", "CommunitySelect", "#dataTable2");

function getSelectValue(SelectName) {
    var e = document.getElementsByName(SelectName)[0];
    var result = e.options[e.selectedIndex].value;
    return result;
}

function getTableValue(functionName, Value, dataTableID) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/buildingMaintain/getTableValue.php",
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

function creBuildingSubmit() {
    var ID = getSelectValue("CommunitySelect");
    var Name = document.getElementsByName("creBuilding")[0].value;
    var Address = document.getElementsByName("creBuilding")[1].value;
    var Remark = document.getElementsByName("creBuilding")[2].value;
    $.ajax({
        type: "POST",
        url: "pages/buildingMaintain/creBuilding.php",
        data: {
            ID: ID,
            Name: Name,
            Address: Address,
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
            getTableValue("tbody2", "CommunitySelect", "#dataTable2");
            // location.href = "?function=communityMaintain";
        } else {
            alertMsg('danger', msg);
        }
        // $('#creBuildingModal').modal('hide');
        hideModal('#creBuildingModal');
    });
    return false;
}

function editBuildingSubmit(ID, name) {
    if (ID == 0) {
        alertMsg('danger', 'SystemTemp禁止修改。');
    } else {
        var Name = document.getElementsByName(name)[0].value;
        var Address = document.getElementsByName(name)[1].value;
        var Remark = document.getElementsByName(name)[2].value;
        $.ajax({
            type: "POST",
            url: "pages/buildingMaintain/editBuilding.php",
            data: {
                ID: ID,
                Name: Name,
                Address: Address,
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
                getTableValue("tbody2", "CommunitySelect", "#dataTable2");
                // location.href = "?function=communityMaintain";
            } else {
                alertMsg('danger', msg);
            }
            // $('#editModal_2_' + ID).modal('hide');
            hideModal('#editModal_2_' + ID);

        });
    }
    return false;
}

function delModalSubmit_2(ID) {
    if (ID == 0) {
        alertMsg('danger', 'SystemTemp禁止刪除。');
    } else {
        $.ajax({
            type: "POST",
            url: "pages/buildingMaintain/delBuilding.php",
            data: {
                ID: ID
            },
            cache: false
        }).done(function(msg) {
            if (msg == "0") {
                alertMsg('success', '刪除成功!!');
                getTableValue("tbody2", "CommunitySelect", "#dataTable2");
                // location.href = "?function=communityMaintain";
            } else {
                alertMsg('danger', msg);
            }
            // $('#delModal_2_' + ID).modal('hide');
            hideModal('#delModal_2_' + ID);

        });
    }
    return false;
}
</script>