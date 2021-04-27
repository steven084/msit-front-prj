<?php
set_time_limit(864000); //240hr
$checkedRowsValue = preg_replace("/[\'\"]+/", '', $_POST['checkedRowsValue']);
$ID               = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$SystemID         = preg_replace("/[\'\"]+/", '', $_POST['SystemID']);

// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
$valueTemp = "";
for ($i = 0; $i < Count($checkedRowsValue); $i++) {
    $valueTemp .= $checkedRowsValue[$i] . ",";
}
// -----------------------------------------------
$sql    = "UPDATE `es_accountclass` SET `functionID` = '" . $valueTemp . "', `SystemID` = " . $SystemID . " WHERE ID =" . $ID;
$result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
echo "0";