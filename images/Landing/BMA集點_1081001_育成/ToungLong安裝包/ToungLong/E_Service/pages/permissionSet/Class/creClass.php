<?php
set_time_limit(864000); //240hr
$Name     = preg_replace("/[\'\"]+/", '', $_POST['Name']);
$SystemID = preg_replace("/[\'\"]+/", '', $_POST['SystemID']);
// -----------------------------------------------
require_once './../../connections/Account.php';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysql_query("SET NAMES 'utf8'", $conn);
mysql_select_db($dbname, $conn);
// -----------------------------------------------
$sql    = "INSERT INTO `es_accountclass` (`ID`, `Name`, `functionID` , `SystemID`) VALUES (NULL, '" . $Name . "', '' , " . $SystemID . ");";
$result = mysql_query($sql, $conn) or die('MySQL 語法錯誤' . $sql);
echo "0";