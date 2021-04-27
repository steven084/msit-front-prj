<?php
set_time_limit(864000); //240hr
$ID              = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$ClassName       = preg_replace("/[\'\"]+/", '', $_POST['ClassName']);
$ItemName        = preg_replace("/[\'\"]+/", '', $_POST['ItemName']);
$ItemCode        = preg_replace("/[\'\"]+/", '', $_POST['ItemCode']);
$DefaultMoney    = preg_replace("/[\'\"]+/", '', $_POST['DefaultMoney']);
$DefaultDisMoney = preg_replace("/[\'\"]+/", '', $_POST['DefaultDisMoney']);
$Remark          = preg_replace("/[\'\"]+/", '', $_POST['Remark']);
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
    $sql    = "UPDATE `es_compayitem` SET `ClassName` = '" . $ClassName . "', `ItemName` = '" . $ItemName . "', `ItemCode` = '" . $ItemCode . "', `DefaultMoney` = " . $DefaultMoney . ", `DefaultDisMoney` = " . $DefaultDisMoney . ", `Remark` = '" . $Remark . "', `Maintainer` = '" . $Maintainer . "', `ChangeDay` = '" . $DateTime . "' WHERE ID = " . $ID . ";";
    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    echo "0";
}