<?php
set_time_limit(864000); //240hr
$functionName = preg_replace("/[\'\"]+/", '', $_POST['functionName']);
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
switch ($functionName) {
    case 'CommunitySelect':
        @session_start();
        $SystemID     = $_SESSION['SystemID'];
        $sql          = "SELECT * FROM `es_system` WHERE ID = " . $SystemID;
        $result       = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result   = mysqli_fetch_array($result);
        $result_value = preg_split("/(,)/", $row_result[2]);
        $sqlTemp      = "WHERE ";
        for ($i = 0; $i < count($result_value) - 1; $i++) {
            if ($i == count($result_value) - 2) {
                $sqlTemp .= "`ID` = " . $result_value[$i] . ";";
            } else {
                $sqlTemp .= "`ID` = " . $result_value[$i] . " OR ";
            }
        }
        // ----------------------------------------
        $sql2    = "SELECT * FROM `es_community` " . $sqlTemp;
        $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
        while ($row_result2 = mysqli_fetch_array($result2)) {
            echo '<option value="' . $row_result2[0] . '">' . $row_result2[1] . '</option>';
        }
        break;
    default:
        echo 'unknow';
        break;
}