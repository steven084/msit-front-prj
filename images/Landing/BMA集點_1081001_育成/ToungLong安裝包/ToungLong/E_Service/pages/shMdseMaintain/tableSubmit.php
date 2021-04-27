<?php
set_time_limit(864000); //240hr
$checkedRowsValue = preg_replace("/[\'\"]+/", '', $_POST['checkedRowsValue']);
$VerifyStatus     = preg_replace("/[\'\"]+/", '', $_POST['VerifyStatus']);

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
// -----------------------------------------------
    if ($VerifyStatus == "1") {
        for ($i = 0; $i < Count($checkedRowsValue); $i++) {
            $sql    = "UPDATE `sh_mdse` SET `IsShelf` = '是',`VerifyStatus` = '通過', `Maintainer` = '" . $Maintainer . "', `ChangeDay` = '" . $DateTime . "' WHERE `ID` = " . $checkedRowsValue[$i];
            $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);

            $sql2        = "SELECT accountID FROM `sh_mdse` WHERE ID = " . $checkedRowsValue[$i];
            $result2     = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
            $row_result2 = mysqli_fetch_array($result2);

            $sql3    = "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '您的商品編號：" . $checkedRowsValue[$i] . "，審核：通過。', '系統' , '" . $DateTime . "'," . $row_result2[0] . ");";
            $result3 = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
        }
    } else {
        for ($i = 0; $i < Count($checkedRowsValue); $i++) {
            $sql    = "UPDATE `sh_mdse` SET `VerifyStatus` = '未通過', `Maintainer` = '" . $Maintainer . "', `ChangeDay` = '" . $DateTime . "' WHERE `ID` = " . $checkedRowsValue[$i];
            $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);

            $sql2        = "SELECT accountID FROM `sh_mdse` WHERE ID = " . $checkedRowsValue[$i];
            $result2     = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
            $row_result2 = mysqli_fetch_array($result2);

            $sql3    = "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '您的商品編號：" . $checkedRowsValue[$i] . "，審核：未通過。', '系統' , '" . $DateTime . "'," . $row_result2[0] . ");";
            $result3 = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
        }
    }
// -----------------------------------------------
    echo "0";
}