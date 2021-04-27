<?php
set_time_limit(864000); //240hr
$functionName  = preg_replace("/[\'\"]+/", '', $_POST['functionName']);
// -----------------------------------------------
require_once './../../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
switch ($functionName) {
    case 'Title':case 'TitleNews':
        @session_start();
        $ID         = $_SESSION['ID'];
        $sql        = "SELECT SystemID FROM `es_account` Where ID = " . $ID;
        $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result = mysqli_fetch_array($result);
        // -------------------------------------------------------------------
        $sql2        = "SELECT * FROM `es_system` Where ID = " . $row_result[0];
        $result2     = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
        $row_result2 = mysqli_fetch_array($result2);
        echo $row_result2[1];
        break;
    default:
        echo 'unknow';
        break;
}