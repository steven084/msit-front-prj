<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!-- Custom styles for this template -->
    <!-- <link href="./../../../vendor/custom/css/sb-admin-2.css" rel="stylesheet"> -->
    <!-- <link href="./../../../vendor/custom/css/loader.css" rel="stylesheet"> -->
</head>

	<body style="font-size: 12px;">
    <?php
set_time_limit(864000); //240hr
$CommunityID    = preg_replace("/[\'\"]+/", '', $_GET['CommunityID']);
$BuildingID     = preg_replace("/[\'\"]+/", '', $_GET['BuildingID']);
$HouseID        = preg_replace("/[\'\"]+/", '', $_GET['HouseID']);
$StratTime      = preg_replace("/[\'\"]+/", '', $_GET['StratTime']);
$EndTime        = preg_replace("/[\'\"]+/", '', $_GET['EndTime']);
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
    $sql           = "SELECT * FROM `es_community` WHERE ID = " . $CommunityID . ";";
    $result        = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    $row_result    = mysqli_fetch_array($result);
    $CommunityName = $row_result[1];

    $sql = "";
    if ($HouseID == 'All') {
        $sql = "SELECT * FROM `es_household` WHERE buildingID = " . $BuildingID . ";";
    } else {
        $sql = "SELECT * FROM `es_household` WHERE ID = " . $HouseID . ";";
    }

    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    while ($row_result = mysqli_fetch_array($result)) {
        $PayTimeYearTemp      = (int) $StartTimeSpl[0];
        $PayTimeMonthTemp     = (int) $StartTimeSpl[1];
        $strPayTempSQL        = "";
        $strPayTemp           = "";
        $strPayTitleTemp      = "";
        $strTimeYearMonthTemp = "";
        // for-> 計算總共有幾回合
        for ($i = 0; $i < $totalPayPeriod; $i++) {
            // for-> 計算每回合有幾個期間
            $strPayTempSQL        = "";
            $strPayTemp           = "";
            $strPayTitleTemp      = "";
            $strTimeYearMonthTemp = "";
            for ($j = 0; $j < $PayPeriod; $j++) {
                if ($j == 0) {
                    $strTimeYearMonthTemp = (int) ((int) $PayTimeYearTemp - 1911) . '　' . $PayTimeMonthTemp;
                    $strPayTitleTemp      = $PayTimeYearTemp . '年' . $PayTimeMonthTemp . '月';
                    $strPayTempSQL        = "A.`PayPeriodTime` = '" . $PayTimeYearTemp . '-' . $PayTimeMonthTemp . "'";
                }
                if ($j != 0) {
                    $strPayTemp .= ",";
                    $strPayTempSQL .= ' OR A.`PayPeriodTime` = ' . "'" . $PayTimeYearTemp . '-' . $PayTimeMonthTemp . "'";
                }
                $strPayTemp .= $PayTimeYearTemp . '年' . $PayTimeMonthTemp . '月';
                if ($j == $PayPeriod - 1) {
                    $strTimeYearMonthTemp .= '-' . $PayTimeMonthTemp;
                    $TitleNum = "";
                    $sql2     = "SELECT A.* FROM `es_houpayitem` AS A
                        WHERE " . $strPayTempSQL . " AND A.`householdID` = " . $row_result[0] . ";";
                    $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                    while ($row_result2 = mysqli_fetch_array($result2)) {
                        $sql3      = "SELECT A.Number FROM `es_houpayitemnum` AS A WHERE A.es_houpayitemID = " . $row_result2[0];
                        $result3   = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
                        $rowCount3 = mysqli_num_rows($result3);
                        if ($rowCount3 > 0) {
                            $row_result3 = mysqli_fetch_array($result3);
                            $TitleNum    = $row_result3[0];
                        } else {
                            $sql4        = "SELECT A.Number FROM `es_houpayitemnum` AS A WHERE A.es_communityID = " . $CommunityID . " ORDER BY A.ID DESC Limit 0,1 ";
                            $result4     = mysqli_query($conn, $sql4) or die('MySQL 語法錯誤' . $sql4);
                            $row_result4 = mysqli_fetch_array($result4);
                            $TitleNum    = (int) $row_result4[0] + 1;
                        }
                    }

                    // ------------------------------------------------------------------
                    echo '<div class="">
                        <!-- ---------------------------------------- -->';
                    echo '<div style="clear:both;margin-top:5px;">　</div>';
                    echo '<div style="font-size:20px;margin-left:32vw;float:left;">' . $CommunityName . '</div>
                    <div style="font-size:20px;margin-left:45vw;float:left;">' . $TitleNum . '</div>
                    <div style="clear:both;margin-top:5px;">　</div>
                        <!-- ---------------------------------------- -->';
                    $HouseNumSpl = preg_split("/(-)/", $row_result[1]);
                    echo '<div style="margin-left:15vw;float:left;">' . $row_result[2] . '</div>
                    <div style="margin-left:40vw;float:left;">' . $row_result[1] . '</div>
                    <div style="clear:both;margin-top:5px;">　</div>
                        <!-- ---------------------------------------- -->';
                    echo '<div style="margin-left:15vw;float:left;">' . $row_result[8] . '</div>
                    <div style="clear:both;margin-top:4px;">　</div>
                        <!-- ---------------------------------------- -->';
                    echo '<div style="margin-left:12vw;float:left;">' . $strTimeYearMonthTemp . '</div>
                    <div style="clear:both;margin-top:4px;">　</div>
                        <!-- ---------------------------------------- -->';
                    $Sum        = 0;
                    $ArrayTemp  = [];
                    $ArrayTemp2 = [];
                    $Count      = 2;
                    $sql2       = "SELECT A.*,B.ItemName  FROM `es_houpayitem` AS A
                        INNER JOIN `es_compayitem` AS B
                        ON A.`compayitemID` = B.ID
                        WHERE " . $strPayTempSQL . " AND A.`householdID` = " . $row_result[0] . ";";
                    $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                    while ($row_result2 = mysqli_fetch_array($result2)) {
                        $sql3      = "SELECT A.Number FROM `es_houpayitemnum` AS A WHERE A.es_houpayitemID = " . $row_result2[0];
                        $result3   = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
                        $rowCount3 = mysqli_num_rows($result3);
                        $sql4      = "";
                        if ($rowCount3 > 0) {
                            $sql4 = "UPDATE `es_houpayitemnum` SET Number = '" . $TitleNum . "' , PayPeriodTime = '" . $row_result2[1] . "' , Maintainer = '" . $Maintainer . "' , ChangeDay = '" . $DateTime . "' , es_communityID = " . $CommunityID . " WHERE  es_houpayitemID = " . $row_result2[0] . ";";
                        } else {
                            $sql4 = "INSERT INTO `es_houpayitemnum` (`ID`,`Number`,`PayPeriodTime`,`Cancellation`,`Remark`,`Maintainer`,`ChangeDay`,`es_communityID`,`es_houpayitemID`) VALUES (Null,'" . $TitleNum . "','" . $row_result2[1] . "','否','','" . $Maintainer . "','" . $DateTime . "'," . $CommunityID . "," . $row_result2[0] . ");";
                        }
                        $result4 = mysqli_query($conn, $sql4) or die('MySQL 語法錯誤' . $sql4);

                        if ($row_result2[10] == '公共管理費') {
                            $ArrayTemp2[0] = (int) ((int) $row_result2[2] - (int) $row_result2[3]);
                        } else if ($row_result2[10] == '停車清潔費') {
                            $ArrayTemp2[1] = (int) ((int) $row_result2[2] - (int) $row_result2[3]);
                        } else {
                            $isName = false;
                            for ($k = 2; $k < $Count; $k++) {
                                if ($ArrayTemp[$k] == $row_result2[10]) {
                                    $isName         = true;
                                    $ArrayTemp2[$k] = $ArrayTemp2[$k] + (int) ((int) $row_result2[2] - (int) $row_result2[3]);
                                }
                            }
                            if ($isName == false) {
                                $ArrayTemp[$Count]  = $row_result2[10];
                                $ArrayTemp2[$Count] = (int) ((int) $row_result2[2] - (int) $row_result2[3]);
                                $Count              = $Count + 1;
                            }
                        }
                        $Sum = $Sum + (int) ((int) $row_result2[2] - (int) $row_result2[3]);
                    }
                    echo '<div style="margin-left:28vw;float:left;">　</div>';
                    for ($k = 2; $k < $Count; $k++) {
                        if ($k == $Count - 1) {
                            echo '<div style="margin-left:5vw;float:left;">' . $ArrayTemp[$k] . '</div>';
                        } else {
                            echo '<div style="margin-left:5vw;float:left;">' . $ArrayTemp[$k] . '</div>';
                        }
                    }
                    echo '<div style="clear:both;margin-top:5px;">　</div>';

                    echo '<!-- ---------------------------------------- -->';
                    echo '<div style="margin-left:10vw;float:left;">　</div>';
                    for ($k = 0; $k < $Count; $k++) {
                        echo '<div style="margin-left:5vw;float:left;">' . $ArrayTemp2[$k] . '　</div>';
                    }
                    for ($k = $Count; $k < 6; $k++){
                    	echo '<div style="margin-left:5vw;float:left;">　　　</div>';
                    }
                    echo '<div style="margin-left:5vw;float:left;">'.$Sum.'</div>';
                    echo '<div style="clear:both;margin-top:5px;margin-bottom:200px;">　</div>';
                    echo '<!-- ---------------------------------------- -->';
                    echo '
                    </div>';
                    // ------------------------------------------------------------------

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