<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!-- Custom styles for this template -->
    <link href="./../../../vendor/custom/css/sb-admin-2.css" rel="stylesheet">
    <link href="./../../../vendor/custom/css/loader.css" rel="stylesheet">
</head>

<body>
    <?php

function genPrint($ID, $Money, $DateTime)
{
    // 第一聯-------------------------------------------------
    echo '<div class="row">';
    echo '<!-- ---------------------------------------- -->
                        <div class="col-md-2">第ㄧ聯</div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">商品編號:' . $ID . '</div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">商品總額:' . $Money . '</div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">收款日期：</div>
                    <div class="col-md-10"></div>
                    <div class="col-md-2">' . $DateTime . '</div>
                    <div class="col-md-10"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">(簽章)</div>
                    <div class="col-md-10"></div>
                    <div class="col-md-12">　</div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">""""""""""""""</div>
                    <div class="col-md-10"></div>
                </div>
                ';

    // 第二聯-------------------------------------------------
    echo '<div class="row">';
    echo '<!-- ---------------------------------------- -->
                        <div class="col-md-2">第二聯</div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">商品編號:' . $ID . '</div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">商品總額:' . $Money . '</div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">收款日期：</div>
                    <div class="col-md-10"></div>
                    <div class="col-md-2">' . $DateTime . '</div>
                    <div class="col-md-10"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">(簽章)</div>
                    <div class="col-md-10"></div>
                    <div class="col-md-12">　</div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">""""""""""""""</div>
                    <div class="col-md-10"></div>
                </div>
                ';

    // 第三聯-------------------------------------------------
    echo '<div class="row">';
    echo '<!-- ---------------------------------------- -->
                        <div class="col-md-2">第三聯</div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">商品編號:' . $ID . '</div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">商品總額:' . $Money . '</div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">收款日期：</div>
                    <div class="col-md-10"></div>
                    <div class="col-md-2">' . $DateTime . '</div>
                    <div class="col-md-10"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">(簽章)</div>
                    <div class="col-md-10"></div>
                    <div class="col-md-12">　</div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">""""""""""""""</div>
                    <div class="col-md-10"></div>
                </div>
                ';
}

set_time_limit(864000); //240hr
$ID          = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$CommunityID = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
date_default_timezone_set('Asia/Taipei');
$DateTime = date("Y-m-d H:i:s");
@session_start();
$Maintainer = $_SESSION['account'];
if ($Maintainer == "" || $Maintainer == null) {
} else {
    // -----------------------------------------------
    require_once './../../connections/Account.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
    mysqli_query($conn, "SET CHARACTER SET UTF8");
    mysqli_select_db($conn, $dbname);
// -----------------------------------------------
    $sql = "SELECT B.Number,B.Price FROM `sh_order` AS A
                        INNER JOIN `sh_orderdetails` AS B
                        ON A.ID = B.sh_orderID
                        WHERE A.ID = " . $ID . ";";
    $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    $TotalMoney = 0;
    while ($row_result = mysqli_fetch_array($result)) {
        $TotalMoney = $TotalMoney + ((int) $row_result[0] * (int) $row_result[1]);
    }
    genPrint($ID, $TotalMoney, $DateTime);
}
?>
</body>
<!-- Bootstrap core JavaScript-->
<script src="./../../../vendor/jquery/jquery.min.js"></script>
<script src="./../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="./../../../vendor/jquery-easing/jquery.easing.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    window.print();
});
</script>

</html>