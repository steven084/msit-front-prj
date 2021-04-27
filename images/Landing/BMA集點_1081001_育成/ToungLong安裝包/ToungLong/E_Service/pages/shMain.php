<head>
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <!-- Topbar Search -->
            <form class="form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" onsubmit="return getItemValue6('shMainBodyTag','CommunitySelect' ,'Search',0)">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="搜尋商品..." aria-label="Search" aria-describedby="basic-addon2" name="Search" required>
                    <div class="input-group-append">
                        <button class="btn btn-info" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- <div class="collapse navbar-collapse" id="navbarResponsive"> -->
            <div class="navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto row text-center" name="shMainNav" style="flex-direction:initial;min-width: -webkit-fill-available;">
                </ul>
            </div>
            <div class="navbar-collapse row text-center">
                <a class="nav-link text-white col-12" href="#" onclick="pageLoad('shShoppingCart')">
                    <i class="fas fa-shopping-cart"></i>
                    <span>購物車</span>
                </a>
            </div>
        </div>
    </nav>
    <div name="shCarousel">
    </div>
    <!-- <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel" name="shCarousel"> -->
    <!-- <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="rounded mx-auto img-fluid img-thumbnail d-none d-sm-block" src="img/sh_maincarousel/01.jpg" alt="Third slide" style="max-width:100%;height:25vw;">
                <img class="rounded mx-auto img-fluid img-thumbnail d-block d-sm-none" src="img/sh_maincarousel/01.jpg" alt="Third slide" style="max-width:100%;height:60vw;">
            </div>
            <div class="carousel-item">
                <img class="rounded mx-auto img-fluid img-thumbnail d-none d-sm-block" src="img/sh_maincarousel/02.jpg" alt="Third slide" style="max-width:100%;height:25vw;">
                <img class="rounded mx-auto img-fluid img-thumbnail d-block d-sm-none" src="img/sh_maincarousel/02.jpg" alt="Third slide" style="max-width:100%;height:60vw;">
            </div>
            <div class="carousel-item">
                <img class="rounded mx-auto img-fluid img-thumbnail d-none d-sm-block" src="img/sh_maincarousel/03.jpg" alt="Third slide" style="max-width:100%;height:25vw;">
                <img class="rounded mx-auto img-fluid img-thumbnail d-block d-sm-none" src="img/sh_maincarousel/03.jpg" alt="Third slide" style="max-width:100%;height:60vw;">
            </div>
        </div> -->
    <!-- </div> -->
    <div class="row" name="shMainBody">
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <small>
                <nav aria-label="Page navigation d-none d-sm-block" id="paginationholder">
                    <ul class="pagination-sm flex-wrap" id="pagination"></ul>
                </nav>
            </small>
        </div>
    </div>
</div>
<!-- carousel -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-twbsPagination -->
<script src="vendor/jquery-twbsPagination/jquery.twbsPagination.js"></script>
<script type="text/javascript">
getItemValue("shCarousel", "CommunitySelect", "");
getItemValue("shMainNav", "CommunitySelect", "");
getItemValue("shMainBody", "CommunitySelect", "0");
getItemValue2("shMainFoot", "CommunitySelect", "1");

function getItemValue(functionName, Value, Limit) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/shMain/getItemValue.php",
        data: {
            functionName: functionName,
            Value: Value,
            Limit: Limit
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
        if (functionName == 'shCarousel') {
            $('.carousel').carousel({
                interval: 4000,
                pause: "false"
            });
        }
    });
}

function getItemValue2(functionName, Value, Limit) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/shMain/getItemValue.php",
        data: {
            functionName: functionName,
            Value: Value,
            Limit: Limit
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
        $('#pagination').twbsPagination({
            totalPages: msg,
            visiblePages: 10,
            first: '第一頁',
            prev: '上一頁',
            next: '下一頁',
            last: '最後頁',
            onPageClick: function(event, page) {
                // console.info(page + ' (from options)');
                getItemValue('shMainBody', 'CommunitySelect', ((page - 1) * 9));
            }
        }).on('page', function(event, page) {
            // console.info(page + ' (from event listening)');
        });
    });
}

function getItemValue3(functionName, Value, Tag, Limit) {
    getItemValue4(functionName, Value, Tag, Limit);
    shMainActiveClick(Tag);
    getItemValue5("shMainFootTag", "CommunitySelect", Tag, "1");
}

function getItemValue4(functionName, Value, Tag, Limit) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/shMain/getItemValue3.php",
        data: {
            functionName: functionName,
            Value: Value,
            Tag: Tag,
            Limit: Limit
        },
        cache: false,
        beforeSend: function() {
            document.getElementById("loader").style.display = "flex";
        },
        complete: function() {
            document.getElementById("loader").style.display = "none";
        }
    }).done(function(msg) {
        document.getElementsByName('shMainBody')[0].innerHTML = msg;
    });
}

function getItemValue5(functionName, Value, Tag, Limit) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/shMain/getItemValue3.php",
        data: {
            functionName: functionName,
            Value: Value,
            Tag: Tag,
            Limit: Limit
        },
        cache: false,
        beforeSend: function() {
            document.getElementById("loader").style.display = "flex";
        },
        complete: function() {
            document.getElementById("loader").style.display = "none";
        }
    }).done(function(msg) {
        $('#paginationholder').html('');
        $('#paginationholder').html('<ul class="pagination-sm flex-wrap" id="pagination"></ul>');
        $('#pagination').twbsPagination({
            totalPages: msg,
            visiblePages: 10,
            first: '第一頁',
            prev: '上一頁',
            next: '下一頁',
            last: '最後頁',
            onPageClick: function(event, page) {
                getItemValue4('shMainBodyTag', 'CommunitySelect', Tag, ((page - 1) * 9));
            }
        }).on('page', function(event, page) {});
    });
}

function getItemValue6(functionName, Value, Tag, Limit) {
    var TagValue = document.getElementsByName(Tag)[0].value;
    getItemValue7(functionName, Value, TagValue, Limit);
    getItemValue8("shMainFootTag", "CommunitySelect", TagValue, "1");
    return false;
}

function getItemValue7(functionName, Value, Tag, Limit) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/shMain/getItemValue6.php",
        data: {
            functionName: functionName,
            Value: Value,
            Tag: Tag,
            Limit: Limit
        },
        cache: false,
        beforeSend: function() {
            document.getElementById("loader").style.display = "flex";
        },
        complete: function() {
            document.getElementById("loader").style.display = "none";
        }
    }).done(function(msg) {
        document.getElementsByName('shMainBody')[0].innerHTML = msg;
    });
}

function getItemValue8(functionName, Value, Tag, Limit) {
    if (Value != "") {
        Value = getSelectValue(Value);
    }
    $.ajax({
        type: "POST",
        url: "pages/shMain/getItemValue6.php",
        data: {
            functionName: functionName,
            Value: Value,
            Tag: Tag,
            Limit: Limit
        },
        cache: false,
        beforeSend: function() {
            document.getElementById("loader").style.display = "flex";
        },
        complete: function() {
            document.getElementById("loader").style.display = "none";
        }
    }).done(function(msg) {
        $('#paginationholder').html('');
        $('#paginationholder').html('<ul class="pagination-sm flex-wrap" id="pagination"></ul>');
        $('#pagination').twbsPagination({
            totalPages: msg,
            visiblePages: 10,
            first: '第一頁',
            prev: '上一頁',
            next: '下一頁',
            last: '最後頁',
            onPageClick: function(event, page) {
                getItemValue7('shMainBodyTag', 'CommunitySelect', Tag, ((page - 1) * 9));
            }
        }).on('page', function(event, page) {});
    });
}


function getSelectValue(SelectName) {
    var e = document.getElementsByName(SelectName)[0];
    var result = e.options[e.selectedIndex].value;
    return result;
}

function shMainActiveClick(pageValue) {
    var ul = document.getElementsByName('shMainNav')[0];
    var lis = ul.getElementsByTagName('li');
    for (var i = 0; i < lis.length; i++) {
        if (lis[i].getElementsByTagName('input')[0].value == pageValue) {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            lis[i].className += " active";
        }
    }
}

function shoppingCart(ID, Name, Price) {
    $.ajax({
        type: "POST",
        url: "pages/shMain/shoppingCart.php",
        data: {
            ID: ID,
            Name: Name,
            Price: Price
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
            alertMsg('success', '加入成功!!');
        } else if (msg == "1") {
            alertMsg('danger', '已經加入購物車!!');
        } else {
            alertMsg('danger', '加入失敗!! error:' + msg);
        }
    });
    return false;
}
</script>