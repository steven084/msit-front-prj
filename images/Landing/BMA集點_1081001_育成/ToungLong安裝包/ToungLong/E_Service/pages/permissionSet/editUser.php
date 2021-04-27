<?php
set_time_limit(864000); //240hr
$ID          = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$Name        = preg_replace("/[\'\"]+/", '', $_POST['Name']);
$householdID = preg_replace("/[\'\"]+/", '', $_POST['householdID']);
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
$sql4        = "SELECT Account FROM `es_account` Where ID = " . $ID . ";";
$result4     = mysqli_query($conn, $sql4) or die('MySQL 語法錯誤' . $sql4);
$row_result4 = mysqli_fetch_array($result4);
if ($row_result4[0] == $Name) {
    $sql3      = "SELECT * FROM `es_household` Where ID = " . $householdID . ";";
    $result3   = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
    $rowCount3 = mysqli_num_rows($result3);
    if ($rowCount3 > 0) {
        $sql    = "UPDATE `es_account` SET `Account` = '" . $Name . "',householdID = " . $householdID . " WHERE `es_account`.`ID` = " . $ID . ";";
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        echo "0";
    } else {
        echo '查無此住戶ID';
    }
} else {
    $sql2      = "SELECT * FROM `es_account` Where Account = '" . $Name . "';";
    $result2   = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
    $rowCount2 = mysqli_num_rows($result2);
    if ($rowCount2 > 0) {
        echo '此使用者名稱已經被使用。';
    } else {
        $sql3      = "SELECT * FROM `es_household` Where ID = " . $householdID . ";";
        $result3   = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
        $rowCount3 = mysqli_num_rows($result3);
        if ($rowCount3 > 0) {
            $sql    = "UPDATE `es_account` SET `Account` = '" . $Name . "',householdID = " . $householdID . " WHERE `es_account`.`ID` = " . $ID . ";";
            $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
            echo "0";
        } else {
            echo '查無此住戶ID';
        }
    }

}