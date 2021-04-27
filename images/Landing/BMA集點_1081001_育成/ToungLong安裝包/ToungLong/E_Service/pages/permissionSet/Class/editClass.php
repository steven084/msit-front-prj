<?php
set_time_limit(864000); //240hr
$ID   = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$Name = preg_replace("/[\'\"]+/", '', $_POST['Name']);
// -----------------------------------------------
require_once './../../connections/Account.php';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysql_query("SET NAMES 'utf8'", $conn);
mysql_select_db($dbname, $conn);
// -----------------------------------------------
$sql    = "UPDATE `es_accountclass` SET `Name` = '" . $Name . "' WHERE `es_accountclass`.`ID` = " . $ID . ";";
$result = mysql_query($sql, $conn) or die('MySQL 語法錯誤' . $sql);
echo "0";