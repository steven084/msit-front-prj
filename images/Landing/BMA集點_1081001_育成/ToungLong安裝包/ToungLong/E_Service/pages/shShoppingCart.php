<head>
    <!-- dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">商城購物車</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">商城購物車</h4>
            <br />
            <h6 class="m-0 font-weight-bold text-gray">
            	退貨條款
            </h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-label-group row">
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="建立訂購單(現金繳款)" data-toggle="modal" data-target="#creShSCModal" />
                        </a>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a href="#" onclick="">
                            <input class="btn btn-primary btn-block" type="button" value="建立訂購單(電子帳單繳款)" data-toggle="modal" data-target="#creShSCModal2" />
                        </a>
                    </div>
                    <div class="col-md-2">
                        <label for="">
                            <br />
                        </label>
                        <a class="btn btn-primary btn-block" href="#" onclick="pageLoad('shMain')">
                            <i class="fas fa-store"></i>
                            <span>購物商城</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>刪除</th>
                            <th>商品ID</th>
                            <th>商品名稱</th>
                            <th>商品數量</th>
                            <th>商品價格</th>
                            <th>商品總價</th>
                            <th>商品備註</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>總金額：</th>
                            <th name="shCTotalMoney"></th>
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
<!-- createModal-->
<div class="modal fade" id="creShSCModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return shSCSubmit()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">建立訂購單(現金繳款)</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form row">
                        <div class="col-md-12">
                            <label for=""><span style='color:red'>*</span>連絡電話：</label>
                            <input type="Number" minlength="8" maxlength="10" name="orderPhone" class="form-control" required>
                        </div>
                    </div>
                    如果您已經確定，請選擇"送出"。
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
<!-- createModal-->
<div class="modal fade" id="creShSCModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" onsubmit="return shSCSubmit2()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">建立訂購單(電子帳單繳款)</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    如果您已經確定，請選擇"送出"。
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">取消</button>
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

function changeMdseNum(Name) {
    var ID = document.getElementsByName(Name)[0].innerHTML;
    var Num = document.getElementsByName(Name)[2].value;
    var Price = document.getElementsByName(Name)[3].innerHTML;
    var totalMoney = parseInt(Num) * parseInt(Price);
    document.getElementsByName(Name)[4].innerHTML = "<div name='tbodyTotal'>" + totalMoney + "</div>";
    changeTotalMdse('tbodyTotal', 'shCTotalMoney');
    changeMdseNumSubmit(ID, Num);
}

function changeMdseRemark(Name) {
    var ID = document.getElementsByName(Name)[0].innerHTML;
    var Remark = document.getElementsByName(Name)[5].value;
    changeMdseRemarkSubmit(ID, Remark);
}

function changeTotalMdse(ID, Name) {
    var totalMoney = 0;
    for (var i = 0; i < document.getElementsByName(ID).length; i++) {
        totalMoney += parseInt(document.getElementsByName(ID)[i].innerHTML);
    }
    document.getElementsByName(Name)[0].innerHTML = totalMoney;
}

function changeMdseNumSubmit(ID, Num) {
    $.ajax({
        type: "POST",
        url: "pages/shShoppingCart/changeMdseNumSubmit.php",
        data: {
            ID: ID,
            Num: Num
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
        if (msg == "0") {
            // alertMsg('success', '更新成功!!');
        } else {
            alertMsg('danger', msg);
        }
    });
    return false;
}

function changeMdseRemarkSubmit(ID, Remark) {
    $.ajax({
        type: "POST",
        url: "pages/shShoppingCart/changeMdseRemarkSubmit.php",
        data: {
            ID: ID,
            Remark: Remark
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
        if (msg == "0") {
            // alertMsg('success', '更新成功!!');
        } else {
            alertMsg('danger', msg);
        }
    });
    return false;
}

function delModalSubmit(ID) {
    $.ajax({
        type: "POST",
        url: "pages/shShoppingCart/delModal.php",
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
            // location.href = "?function=shShoppingCart";
        } else {
            alertMsg('danger', msg);
        }
        // $('#delModal' + ID).modal('hide');
        hideModal('#delModal' + ID);
    });
    return false;
}

function shSCSubmit() {
    var tbody = document.getElementById('tbody');
    var tr = tbody.getElementsByTagName('tr');
    if (tr[0].className != 'odd') {
        var Phone = document.getElementsByName('orderPhone')[0].value;
        $.ajax({
            type: "POST",
            url: "pages/shShoppingCart/creModal.php",
            data: {
                Phone: Phone
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
                getTableValue("tbody", "#dataTable");
                // location.href = "?function=shShoppingCart";
            } else {
                alertMsg('danger', msg);
            }
            // $('#creShSCModal').modal('hide');
            hideModal('#creShSCModal');
        });
    } else {
        alertMsg('danger', '購物車尚未選取商品!!');
    }
    return false;
}

function getTableValue(functionName, dataTableID) {
    $.ajax({
        type: "POST",
        url: "pages/shShoppingCart/getTableValue.php",
        data: {
            functionName: functionName
        },
        cache: false
    }).done(function(msg) {
        if ($.fn.DataTable.isDataTable(dataTableID)) {
            $(dataTableID).DataTable().destroy();
        }
        document.getElementById(functionName).innerHTML = msg;
        setDataTable(dataTableID);
        changeTotalMdse('tbodyTotal', 'shCTotalMoney');
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