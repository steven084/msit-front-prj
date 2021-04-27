<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- custom -->
    <link href="vendor/custom/css/custom.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">商城商品維護</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">商城商品維護</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-label-group row">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>刪除</th>
                            <th>修改</th>
                            <th>ID</th>
                            <th>商品類別</th>
                            <th>商品名稱</th>
                            <th>商品描述</th>
                            <th>商品價格</th>
                            <th>商品數量</th>
                            <th>商品圖片</th>
                            <th>商品圖片2</th>
                            <th>商品圖片3</th>
                            <th>商品圖片4</th>
                            <th>商品圖片5</th>
                            <th>商品手續費百分比(%)</th>
                            <th>是否上架</th>
                            <th>審核狀態</th>
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

$('#inputFile2').on('change', function() {
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
})

$('#inputFile3').on('change', function() {
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
})

$('#inputFile4').on('change', function() {
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
})

$('#inputFile5').on('change', function() {
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
})

function editModalSubmit(ID) {
    var formData = new FormData(document.getElementById("editFormData"+ID));
    formData.append('mdseID', ID);
    $.ajax({
        type: "POST",
        url: "pages/shMdseMaintain2/editModal.php",
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
            alertMsg('success', '修改成功!!');
            getTableValue("tbody", "", "#dataTable");
            // location.href = "?function=shMdseRegister";
        } else {
            alertMsg('danger', msg);
        }
        // $('#creShMdseModal').modal('hide');
        hideModal('#editModal' + ID);
    });
    return false;
}

function delModalSubmit(ID) {
    $.ajax({
        type: "POST",
        url: "pages/shMdseMaintain2/delModal.php",
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
            getTableValue("tbody", "", "#dataTable");
            // location.href = "?function=shMdseRegister";
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

function getTableValue(functionName, dataTableID) {
    var CommunityID = getSelectValue("CommunitySelect");
    $.ajax({
        type: "POST",
        url: "pages/shMdseMaintain2/getTableValue.php",
        data: {
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