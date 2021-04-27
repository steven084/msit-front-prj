<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- custom -->
    <link href="vendor/custom/css/custom.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">商城商品審核</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">商城商品轉移</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-label-group row">
                    <div class="col-md-2">
                        <label for="CommunitySelect2">
                            選擇轉移社區
                        </label>
                        <select name="CommunitySelect2" class="custom-select" onchange="getSelectItem('MdseClassSelect2', 'CommunitySelect2');" required>
                            <option value="-1" selected></option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="MdseClassSelect2">
                            選擇轉移之後的商品類別
                        </label>
                        <select name="MdseClassSelect2" class="custom-select" onchange="" required>
                            <option value="-1" selected></option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="tableSubmit()">
                            <input class="btn btn-primary btn-block" type="button" value="勾選申請轉移" readonly />
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>選擇勾選ID</th>
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
var checkedRowsValue = [];
$(document).ready(function(e) {
    // setTimeout('console.log(setTimeout-1000)', 1000);
    startGetSelectItem('CommunitySelect2', '');
    getTableValue("tbody", "#dataTable");
});

$(document).ready(function() {
    //如果該row被點選，則啟動checkbox的click
    $("#dataTable").delegate("tr.rows", "click", function(e) {
        if (event.target.type != 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
    });
});

function tableSubmit() {
    var MdseClassID = "";
    MdseClassID = getSelectValue('MdseClassSelect2');
    if (MdseClassID != "") {

        $.ajax({
            type: "POST",
            url: "pages/shMdseTransfer/tableSubmit.php",
            data: {
                checkedRowsValue: checkedRowsValue,
                MdseClassID: MdseClassID
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
                getTableValue("tbody", "#dataTable");
                // location.href = "?function=shMdseTransfer";
            } else {
                alertMsg('danger', msg);
            }
        });
    } else {
        alertMsg('danger', '所需參數不能為空。');
    }
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
    var result = "";
    if (e.selectedIndex == -1) {

    } else {
        result = e.options[e.selectedIndex].value;
    }
    return result;
}

function getSelectItem(functionName, Value) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/shMdseTransfer/getSelectItem.php",
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

function startGetSelectItem(functionName, Value) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/shMdseTransfer/getSelectItem.php",
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
        getSelectItem('MdseClassSelect2', 'CommunitySelect2');
    });
}

function getTableValue(functionName, dataTableID) {
    var CommunityID = getSelectValue("CommunitySelect");
    $.ajax({
        type: "POST",
        url: "pages/shMdseTransfer/getTableValue.php",
        data: {
            CommunityID: CommunityID
        },
        cache: false
    }).done(function(msg) {
        if ($.fn.DataTable.isDataTable(dataTableID)) {
            $(dataTableID).DataTable().destroy();
        }
        checkedRowsValue = [];
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