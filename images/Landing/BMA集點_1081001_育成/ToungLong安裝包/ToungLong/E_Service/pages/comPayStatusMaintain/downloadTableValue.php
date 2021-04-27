<?php
set_time_limit(864000); //240hr
$CommunityID      = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
$BuildingID       = preg_replace("/[\'\"]+/", '', $_POST['BuildingID']);
$HouseSelect      = preg_replace("/[\'\"]+/", '', $_POST['HouseSelect']);
$StratTime        = preg_replace("/[\'\"]+/", '', $_POST['StratTime']);
$EndTime          = preg_replace("/[\'\"]+/", '', $_POST['EndTime']);
$totalPayPeriod   = (int) preg_replace("/[\'\"]+/", '', $_POST['totalPayPeriod']);
$StartTimeSpl     = preg_split("/(-)/", $StratTime);
$EndTimeSpl       = preg_split("/(-)/", $EndTime);
$PayTimeYearTemp  = (int) $StartTimeSpl[0];
$PayTimeMonthTemp = (int) $StartTimeSpl[1];

// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
$strPayTimeTemp = "";
// for-> 計算總共有幾回合
for ($i = 0; $i < $totalPayPeriod; $i++) {
    if ($i == $totalPayPeriod - 1) {
        $strPayTimeTemp .= "B.`PayPeriodTime` = '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "'";
    } else {
        $strPayTimeTemp .= "B.`PayPeriodTime` = '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "' OR ";
    }
    if ($PayTimeMonthTemp == 12) {
        $PayTimeMonthTemp = 1;
        $PayTimeYearTemp += 1;
    } else {
        $PayTimeMonthTemp += 1;
    }
}
if ($HouseSelect == "All") {
    $sql = "SELECT A.*,B.PayPeriodTime,D.ItemName,D.ItemCode,E.HouseNum,E.Name FROM `es_compaystatus` A
            INNER JOIN `es_houpaystatus` B
            ON A.houpaystatusID = B.ID
            INNER JOIN `es_houpayitem` C
            ON B.houpayitemID = C.ID
            INNER JOIN `es_compayitem` D
            ON C.compayitemID = D.ID
            INNER JOIN `es_household` E
            ON C.householdID = E.ID
            WHERE (" . $strPayTimeTemp . ") AND C.buildingID = " . $BuildingID . " ;";
} else {
    $sql = "SELECT A.*,B.PayPeriodTime,D.ItemName,D.ItemCode,E.HouseNum,E.Name FROM `es_compaystatus` A
            INNER JOIN `es_houpaystatus` B
            ON A.houpaystatusID = B.ID
            INNER JOIN `es_houpayitem` C
            ON B.houpayitemID = C.ID
            INNER JOIN `es_compayitem` D
            ON C.compayitemID = D.ID
            INNER JOIN `es_household` E
            ON C.householdID = E.ID
            WHERE (" . $strPayTimeTemp . ") AND C.buildingID = " . $BuildingID . " AND C.householdID = " . $HouseSelect . " ;";
}
$result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
echo 'ID,戶號,所有權人,繳費期間(年/月),入帳時間,入帳金額,項目名稱,項目代碼,備註,維護者,異動日|';
while ($row_result = mysqli_fetch_array($result)) {
    echo $row_result[0] . ',';
    echo $row_result[10] . ',';
    echo $row_result[11] . ',';
    echo $row_result[7] . ',';
    echo $row_result[2] . ',';
    echo $row_result[1] . ',';
    echo $row_result[8] . ',';
    echo $row_result[9] . ',';
    echo $row_result[3] . ',';
    echo $row_result[4] . ',';
    echo $row_result[5] . '|';
}