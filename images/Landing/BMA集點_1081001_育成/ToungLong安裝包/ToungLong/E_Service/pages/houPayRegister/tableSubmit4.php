<?php
set_time_limit(864000); //240hr
$checkedRowsValue = preg_replace("/[\'\"]+/", '', $_POST['checkedRowsValue']);

@session_start();
$Maintainer = $_SESSION['account'];
if ($Maintainer == "" || $Maintainer == null) {

} else {
    date_default_timezone_set('Asia/Taipei');
    $DateTime = date("Y-m-d H:i:s");
// -----------------------------------------------
    require_once './../connections/Account.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
    mysqli_query($conn, "SET CHARACTER SET UTF8");
    mysqli_select_db($conn, $dbname);
// check houpayitemnum
    $checkedRowsValueTemp  = [];
    $householdIDTemp       = [];
    $checkedRowsValueTemp2 = []; //儲存擁有ID
    $householdIDTemp2      = []; //儲存擁有棟別住戶
    for ($i = 0; $i < Count($checkedRowsValue); $i++) {
        if ($checkedRowsValue[$i] != "") {
            $isIndex = false;
            for ($j = 0; $j < Count($checkedRowsValue); $j++) {
                for ($k = 0; $k < Count($checkedRowsValueTemp2); $k++) {
                    if ($checkedRowsValueTemp2[$k] == $checkedRowsValue[$j]) {
                        $isIndex = true;
                    }
                }
            }
            if ($isIndex == true) {

            } else {
                $sql = "SELECT ID,householdID FROM `es_houpayitem`
            WHERE householdID = (SELECT householdID FROM `es_houpayitem` WHERE ID = " . $checkedRowsValue[$i] . " )";
                $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
                while ($row_result = mysqli_fetch_array($result)) {
                    array_push($checkedRowsValueTemp, $row_result[0]);
                    array_push($householdIDTemp, $row_result[1]);
                }
                for ($j = 0; $j < Count($checkedRowsValue); $j++) {
                    for ($k = 0; $k < Count($checkedRowsValueTemp); $k++) {
                        if ($checkedRowsValueTemp[$k] == $checkedRowsValue[$j]) {
                            array_push($checkedRowsValueTemp2, $checkedRowsValueTemp[$k]);
                            array_push($householdIDTemp2, $householdIDTemp[$k]);
                        }
                    }
                }
            }
        }
    }
// -----------------------------------------------
    for ($i = 0; $i < Count($checkedRowsValueTemp2); $i++) {
        $sql = "SELECT A.*,B.ItemName FROM `es_houpayitem` AS A
                        INNER JOIN `es_compayitem` AS B
                        ON A.compayitemID = B.ID
                        WHERE A.`ID` = " . $checkedRowsValueTemp2[$i];
        $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result = mysqli_fetch_array($result);
        $date       = date_create_from_format("Y-m", $row_result[1]);
        // -----------------------------------------------
        $sql2 = "SELECT A.PayPeriodTime
            FROM es_houpayitem A
            WHERE A.householdID = " . $row_result[7] . "
            AND A.ID NOT IN (SELECT houpayitemID FROM es_houpaystatus) Limit 0,1;";
        $result2     = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
        $row_result2 = mysqli_fetch_array($result2);
        $date2       = date_create_from_format("Y-m", $row_result2[0]);

        if ($date->getTimestamp() > $date2->getTimestamp()) {
            echo '編號ID:' . $checkedRowsValueTemp2[$i] . '繳費失敗，過去還有' . $row_result2[0] . '尚未繳費。';
            $checkedRowsValueTemp2[$i] = "";
            $householdIDTemp2[$i]      = "";
        } else {
            echo '編號ID:' . $checkedRowsValueTemp2[$i] . '繳費成功。';
            $sql2    = "INSERT INTO `es_houpaystatus` (`ID`, `PayPeriodTime`, `PayTime`, `PayMoney`, `PayDisMoney`, `Remark`, `Maintainer`, `ChangeDay`, `houpayitemID`) VALUES (Null, '" . $row_result[1] . "', '" . $DateTime . "', '" . $row_result[2] . "', '" . $row_result[3] . "','例外狀況','" . $Maintainer . "','" . $DateTime . "', " . $row_result[0] . ");";
            $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);

            $sql3      = "SELECT * FROM `es_account` WHERE `householdID` = " . $row_result[7];
            $result3   = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
            $rowCount3 = mysqli_num_rows($result3);
            if ($rowCount3 > 0) {
                $row_result3 = mysqli_fetch_array($result3);
                $sql3        = "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '您的繳費編號：" . $row_result[0] . "，繳費期間：" . $row_result[1] . "月份，繳費項目：" . $row_result[10] . "，已經完成繳費。繳費金額：".$row_result[2]."，折扣金額：".$row_result[3]."。', '系統' , '" . $DateTime . "'," . $row_result3[0] . ");";
                $result3     = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
            }
        }
    }
// -----------------------------------------------
    echo '|';
    for ($i = 0; $i < count($checkedRowsValueTemp2); $i++) {
        if ($checkedRowsValueTemp2[$i] != "") {
            echo $checkedRowsValueTemp2[$i] . ",";
        }
    }
    echo '|';
    for ($i = 0; $i < count($householdIDTemp2); $i++) {
        if ($householdIDTemp2[$i] != "") {
            echo $householdIDTemp2[$i] . ",";
        }
    }

}