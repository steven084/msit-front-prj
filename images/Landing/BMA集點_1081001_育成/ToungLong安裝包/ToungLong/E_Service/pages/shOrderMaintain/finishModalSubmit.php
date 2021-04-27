<?php
set_time_limit(864000); //240hr
$ID = preg_replace("/[\'\"]+/", '', $_POST['ID']);
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
    $sql    = "UPDATE `sh_order` SET `orderStatus` = '訂單到貨' WHERE ID = " . $ID . ";";
    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
// -----------------------------------------------
    $sql2        = "SELECT es_accountID FROM `sh_order` WHERE ID = " . $ID . ";";
    $result2     = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
    $row_result2 = mysqli_fetch_array($result2);
// -----------------------------------------------
    $sql3    = "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '您訂購商品已到貨，訂單編號：" . $ID . "。', '系統' , '" . $DateTime . "'," . $row_result2[0] . ");";
    $result3 = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
// -----------------------------------------------
    echo "0";
}