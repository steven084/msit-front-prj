<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">商城廣告維護</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">商城廣告維護</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-label-group row">
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="新增廣告" data-toggle="modal" data-target="#creModal" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>刪除</th>
                            <th>ID</th>
                            <th>圖片</th>
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
<div class="modal fade" id="creModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data" id="creSubmit">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增廣告</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*(檔案大小限制1MB)</span>商品圖片：</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="creFile" id="inputFile" class="custom-file-input" required>
                                    <label class="custom-file-label" for="inputFile">選擇圖片</label>
                                </div>
                            </div>
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
$(document).ready(function(e) {
    // setTimeout('console.log(setTimeout-1000)', 1000);
    getTableValue("tbody", "#dataTable");
});

$('#inputFile').on('change', function() {
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
})

function delModalSubmit(ID) {
    $.ajax({
        type: "POST",
        url: "pages/shCarouselMaintain/delModal.php",
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
            getTableValue("tbody", "#dataTable");
            // location.href = "?function=newsMaintain";
        } else {
            alertMsg('danger', msg);
        }
        // $('#delModal' + ID).modal('hide');
        hideModal('#delModal' + ID);
    });
    return false;
}

function getSelectValue(SelectName) {
    var e = document.getElementsByName(SelectName)[0];
    var result = e.options[e.selectedIndex].value;
    return result;
}

$("#creSubmit").submit(function(event) {
    event.preventDefault();
    var CommunityID = getSelectValue("CommunitySelect");
    var formData = new FormData(this);
    formData.append('CommunityID', CommunityID);
    $.ajax({
        type: "POST",
        url: "pages/shCarouselMaintain/creModal.php",
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
        if (msg == "0") {
            alertMsg('success', '建立成功!!');
            getTableValue("tbody", "#dataTable");
        } else {
            alertMsg('danger', msg);
        }
        // $('#creModal').modal('hide');
        hideModal('#creModal');
    });

});

function getTableValue(functionName, dataTableID) {
    var CommunityID = getSelectValue("CommunitySelect");
    $.ajax({
        type: "POST",
        url: "pages/shCarouselMaintain/getTableValue.php",
        data: {
            functionName: functionName,
            CommunityID: CommunityID
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
        },
        order: [
            [2, 'desc']
        ]
    });
}
</script>