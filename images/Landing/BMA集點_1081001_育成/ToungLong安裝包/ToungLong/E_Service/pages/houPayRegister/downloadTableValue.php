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
        $strPayTimeTemp .= "A.`PayPeriodTime` = '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "'";
    } else {
        $strPayTimeTemp .= "A.`PayPeriodTime` = '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "' OR ";
    }
    if ($PayTimeMonthTemp == 12) {
        $PayTimeMonthTemp = 1;
        $PayTimeYearTemp += 1;
    } else {
        $PayTimeMonthTemp += 1;
    }
}
if ($HouseSelect == "All") {
    $sql = "SELECT A.*, B.ItemName,B.ItemCode,C.HouseNum,C.Name
            FROM es_houpayitem A
            INNER JOIN es_compayitem B
            ON A.`compayitemID`=B.ID
            INNER JOIN es_household C
            ON A.householdID = C.ID AND A.buildingID = C.buildingID
            WHERE (" . $strPayTimeTemp . ") AND A.buildingID = " . $BuildingID . "
            AND A.ID NOT IN (SELECT houpayitemID FROM es_houpaystatus);";
} else {
    $sql = "SELECT A.*, B.ItemName,B.ItemCode,C.HouseNum,C.Name
            FROM es_houpayitem A
            INNER JOIN es_compayitem B
            ON A.`compayitemID`=B.ID
            INNER JOIN es_household C
            ON A.householdID = C.ID AND A.buildingID = C.buildingID
            WHERE (" . $strPayTimeTemp . ") AND A.buildingID = " . $BuildingID . " AND A.householdID = " . $HouseSelect . "
            AND A.ID NOT IN (SELECT houpayitemID FROM es_houpaystatus);";
}
$result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
echo 'ID,戶號,所有權人,期間(年/月),金額,折扣金額,項目名稱,項目代碼,備註,維護者,異動日|';
while ($row_result = mysqli_fetch_array($result)) {
    echo $row_result[0] . ',';
    echo $row_result[12] . ',';
    echo $row_result[13] . ',';
    echo $row_result[1] . ',';
    echo $row_result[2] . ',';
    echo $row_result[3] . ',';
    echo $row_result[10] . ',';
    echo $row_result[11] . ',';
    echo $row_result[4] . ',';
    echo $row_result[5] . ',';
    echo $row_result[6] . '|';
}