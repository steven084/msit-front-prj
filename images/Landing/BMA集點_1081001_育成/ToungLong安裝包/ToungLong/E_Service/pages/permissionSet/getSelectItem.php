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
    case 'ClassSelect':case 'ClassSelect2':
        $sql    = "SELECT * FROM `es_accountclass`";
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        while ($row_result = mysqli_fetch_array($result)) {
            echo '<option value="' . $row_result[0] . '">' . $row_result[1] . '</option>';
        }
        break;
    case 'UserSelect':
        $sql    = "SELECT * FROM `es_account` where ClassID = " . $Value;
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        while ($row_result = mysqli_fetch_array($result)) {
            echo '<option value="' . $row_result[0] . '">' . $row_result[1] . '</option>';
        }
        break;
    case 'SystemSelect':
        $sql        = "SELECT * FROM `es_account` where ID = " . $Value;
        $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result = mysqli_fetch_array($result);
        // -------------------------------------------------------------------------------
        $sql2    = "SELECT * FROM `es_system` ;";
        $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
        while ($row_result2 = mysqli_fetch_array($result2)) {
            if ($row_result[5] == $row_result2[0]) {
                echo '<option value="' . $row_result2[0] . '" selected>' . $row_result2[1] . '</option>';
            } else {
                echo '<option value="' . $row_result2[0] . '">' . $row_result2[1] . '</option>';
            }
        }
        break;
    case 'SystemSelect2':
        $sql        = "SELECT * FROM `es_accountclass` where ID = " . $Value;
        $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result = mysqli_fetch_array($result);
        // -------------------------------------------------------------------------------
        $sql2    = "SELECT * FROM `es_system` ;";
        $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
        while ($row_result2 = mysqli_fetch_array($result2)) {
            if ($row_result[3] == $row_result2[0]) {
                echo '<option value="' . $row_result2[0] . '" selected>' . $row_result2[1] . '</option>';
            } else {
                echo '<option value="' . $row_result2[0] . '">' . $row_result2[1] . '</option>';
            }
        }
        break;
    case 'curClassSelect2':
        $sql        = "SELECT * FROM `es_accountclass` where ID =" . $Value;
        $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result = mysqli_fetch_array($result);
        echo $row_result[3];
        break;
    case 'curUserSelect':
        $sql        = "SELECT * FROM `es_account` where ID =" . $Value;
        $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result = mysqli_fetch_array($result);
        echo $row_result[5];
        break;
    default:
        echo 'unknow';
        break;
}