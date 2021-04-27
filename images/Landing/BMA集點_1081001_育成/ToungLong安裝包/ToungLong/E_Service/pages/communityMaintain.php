<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">社區資料維護</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">社區資料維護</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-label-group row">
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="新增社區" data-toggle="modal" data-target="#creCommunityModal" />
                        </a>
                    </div>
                    <div class="col-md-8">
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
                            <th>社區名稱</th>
                            <th>社區代號</th>
                            <th>社區地址</th>
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
<div class="modal fade" id="creCommunityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return creCommunitySubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">創建社區</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>社區名稱：</label>
                            <input type="text" name="creCommunity" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>社區代號：</label>
                            <input type="text" name="creCommunity" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>社區地址：</label>
                            <input type="text" name="creCommunity" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span style='color:red'></span>備註：</label>
                            <input type="text" name="creCommunity" class="form-control">
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
<!-- indexContent2 -->
<!-- <div id="indexContent2">
</div> -->
<!-- bootstrap.bundle -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- /.container-fluid -->
<script type='text/javascript'>
$(document).ready(function(e) {
    // setTimeout('console.log(setTimeout-1000)', 1000);
    getTableValue("tbody", "", "#dataTable");
});

// function pageLoadBuilding() {
//     $("#indexContent2").load("pages/communityMaintain/buildingMaintain.php");
// }

function getSelectValue(SelectName) {
    var e = document.getElementsByName(SelectName)[0];
    var result = e.options[e.selectedIndex].value;
    return result;
}

function editCommunitySubmit(ID, name) {
    if (ID == 0) {
        alertMsg('danger', 'SystemTemp禁止修改。');
    } else {
        var Name = document.getElementsByName(name)[0].value;
        var NameCode = document.getElementsByName(name)[1].value;
        var Address = document.getElementsByName(name)[2].value;
        var Remark = document.getElementsByName(name)[3].value;
        $.ajax({
            type: "POST",
            url: "pages/communityMaintain/editCommunity.php",
            data: {
                ID: ID,
                Name: Name,
                NameCode: NameCode,
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
                getTableValue("tbody", "", "#dataTable");
                // location.href = "?function=communityMaintain";
            } else {
                alertMsg('danger', msg);
            }
            // $('#editModal' + ID).modal('hide');
            hideModal('#editModal' + ID);
        });
    }
    return false;
}

function delModalSubmit(ID) {
    // alert(Name + NameCode + Address + Remark);
    if (ID == 0) {
        alertMsg('danger', 'SystemTemp禁止刪除。');
    } else {
        $.ajax({
            type: "POST",
            url: "pages/communityMaintain/delCommunity.php",
            data: {
                ID: ID
            },
            cache: false
        }).done(function(msg) {
            if (msg == "0") {
                alertMsg('success', '刪除成功!!');
                getTableValue("tbody", "", "#dataTable");
                // location.href = "?function=communityMaintain";
            } else {
                alertMsg('danger', msg);
            }
            // $('#delModal' + ID).modal('hide');
            hideModal('#delModal' + ID);

        });
    }
    return false;
}

function creCommunitySubmit() {
    var Name = document.getElementsByName("creCommunity")[0].value;
    var NameCode = document.getElementsByName("creCommunity")[1].value;
    var Address = document.getElementsByName("creCommunity")[2].value;
    var Remark = document.getElementsByName("creCommunity")[3].value;
    $.ajax({
        type: "POST",
        url: "pages/communityMaintain/creCommunity.php",
        data: {
            Name: Name,
            NameCode: NameCode,
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
            getTableValue("tbody", "", "#dataTable");
            // location.href = "?function=communityMaintain";
        } else {
            alertMsg('danger', msg);
        }
        // $('#creCommunityModal').modal('hide');
        hideModal('#creCommunityModal');
    });
    return false;
}

function getTableValue(functionName, Value, dataTableID) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/communityMaintain/getTableValue.php",
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
<!-- dataTables -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>