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
    $sql = "SELECT A.*,B.ItemName
            FROM es_houpayitem A
            INNER JOIN es_compayitem B
            ON A.compayitemID = B.ID
            WHERE (" . $strPayTimeTemp . ") AND A.buildingID = " . $BuildingID . "
            AND A.ID NOT IN (SELECT houpayitemID FROM es_houpaystatus) AND A.Money != A.DiscountMoney;";
} else {
    $sql = "SELECT A.*,B.ItemName
            FROM es_houpayitem A
            INNER JOIN es_compayitem B
            ON A.compayitemID = B.ID
            WHERE (" . $strPayTimeTemp . ") AND A.buildingID = " . $BuildingID . " AND A.householdID = " . $HouseSelect . "
            AND A.ID NOT IN (SELECT houpayitemID FROM es_houpaystatus) AND A.Money != A.DiscountMoney;";
}
$result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
while ($row_result = mysqli_fetch_array($result)) {
    date_default_timezone_set('Asia/Taipei');
    $DateTime = date("Y-m-d H:i:s");

    $sql2      = "SELECT * FROM `es_account` WHERE householdID = " . $row_result[7];
    $result2   = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
    $rowCount2 = mysqli_num_rows($result2);
    $sql3      = "";
    if ($rowCount2 > 0) {
        $row_result2 = mysqli_fetch_array($result2);
        $sql3 .= "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`)
                VALUES (NULL,'未繳款通知，您在" . $row_result[1] . "月份尚有" . $row_result[10] . "未繳款，金額:" . $row_result[2] . "，折扣金額:" . $row_result[3] . "，尚需繳款金額:" . (int) ((int) $row_result[2] - (int) $row_result[3]) . "，請盡快繳交。', '系統' , '" . $DateTime . "', " . $row_result2[0] . ");";
        echo 'ID:' . $row_result[0] . '通知成功。';
    } else {
        echo 'ID:' . $row_result[0] . '通知失敗，因住戶ID:' . $row_result[7] . '沒有建立帳戶。';
    }
    $result3 = mysqli_multi_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
}