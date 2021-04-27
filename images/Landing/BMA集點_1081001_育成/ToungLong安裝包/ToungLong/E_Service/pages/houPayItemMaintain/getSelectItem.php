<?php
set_time_limit(864000); //240hr
$functionName = preg_replace("/[\'\"]+/", '', $_POST['functionName']);
$Value        = preg_replace("/[\'\"]+/", '', $_POST['Value']);
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
switch ($functionName) {
    case 'BuildingSelect':
        $sql    = "SELECT * FROM `es_building` WHERE communityID = " . $Value;
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        while ($row_result = mysqli_fetch_array($result)) {
            echo '<option value="' . $row_result[0] . '">' . $row_result[1] . '</option>';
        }
        break;
    case 'HouseSelect':
        $sql    = "SELECT * FROM `es_household` WHERE buildingID = " . $Value;
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        echo '<option value="All">All</option>';
        while ($row_result = mysqli_fetch_array($result)) {
            echo '<option value="' . $row_result[0] . '">' . $row_result[1] . ' : ' . $row_result[2] . '</option>';
        }
        break;
    default:
        echo 'unknow';
        break;
}