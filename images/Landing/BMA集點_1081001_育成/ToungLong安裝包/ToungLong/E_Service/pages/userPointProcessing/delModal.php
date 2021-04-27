<?php
set_time_limit(864000); //240hr
$ID  = preg_replace("/[\'\"]+/", '', $_POST['ID']);

// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
$sql    = "DELETE FROM `es_news` WHERE ID =" . $ID;
$result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
echo "0";