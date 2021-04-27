<?php
set_time_limit(864000); //240hr
$CommunityID    = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
$BuildingID     = preg_replace("/[\'\"]+/", '', $_POST['BuildingID']);
$HouseID     = preg_replace("/[\'\"]+/", '', $_POST['HouseID']);
$StratTime      = preg_replace("/[\'\"]+/", '', $_POST['StratTime']);
$EndTime        = preg_replace("/[\'\"]+/", '', $_POST['EndTime']);
$totalPayPeriod = preg_replace("/[\'\"]+/", '', $_POST['totalPayPeriod']);
$PayPeriod      = preg_replace("/[\'\"]+/", '', $_POST['PayPeriod']);
$StartTimeSpl   = preg_split("/(-)/", $StratTime);
$EndTimeSpl     = preg_split("/(-)/", $EndTime);
@session_start();
$Maintainer = $_SESSION['account'];
if ($Maintainer == "" || $Maintainer == null) {

} else {
    date_default_timezone_set('Asia/Taipei');
    $DateTime = date("Y-m-d H:i:s");
// -----------------------------------------------
    // 需求多個語法此階段使用 mysqli 為主
    require_once './../connections/Account.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
    mysqli_query($conn, "SET CHARACTER SET UTF8");
    mysqli_select_db($conn, $dbname);
// -----------------------------------------------
    // 查詢社區有幾筆已設定資料
    $sql = "";
    if($HouseID = "All"){
        $sql = "SELECT A.*
                FROM `es_houpayitemdefault` AS A
                INNER JOIN `es_household` AS B
                ON A.householdID = B.ID
                WHERE B.`buildingID` = " . $BuildingID;
    }else{
    $sql = "SELECT A.*
                FROM `es_houpayitemdefault` AS A
                INNER JOIN `es_household` AS B
                ON A.householdID = B.ID
                WHERE B.`buildingID` = " . $BuildingID ." AND B.ID = ".$HouseID.";";
    }
    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    while ($row_result = mysqli_fetch_array($result)) {
        //時間重計
        $PayTimeYearTemp  = (int) $StartTimeSpl[0];
        $PayTimeMonthTemp = (int) $StartTimeSpl[1];
        // for-> 計算總共有幾回合
        for ($i = 0; $i < $totalPayPeriod; $i++) {
            // for-> 計算每回合有幾個期間
            for ($j = 1; $j < $PayPeriod; $j++) {
                $sql4    = "SELECT * FROM `es_houpayitem` WHERE `PayPeriodTime` = '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "' AND householdID = " . $row_result[7] . " AND compayitemID = " . $row_result[6] . " ;";
                $result4 = mysqli_query($conn, $sql4) or die('MySQL 語法錯誤' . $sql4);
                // 查詢繳費期間是否存在，有則更新，沒有則新增
                if (mysqli_num_rows($result4) > 0) {
                    $sql3 .= "UPDATE `es_houpayitem` SET `Money` = 0, `DiscountMoney` = 0, `Remark` = '繳費周期：" . $PayPeriod . "',`Maintainer` = '" . $Maintainer . "',`ChangeDay` = '" . $DateTime . "' WHERE `PayPeriodTime` = '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "' AND householdID = " . $row_result[7] . " AND compayitemID = " . $row_result[6] . " ;";
                } else {
                    $sql3 .= "INSERT INTO `es_houpayitem` (`ID`, `PayPeriodTime`, `Money`, `DiscountMoney`, `Remark`, `Maintainer`, `ChangeDay`, `householdID`, `compayitemID`, `buildingID`) VALUES (Null, '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "',0,0,'繳費周期：" . $PayPeriod . "', '" . $Maintainer . "' , '" . $DateTime . "' , " . $row_result[7] . " , " . $row_result[6] . " , " . $BuildingID . ");";
                }
                if ($PayTimeMonthTemp == 12) {
                    $PayTimeMonthTemp = 1;
                    $PayTimeYearTemp += 1;
                } else {
                    $PayTimeMonthTemp += 1;
                }
            }
            $sql4    = "SELECT * FROM `es_houpayitem` WHERE `PayPeriodTime` = '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "' AND householdID = " . $row_result[7] . " AND compayitemID = " . $row_result[6] . " ;";
            $result4 = mysqli_query($conn, $sql4) or die('MySQL 語法錯誤' . $sql4);
            // 查詢繳費期間是否存在，有則更新，沒有則新增
            if (mysqli_num_rows($result4) > 0) {
                $sql3 .= "UPDATE `es_houpayitem` SET `Money` = " . $row_result[1] . ", `DiscountMoney` = " . $row_result[2] . ", `Remark` = '繳費周期：" . $PayPeriod . "',`Maintainer` = '" . $Maintainer . "',`ChangeDay` = '" . $DateTime . "' WHERE `PayPeriodTime` = '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "' AND householdID = " . $row_result[7] . " AND compayitemID = " . $row_result[6] . " ;";
            } else {
                $sql3 .= "INSERT INTO `es_houpayitem` (`ID`, `PayPeriodTime`, `Money`, `DiscountMoney`, `Remark`, `Maintainer`, `ChangeDay`, `householdID`, `compayitemID`, `buildingID`) VALUES (Null, '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "'," . $row_result[1] . "," . $row_result[2] . ",'繳費周期：" . $PayPeriod . "', '" . $Maintainer . "' , '" . $DateTime . "' , " . $row_result[7] . " , " . $row_result[6] . " , " . $BuildingID . ");";
            }
            if ($PayTimeMonthTemp == 12) {
                $PayTimeMonthTemp = 1;
                $PayTimeYearTemp += 1;
            } else {
                $PayTimeMonthTemp += 1;
            }
        }
    }
    // echo $sql3;
    $result3 = mysqli_multi_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
    echo "0";
}