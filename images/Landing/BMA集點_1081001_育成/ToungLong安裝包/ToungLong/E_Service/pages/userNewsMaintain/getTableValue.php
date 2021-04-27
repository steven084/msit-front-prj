<?php
set_time_limit(864000); //240hr
$functionName  = preg_replace("/[\'\"]+/", '', $_POST['functionName']);
@session_start();
$ID = $_SESSION['ID'];
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
switch ($functionName) {
    case 'tbody':
        $sql    = "SELECT * FROM `account_news` Where es_accountID = " . $ID;
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        while ($row_result = mysqli_fetch_array($result)) {
            echo '
                <tr class="rows">
                    <td>' . $row_result[0] . '</td>
                    <td>' . $row_result[1] . '</td>
                    <td>' . $row_result[2] . '</td>
                    <td>' . $row_result[3] . '</td>
                </tr>
            ';
        }
        break;
    default:
        echo 'unknow';
        break;
}