<?php
set_time_limit(864000); //240hr
$ID = preg_replace("/[\'\"]+/", '', $_POST['ID']);

// -----------------------------------------------
require_once './../../connections/Account.php';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysql_query("SET NAMES 'utf8'", $conn);
mysql_select_db($dbname, $conn);
// -----------------------------------------------
$sql    = "DELETE FROM `es_account` WHERE ClassID =" . $ID;
$result = mysql_query($sql, $conn) or die('MySQL 語法錯誤' . $sql);
// -----------------------------------------------
$sql2    = "DELETE FROM `es_accountclass` WHERE ID =" . $ID;
$result2 = mysql_query($sql2, $conn) or die('MySQL 語法錯誤' . $sql2);
echo "0";