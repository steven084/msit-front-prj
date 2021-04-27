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

function genPrint($strPayPeriod, $strNumber, $householdName, $strHouseholdName,
    $strPayTitleTemp, $strPayItemTemp, $strPayItemMoneyTemp,
    $DateTime, $inputHandMan) {
    // 第一聯-------------------------------------------------
    echo '<div class="row">';
    echo '<!-- ---------------------------------------- -->
                        <div class="col-md-2">第ㄧ聯</div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">收據編號:' . $strNumber . '</div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '<div class="col-md-2 text-center"><h6>' . $strPayTitleTemp . '收據</h6></div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '<div class="col-md-2">茲收到本大樓店面S1</div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '<div class="col-md-2">' . $strHouseholdName . '先生/女士繳交管理費如下：</div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '<!-- ---------------------------------------- -->
                        <div class="col-md-2">繳費月份：' . $strPayPeriod . '</div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">繳費項目</div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">金額</div>
                        <div class="col-md-10"></div>';
    $Sum   = 0;
    $Count = 0;
    for ($k = 0; $k < count($strPayItemTemp); $k++) {
        echo '
                    <div class="col-md-1">' . $strPayItemTemp[$k] . '</div>
                    <div class="col-md-1">' .
            $strPayItemMoneyTemp[$k] . '</div>';
        echo '<div class="col-md-10"></div>';
        $Sum   = $Sum + $strPayItemMoneyTemp[$k];
        $Count = $Count + 1;
    }
    echo '
                <div class="col-md-1">合計</div>
                <div class="col-md-1">' . $Sum . '</div>';
    echo '<div class="col-md-10"></div>';
    $Count = $Count + 1;
    echo '
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">收款日期：</div>
                    <div class="col-md-10"></div>
                    <div class="col-md-2">' . $DateTime . '</div>
                    <div class="col-md-10"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">經手人：</div>
                    <div class="col-md-10"></div>
                    <div class="col-md-2">' . $inputHandMan . '　</div>
                    <div class="col-md-10"></div>
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
                        <div class="col-md-2">收據編號:' . $strNumber . '</div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '<div class="col-md-2 text-center"><h6>' . $strPayTitleTemp . '收據</h6></div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '<div class="col-md-2">茲收到本大樓店面S1</div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '<div class="col-md-2">' . $strHouseholdName . '先生/女士繳交管理費如下：</div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '<!-- ---------------------------------------- -->
                        <div class="col-md-2">繳費月份：' . $strPayPeriod . '</div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">繳費項目</div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">金額</div>
                        <div class="col-md-10"></div>';
    $Sum   = 0;
    $Count = 0;
    for ($k = 0; $k < count($strPayItemTemp); $k++) {
        echo '
                    <div class="col-md-1">' . $strPayItemTemp[$k] . '</div>
                    <div class="col-md-1">' .
            $strPayItemMoneyTemp[$k] . '</div>';
        echo '<div class="col-md-10"></div>';
        $Sum   = $Sum + $strPayItemMoneyTemp[$k];
        $Count = $Count + 1;
    }
    echo '
                <div class="col-md-1">合計</div>
                <div class="col-md-1">' . $Sum . '</div>';
    echo '<div class="col-md-10"></div>';
    $Count = $Count + 1;
    echo '
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">收款日期：</div>
                    <div class="col-md-10"></div>
                    <div class="col-md-2">' . $DateTime . '</div>
                    <div class="col-md-10"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">經手人：</div>
                    <div class="col-md-10"></div>
                    <div class="col-md-2">' . $inputHandMan . '　</div>
                    <div class="col-md-10"></div>
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
                        <div class="col-md-2">收據編號:' . $strNumber . '</div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '<div class="col-md-2 text-center"><h6>' . $strPayTitleTemp . '收據</h6></div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '<div class="col-md-2">茲收到本大樓店面S1</div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '<div class="col-md-2">' . $strHouseholdName . '先生/女士繳交管理費如下：</div>
                        <div class="col-md-10"></div>
                        <!-- ---------------------------------------- -->';
    echo '<!-- ---------------------------------------- -->
                        <div class="col-md-2">繳費月份：' . $strPayPeriod . '</div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">繳費項目</div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">金額</div>
                        <div class="col-md-10"></div>';
    $Sum   = 0;
    $Count = 0;
    for ($k = 0; $k < count($strPayItemTemp); $k++) {
        echo '
                    <div class="col-md-1">' . $strPayItemTemp[$k] . '</div>
                    <div class="col-md-1">' .
            $strPayItemMoneyTemp[$k] . '</div>';
        echo '<div class="col-md-10"></div>';
        $Sum   = $Sum + $strPayItemMoneyTemp[$k];
        $Count = $Count + 1;
    }
    echo '
                <div class="col-md-1">合計</div>
                <div class="col-md-1">' . $Sum . '</div>';
    echo '<div class="col-md-10"></div>';
    $Count = $Count + 1;
    echo '
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">收款日期：</div>
                    <div class="col-md-10"></div>
                    <div class="col-md-2">' . $DateTime . '</div>
                    <div class="col-md-10"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-2">經手人：</div>
                    <div class="col-md-10"></div>
                    <div class="col-md-2">' . $inputHandMan . '　</div>
                    <div class="col-md-10"></div>
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
$checkedRowsValue = preg_replace("/[\'\"]+/", '', $_POST['checkedRowsValueTemp2']);
$householdID      = preg_replace("/[\'\"]+/", '', $_POST['householdIDTemp2']);
$CommunityID      = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
$inputHandMan     = preg_replace("/[\'\"]+/", '', $_POST['inputHandMan']);
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
    $sql           = "SELECT * FROM `es_communityparm` WHERE es_communityID = " . $CommunityID . ";";
    $result        = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    $row_result    = mysqli_fetch_array($result);
    $communityParm = $row_result[1];

    $strPayPeriod     = "";
    $strNumber        = "";
    $householdName    = "";
    $strHouseholdName = "";
    $strPayTitleTemp  = $communityParm;

    $strPayItemTemp      = [];
    $strPayItemMoneyTemp = [];
    $isChange            = true;
    for ($i = 0; $i < Count($householdID); $i++) {
        $isFinal = false;
        if ($i != 0) {
            if ($householdID[$i] != $householdID[$i - 1]) {
                $isChange = true;
            }
            echo $isChange;
            if ($isChange == true) {
                genPrint($strPayPeriod, $strNumber, $householdName, $strHouseholdName,
                    $strPayTitleTemp, $strPayItemTemp, $strPayItemMoneyTemp,
                    $DateTime, $inputHandMan);
            }
        }
        if ($i == Count($householdID) - 1) {
            $isFinal = true;
        }

        if ($isChange == true || $i == 0) {
            $strPayItemTemp      = [];
            $strPayItemMoneyTemp = [];
            $householdName       = "";
            $strPayPeriod        = "";
            $strNumber           = "";
            $strPayTitleTemp     = $communityParm;
            $sql                 = "SELECT Name FROM es_household WHERE ID = " . $householdID[$i];
            $result              = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
            $row_result          = mysqli_fetch_array($result);
            $strHouseholdName    = $row_result[0];
            $isChange            = false;
        }

        $sql = "SELECT A.*,B.ItemName FROM es_houpayitem AS A
                        INNER JOIN es_compayitem B
                        ON A.compayitemID = B.ID
                        WHERE A.ID = " . $checkedRowsValue[$i];
        $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result = mysqli_fetch_array($result);
        $isItemName = false;
        for ($j = 0; $j < Count($strPayItemTemp); $j++) {
            if ($row_result[10] == $strPayItemTemp[$j]) {
                $strPayItemMoneyTemp[$j] = (int) $strPayItemMoneyTemp[$j] + (int) $row_result[2] - (int) $row_result[3];
                $isItemName              = true;
            }
        }
        if ($isItemName == false) {
            array_push($strPayItemTemp, $row_result[10]);
            array_push($strPayItemMoneyTemp, (int) $row_result[2] - (int) $row_result[3]);
        }

        if ($strPayPeriod == "") {
            $strPayPeriod .= $row_result[1];
            $splitTemp = preg_split("/(-)/", $row_result[1]);
            // $strPayTitleTemp .= $splitTemp[0] . '年' . $splitTemp[1] . '月';
        } else {
            $splitTemp      = preg_split("/(,)/", $strPayPeriod);
            $isStrPayPeriod = false;
            for ($j = 0; $j < Count($splitTemp); $j++) {
                if ($row_result[1] == $splitTemp[$j]) {
                    $isStrPayPeriod = true;
                }
            }
            if ($isStrPayPeriod == false) {
                $strPayPeriod .= "," . $row_result[1];
            }
        }
        if ($strNumber == "") {
            $sql2        = "SELECT Number FROM `es_houpayitemnum` WHERE es_communityID = " . $CommunityID . " ORDER BY `es_houpayitemnum`.`ID` DESC Limit 0,1";
            $result2     = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
            $row_result2 = mysqli_fetch_array($result2);
            $strNumber   = (int) $row_result2[0] + 1;
        }
        $sql3      = "";
        $sql2      = "SELECT * FROM es_houpayitemnum WHERE PayPeriodTime = " . $row_result[1] . " AND es_houpayitemID = " . $checkedRowsValue[$i];
        $result2   = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
        $rowCount2 = mysqli_num_rows($result2);
        if ($rowCount2 > 0) {
            $sql3 = "UPDATE es_houpayitemnum SET Number = '" . $strNumber . "' WHERE PayPeriodTime = " . $row_result[1] . " AND es_houpayitemID = " . $checkedRowsValue[$i];
        } else {
            $sql3 = "INSERT INTO `es_houpayitemnum` (`ID`,`Number`,`PayPeriodTime`,`Cancellation`,`Remark`,`Maintainer`,`ChangeDay`,`es_communityID`,`es_houpayitemID`) VALUES (NULL,'" . $strNumber . "','" . $row_result[1] . "','否','','" . $Maintainer . "','" . $DateTime . "'," . $CommunityID . "," . $checkedRowsValue[$i] . " );";
        }
        $result3 = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
        if ($isFinal == true) {
            genPrint($strPayPeriod, $strNumber, $householdName, $strHouseholdName,
                $strPayTitleTemp, $strPayItemTemp, $strPayItemMoneyTemp,
                $DateTime, $inputHandMan);
        }

    }
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