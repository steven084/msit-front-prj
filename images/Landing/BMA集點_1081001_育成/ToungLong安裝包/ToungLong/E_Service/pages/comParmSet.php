<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">社區參數設定</h1> -->
    <!-- <p class="mb-4">說明：</a></p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">社區參數設定</h4>
        </div>
        <div class="card-body" id="cardBody">
        </div>
    </div>
</div>
<!-- bootstrap.bundle -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- /.container-fluid -->
<script type='text/javascript'>
$(document).ready(function(e) {
    // setTimeout('console.log(setTimeout-1000)', 1000);
    getTableValue("cardBody");
});

function cardBodySubmit(name) {
    var CommunityID = getSelectValue("CommunitySelect");
    var HouPayTitle = document.getElementsByName(name)[0].value;
    $.ajax({
        type: "POST",
        url: "pages/comParmSet/cardBodySubmit.php",
        data: {
            CommunityID: CommunityID,
            HouPayTitle: HouPayTitle
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
        } else {
            alertMsg('danger', msg);
        }
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
        url: "pages/comParmSet/getTableValue.php",
        data: {
            CommunityID: CommunityID,
            functionName: functionName
        },
        cache: false
    }).done(function(msg) {
        document.getElementById(functionName).innerHTML = msg;
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