<?php
set_time_limit(864000); //240hr
$ID = preg_replace("/[\'\"]+/", '', $_POST['ID']);
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
$sql        = "SELECT householdID FROM `es_account` Where ID = " . $ID . ";";
$result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
$row_result = mysqli_fetch_array($result);
echo $row_result[0];