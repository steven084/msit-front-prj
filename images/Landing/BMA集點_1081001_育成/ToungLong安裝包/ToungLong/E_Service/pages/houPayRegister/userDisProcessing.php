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
    $DateTime  = date("Y-m-d H:i:s");
    $sql2      = "SELECT * FROM `es_account` WHERE householdID = " . $row_result[7] . ";";
    $result2   = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
    $rowCount2 = mysqli_num_rows($result2);
    if ($rowCount2 > 0) {
        $row_result2     = mysqli_fetch_array($result2);
        $currentPoint    = $row_result2[7];
        $currentMoney    = $row_result[2];
        $currentDisMoney = $row_result[3];
        $sql3            = "";
        $deductPoint     = 0;
        if ((int) $currentPoint > (int) ((int) $currentMoney - (int) $currentDisMoney)) {
            $deductPoint = (int) ((int) $currentMoney - (int) $currentDisMoney);
        } else {
            $deductPoint = (int) $currentPoint;
        }
        if ($deductPoint != 0) {
            $sql3 .= "UPDATE `es_account` AS A
                      INNER JOIN `es_account` AS B
                      ON A.`ID` = B.`ID`
                      SET A.`Point` = (B.`Point`-" . $deductPoint . ")
                      WHERE A.ID = " . $row_result[7] . ";";
            $sql3 .= "UPDATE `es_houpayitem` AS A
                      INNER JOIN `es_houpayitem` AS B
                      ON A.`ID` = B.`ID`
                      SET A.`DiscountMoney` = (B.`DiscountMoney`+" . $deductPoint . "),
                      A.`Maintainer` = '系統折扣功能' ,A.`ChangeDay` = '" . $DateTime . "'
                      WHERE A.ID = " . $row_result[0] . ";";
            $sql3 .= "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '您的社區繳款編號ID：" . $row_result[0] . "，繳款項目：" . $row_result[10] . "，已新增折扣金額：" . $deductPoint . "。', '系統' , '" . $DateTime . "'," . $row_result[7] . ");";
            $sql3 .= "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '您的點數(Point)已從系統中扣除：" . $deductPoint . "。', '系統' ,'" . $DateTime . "'," . $row_result[7] . ");";

            $result3 = mysqli_multi_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
            // 釋放mysqli_multi_query所包含的所有處理記憶體
            while (mysqli_next_result($conn)) {
                if ($result4 = mysqli_store_result($conn)) {
                    mysqli_free_result($result4);
                }
            }
        }
    }
    echo '編號ID：' . $row_result[0] . '處理完成。';
}