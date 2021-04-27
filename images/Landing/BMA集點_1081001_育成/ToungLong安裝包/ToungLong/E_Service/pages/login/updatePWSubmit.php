<?php
set_time_limit(864000); //240hr
$OriginalPW = $_POST['OriginalPW'];
$UpdatePW   = $_POST['UpdatePW'];

// -----------------------------------------------
session_start();
session_unset();
// -----------------------------------------------
require_once '../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
$sql      = 'SELECT `ID` FROM `es_account` WHERE `Password`= "' . $OriginalPW . '";';
$result   = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
$rowCount = mysqli_num_rows($result);
if ($rowCount > 0) {
    $sql2    = 'UPDATE `es_account` SET `Password` = "' . $UpdatePW . '" WHERE `Password` = "' . $OriginalPW . '";';
    $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
    echo "0";
} else {
    echo "1";
}