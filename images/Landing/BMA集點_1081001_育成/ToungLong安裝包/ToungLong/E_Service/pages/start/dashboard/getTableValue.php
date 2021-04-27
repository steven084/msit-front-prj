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
    case 'tbody':
        @session_start();
        $SystemID = $_SESSION['SystemID'];
        $sql      = "SELECT * FROM `es_news` where SystemID = " . $SystemID;
        $result   = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        while ($row_result = mysqli_fetch_array($result)) {
            echo '
                <ul>
                    <tr class="rows">
                        <td>
                            <li>
                                ' . $row_result[3] . '
                            </li>
                        </td>
                        <td>
                            ' . $row_result[1] . '
                        </td>
                        <td>
                            ' . $row_result[2] . '
                        </td>
                    </tr>
                </ul>
            ';
        }
        break;
    default:
        echo 'unknow';
        break;
}