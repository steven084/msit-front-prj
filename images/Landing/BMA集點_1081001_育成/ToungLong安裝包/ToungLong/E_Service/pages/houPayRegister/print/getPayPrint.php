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
set_time_limit(864000); //240hr
$CommunityID    = preg_replace("/[\'\"]+/", '', $_GET['CommunityID']);
$BuildingID     = preg_replace("/[\'\"]+/", '', $_GET['BuildingID']);
$HouseID        = preg_replace("/[\'\"]+/", '', $_GET['HouseID']);
$StratTime      = preg_replace("/[\'\"]+/", '', $_GET['StratTime']);
$EndTime        = preg_replace("/[\'\"]+/", '', $_GET['EndTime']);
$inputHandMan   = preg_replace("/[\'\"]+/", '', $_GET['inputHandMan']);
$totalPayPeriod = (int) preg_replace("/[\'\"]+/", '', $_GET['totalPayPeriod']);
$PayPeriod      = (int) preg_replace("/[\'\"]+/", '', $_GET['PayPeriod']);
$StartTimeSpl   = preg_split("/(-)/", $StratTime);
$EndTimeSpl     = preg_split("/(-)/", $EndTime);
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
    $errorMsg = "";
    $sql      = "";
    if ($HouseID == 'All') {
        $sql = "SELECT * FROM `es_household` WHERE buildingID = " . $BuildingID . ";";
    } else {
        $sql = "SELECT * FROM `es_household` WHERE ID = " . $HouseID . ";";
    }

    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    while ($row_result = mysqli_fetch_array($result)) {
        $PayTimeYearTemp   = (int) $StartTimeSpl[0];
        $PayTimeMonthTemp  = (int) $StartTimeSpl[1];
        $strPayTemp        = "";
        $strPayTitleTemp   = "";
        $strPayContextTemp = "";
        $houPayNumber      = "";
        // for-> 計算總共有幾回合
        for ($i = 0; $i < $totalPayPeriod; $i++) {
            // for-> 計算每回合有幾個期間
            $strPayTemp        = "";
            $strPayTitleTemp   = "";
            $strPayContextTemp = "";
            for ($j = 0; $j < $PayPeriod; $j++) {

                $sql2 = "SELECT A.ID FROM `es_houpayitem` AS A
                            INNER JOIN `es_household` AS B
                            ON A.householdID = B.ID
                            WHERE A.householdID = " . $row_result[0] . " AND A.PayPeriodTime = '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "';";
                $result2     = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                $row_result2 = mysqli_fetch_array($result2);
                $TempID      = $row_result2[0];
                if ($TempID == "" || $TempID == null) {
                    $errorMsg .= '住戶ID：' . $row_result[0] . '，期間：'. $PayTimeYearTemp . "-" . $PayTimeMonthTemp .',沒有可產生的列印單。';
                } else {

                    if ($j == 0) {
                        $strPayTitleTemp   = $PayTimeYearTemp . '年' . $PayTimeMonthTemp . '月';
                        $strPayContextTemp = "A.`PayPeriodTime` = " . "'" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "'";

                    }
                    // ----------------------------------
                    $sql2      = "SELECT * FROM `es_houpayitemnum` WHERE es_communityID = " . $CommunityID . " AND PayPeriodTime = '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "' AND es_houpayitemID = " . $TempID . " ORDER BY ID DESC Limit 0,1;";
                    $result2   = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                    $rowCount2 = mysqli_num_rows($result2);
                    if ($rowCount2 > 0) {
                        $row_result2  = mysqli_fetch_array($result2);
                        $houPayNumber = (int) $row_result2[1] + 1;
                    } else {
                        $sql4         = "SELECT A.Number FROM `es_houpayitemnum` AS A WHERE A.es_communityID = " . $CommunityID . " ORDER BY A.ID DESC Limit 0,1 ";
                        $result4      = mysqli_query($conn, $sql4) or die('MySQL 語法錯誤' . $sql4);
                        $row_result4  = mysqli_fetch_array($result4);
                        $houPayNumber = (int) $row_result4[0] + 1;
                    }
                    // ----------------------------------
                    if ($j != 0) {
                        $strPayTemp .= ",";
                        $strPayContextTemp .= " OR A.`PayPeriodTime` = ";
                        $strPayContextTemp .= "'" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "'";
                    }
                    $strPayTemp .= $PayTimeYearTemp . '-' . $PayTimeMonthTemp;

                    $sql2      = "SELECT * FROM `es_houpayitemnum` WHERE `PayPeriodTime` = '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "' AND `Cancellation` = '否' AND es_houpayitemID = " . $TempID . ";";
                    $result2   = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                    $rowCount2 = mysqli_num_rows($result2);
                    if ($rowCount2 > 0) {
                        $row_result2  = mysqli_fetch_array($result2);
                        $houPayNumber = $row_result2[1];
                    } else {

                        $sql2 = "SELECT A.ID FROM `es_houpayitem` AS A
                                INNER JOIN `es_household` AS B
                                ON A.householdID = B.ID
                                WHERE A.householdID = " . $row_result[0] . " AND A.PayPeriodTime = '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "';";
                        $result2     = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                        $row_result2 = mysqli_fetch_array($result2);

                        $sql3    = "INSERT INTO `es_houpayitemnum` (`ID`,`Number`,`PayPeriodTime`,`Cancellation`,`Remark`,`Maintainer`,`ChangeDay`,`es_communityID`,`es_houpayitemID`) VALUES (NULL,'" . $houPayNumber . "','" . ($PayTimeYearTemp . '-' . $PayTimeMonthTemp) . "','否','','" . $Maintainer . "','" . $DateTime . "'," . $CommunityID . "," . $row_result2[0] . " );";
                        $result3 = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);

                    }

                    if ($j == $PayPeriod - 1) {
                        // 第一聯-------------------------------------------------
                        echo '<div class="row">';
                        echo '<!-- ---------------------------------------- -->
                        <div class="col-md-1"></div>
                        <div class="col-md-9">收據編號:' . $houPayNumber . '</div>
                        <div class="col-md-1" style="text-align: right;">第一聯</div>
                        <div class="col-md-1"></div>
                        <!-- ---------------------------------------- -->';
                        $sql2        = "SELECT * FROM `es_communityparm` WHERE es_communityID = " . $CommunityID . ";";
                        $result2     = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                        $row_result2 = mysqli_fetch_array($result2);
                        echo '<div class="col-md-1"></div>
                        <div class="col-md-10 text-center"><h4>' . $row_result2[1] . '收據</h4></div>
                        <div class="col-md-1"></div>
                        <!-- ---------------------------------------- -->';
                        echo '<div class="col-md-1"></div>
                        <div class="col-md-10">茲收到本社區' . $row_result[1] . '</div>
                        <div class="col-md-1"></div>
                        <!-- ---------------------------------------- -->';
                        echo '<div class="col-md-1"></div>
                        <div class="col-md-10">' . $row_result[2] . '先生/女士繳交管理費如下：</div>
                        <div class="col-md-1"></div>
                        <!-- ---------------------------------------- -->';
                        echo '<!-- ---------------------------------------- -->
                        <div class="col-md-1"></div>
                        <div class="col-md-10 row" style="margin-left: 5px; border-width:3px;border-style:solid;">
                            <div class="col-md-12" style="margin-left: -15px;">繳費月份：' . $strPayTemp . '</div>
                            <div class="col-md-10" style="margin-left: -15px;">繳費項目</div>
                            <div class="col-md-2" style="margin-left: -15px;">金額</div>';
                        $Sum   = 0;
                        $Count = 0;
                        $sql2  = "SELECT A.*,B.ItemName  FROM `es_houpayitem` AS A
                        INNER JOIN `es_compayitem` AS B
                        ON A.`compayitemID` = B.ID
                        WHERE " . $strPayContextTemp . "
                        AND A.`householdID` = " . $row_result[0] . ";";
                        $result2      = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                        $TempItemName = [];
                        $TempItemNum  = [];
                        while ($row_result2 = mysqli_fetch_array($result2)) {
                            $isItem = false;
                            $index  = -1;
                            for ($k = 0; $k < count($TempItemName); $k++) {
                                if ($TempItemName[$k] == $row_result2[10]) {
                                    $isItem = true;
                                    $index  = $k;
                                }
                            }
                            if ($isItem == true) {
                                $TempItemNum[$index] = (int) $TempItemNum[$index] + (int) ((int) $row_result2[2] - (int) $row_result2[3]);
                            } else {
                                array_push($TempItemName, $row_result2[10]);
                                array_push($TempItemNum, (int) ((int) $row_result2[2] - (int) $row_result2[3]));
                            }
                        }
                        for ($k = 0; $k < count($TempItemName); $k++) {
                            echo '
                    <div class="col-md-10" style="margin-left: -15px;text-decoration:underline;">' . $TempItemName[$k] . '</div>
                    <div class="col-md-2" style="margin-left: -15px;text-decoration:underline;">' .
                                $TempItemNum[$k] . '</div>';
                            $Sum   = $Sum + $TempItemNum[$k];
                            $Count = $Count + 1;
                        }
                        echo '
                <div class="col-md-10" style="margin-left: -15px;text-decoration:underline;">合計</div>
                <div class="col-md-2" style="margin-left: -15px;text-decoration:underline;">' .
                            $Sum . '</div>';
                        $Count = $Count + 1;
                        for ($k = $Count; $k < 6; $k++) {
                            echo '
                    <div class="col-md-10" style="margin-left: -15px;">　</div>
                    <div class="col-md-2" style="margin-left: -15px;">　</div>';
                        }
                        echo '
                    </div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">收款日期：' . $DateTime . '</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-6">經手人：' . $inputHandMan . '</div>
                    <div class="col-md-4">(簽章)</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">""""""""""""""""""""""""""""""""""""""""""</div>
                    <div class="col-md-1"></div>
                </div>
                ';

// 第二聯-------------------------------------------------
                        echo '<div class="row">';
                        echo '<!-- ---------------------------------------- -->
                        <div class="col-md-1"></div>
                        <div class="col-md-9">收據編號:' . $houPayNumber . '</div>
                        <div class="col-md-1" style="text-align: right;">第二聯</div>
                        <div class="col-md-1"></div>
                        <!-- ---------------------------------------- -->';
                        $sql2        = "SELECT * FROM `es_communityparm` WHERE es_communityID = " . $CommunityID . ";";
                        $result2     = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                        $row_result2 = mysqli_fetch_array($result2);
                        echo '<div class="col-md-1"></div>
                        <div class="col-md-10 text-center"><h4>' . $row_result2[1] . '收據</h4></div>
                        <div class="col-md-1"></div>
                        <!-- ---------------------------------------- -->';
                        echo '<div class="col-md-1"></div>
                        <div class="col-md-10">茲收到本社區' . $row_result[1] . '</div>
                        <div class="col-md-1"></div>
                        <!-- ---------------------------------------- -->';
                        echo '<div class="col-md-1"></div>
                        <div class="col-md-10">' . $row_result[2] . '先生/女士繳交管理費如下：</div>
                        <div class="col-md-1"></div>
                        <!-- ---------------------------------------- -->';
                        echo '<!-- ---------------------------------------- -->
                        <div class="col-md-1"></div>
                        <div class="col-md-10 row" style="margin-left: 5px; border-width:3px;border-style:solid;">
                            <div class="col-md-12" style="margin-left: -15px;">繳費月份：' . $strPayTemp . '</div>
                            <div class="col-md-10" style="margin-left: -15px;">繳費項目</div>
                            <div class="col-md-2" style="margin-left: -15px;">金額</div>';
                        $Sum   = 0;
                        $Count = 0;
                        $sql2  = "SELECT A.*,B.ItemName  FROM `es_houpayitem` AS A
                        INNER JOIN `es_compayitem` AS B
                        ON A.`compayitemID` = B.ID
                        WHERE " . $strPayContextTemp . "
                        AND A.`householdID` = " . $row_result[0] . ";";
                        $result2      = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                        $TempItemName = [];
                        $TempItemNum  = [];
                        while ($row_result2 = mysqli_fetch_array($result2)) {
                            $isItem = false;
                            $index  = -1;
                            for ($k = 0; $k < count($TempItemName); $k++) {
                                if ($TempItemName[$k] == $row_result2[10]) {
                                    $isItem = true;
                                    $index  = $k;
                                }
                            }
                            if ($isItem == true) {
                                $TempItemNum[$index] = (int) $TempItemNum[$index] + (int) ((int) $row_result2[2] - (int) $row_result2[3]);
                            } else {
                                array_push($TempItemName, $row_result2[10]);
                                array_push($TempItemNum, (int) ((int) $row_result2[2] - (int) $row_result2[3]));
                            }
                        }
                        for ($k = 0; $k < count($TempItemName); $k++) {
                            echo '
                    <div class="col-md-10" style="margin-left: -15px;text-decoration:underline;">' . $TempItemName[$k] . '</div>
                    <div class="col-md-2" style="margin-left: -15px;text-decoration:underline;">' .
                                $TempItemNum[$k] . '</div>';
                            $Sum   = $Sum + $TempItemNum[$k];
                            $Count = $Count + 1;
                        }
                        echo '
                <div class="col-md-10" style="margin-left: -15px;text-decoration:underline;">合計</div>
                <div class="col-md-2" style="margin-left: -15px;text-decoration:underline;">' .
                            $Sum . '</div>';
                        $Count = $Count + 1;
                        for ($k = $Count; $k < 6; $k++) {
                            echo '
                    <div class="col-md-10" style="margin-left: -15px;">　</div>
                    <div class="col-md-2" style="margin-left: -15px;">　</div>';
                        }
                        echo '
                    </div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">收款日期：' . $DateTime . '</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-6">經手人：' . $inputHandMan . '</div>
                    <div class="col-md-4">(簽章)</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">""""""""""""""""""""""""""""""""""""""""""</div>
                    <div class="col-md-1"></div>
                </div>
                ';

// 第三聯-------------------------------------------------
                        echo '<div class="row">';
                        echo '<!-- ---------------------------------------- -->
                        <div class="col-md-1"></div>
                        <div class="col-md-9">收據編號:' . $houPayNumber . '</div>
                        <div class="col-md-1" style="text-align: right;">第三聯</div>
                        <div class="col-md-1"></div>
                        <!-- ---------------------------------------- -->';
                        $sql2        = "SELECT * FROM `es_communityparm` WHERE es_communityID = " . $CommunityID . ";";
                        $result2     = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                        $row_result2 = mysqli_fetch_array($result2);
                        echo '<div class="col-md-1"></div>
                        <div class="col-md-10 text-center"><h4>' . $row_result2[1] . '收據</h4></div>
                        <div class="col-md-1"></div>
                        <!-- ---------------------------------------- -->';
                        echo '<div class="col-md-1"></div>
                        <div class="col-md-10">茲收到本社區' . $row_result[1] . '</div>
                        <div class="col-md-1"></div>
                        <!-- ---------------------------------------- -->';
                        echo '<div class="col-md-1"></div>
                        <div class="col-md-10">' . $row_result[2] . '先生/女士繳交管理費如下：</div>
                        <div class="col-md-1"></div>
                        <!-- ---------------------------------------- -->';
                        echo '<!-- ---------------------------------------- -->
                        <div class="col-md-1"></div>
                        <div class="col-md-10 row" style="margin-left: 5px; border-width:3px;border-style:solid;">
                            <div class="col-md-12" style="margin-left: -15px;">繳費月份：' . $strPayTemp . '</div>
                            <div class="col-md-10" style="margin-left: -15px;">繳費項目</div>
                            <div class="col-md-2" style="margin-left: -15px;">金額</div>';
                        $Sum   = 0;
                        $Count = 0;
                        $sql2  = "SELECT A.*,B.ItemName  FROM `es_houpayitem` AS A
                        INNER JOIN `es_compayitem` AS B
                        ON A.`compayitemID` = B.ID
                        WHERE " . $strPayContextTemp . "
                        AND A.`householdID` = " . $row_result[0] . ";";
                        $result2      = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                        $TempItemName = [];
                        $TempItemNum  = [];
                        while ($row_result2 = mysqli_fetch_array($result2)) {
                            $isItem = false;
                            $index  = -1;
                            for ($k = 0; $k < count($TempItemName); $k++) {
                                if ($TempItemName[$k] == $row_result2[10]) {
                                    $isItem = true;
                                    $index  = $k;
                                }
                            }
                            if ($isItem == true) {
                                $TempItemNum[$index] = (int) $TempItemNum[$index] + (int) ((int) $row_result2[2] - (int) $row_result2[3]);
                            } else {
                                array_push($TempItemName, $row_result2[10]);
                                array_push($TempItemNum, (int) ((int) $row_result2[2] - (int) $row_result2[3]));
                            }
                        }
                        for ($k = 0; $k < count($TempItemName); $k++) {
                            echo '
                    <div class="col-md-10" style="margin-left: -15px;text-decoration:underline;">' . $TempItemName[$k] . '</div>
                    <div class="col-md-2" style="margin-left: -15px;text-decoration:underline;">' .
                                $TempItemNum[$k] . '</div>';
                            $Sum   = $Sum + $TempItemNum[$k];
                            $Count = $Count + 1;
                        }
                        echo '
                <div class="col-md-10" style="margin-left: -15px;text-decoration:underline;">合計</div>
                <div class="col-md-2" style="margin-left: -15px;text-decoration:underline;">' .
                            $Sum . '</div>';
                        $Count = $Count + 1;
                        for ($k = $Count; $k < 6; $k++) {
                            echo '
                    <div class="col-md-10" style="margin-left: -15px;">　</div>
                    <div class="col-md-2" style="margin-left: -15px;">　</div>';
                        }
                        echo '
                    </div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">收款日期：' . $DateTime . '</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-6">經手人：' . $inputHandMan . '</div>
                    <div class="col-md-4">(簽章)</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">""""""""""""""""""""""""""""""""""""""""""</div>
                    <div class="col-md-1"></div>
                </div>
                ';

                        echo '
                <div class="row">
                    <!-- ---------------------------------------- -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">　</div>
                    <div class="col-md-1"></div>
                </div>
                ';

                    }
                    if ($PayTimeMonthTemp == 12) {
                        $PayTimeMonthTemp = 1;
                        $PayTimeYearTemp += 1;
                    } else {
                        $PayTimeMonthTemp += 1;
                    }

                }
            }
        }
    }
    echo $errorMsg;
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