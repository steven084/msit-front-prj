<?php
set_time_limit(864000); //240hr
$functionName = preg_replace("/[\'\"]+/", '', $_POST['functionName']);
$MdseID       = preg_replace("/[\'\"]+/", '', $_POST['MdseID']);
$StratTime    = preg_replace("/[\'\"]+/", '', $_POST['StratTime']);
$EndTime      = preg_replace("/[\'\"]+/", '', $_POST['EndTime']);
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
switch ($functionName) {
    case 'tbody':
        @session_start();
        $ID  = $_SESSION['ID'];
        $sql = "";
        if ($MdseID == 'All') {
            $sql = "SELECT A.ID,B.Sh_mdseID,B.Name,B.Number,B.Price,C.HandlingFee,E.Name,D.Name
                        FROM `sh_order` AS A
                        INNER JOIN `sh_orderdetails` AS B
                        ON A.ID = B.`sh_orderID`
                        INNER JOIN `sh_mdse`AS C
                        ON B.`sh_mdseID` = C.ID
                        INNER JOIN `sh_mdseclass` AS D
                        ON C.mdseclassID = D.ID
                        INNER JOIN `es_community` AS E
                        ON D.communityID = E.ID
                        WHERE A.`orderStatus` = '訂單完成' AND C.accountID =" . $ID . " AND A.ChangeDay BETWEEN '" . $StratTime . "' AND '" . $EndTime . "';";
        } else {
            $sql = "SELECT A.ID,B.Sh_mdseID,B.Name,B.Number,B.Price,C.HandlingFee,E.Name,D.Name
                        FROM `sh_order` AS A
                        INNER JOIN `sh_orderdetails` AS B
                        ON A.ID = B.`sh_orderID`
                        INNER JOIN `sh_mdse`AS C
                        ON B.`sh_mdseID` = C.ID
                        INNER JOIN `sh_mdseclass` AS D
                        ON C.mdseclassID = D.ID
                        INNER JOIN `es_community` AS E
                        ON D.communityID = E.ID
                        WHERE A.`orderStatus` = '訂單完成' AND C.accountID =" . $ID . " AND B.Name = '" . $MdseID . "' AND A.ChangeDay BETWEEN '" . $StratTime . "' AND '" . $EndTime . "';";
        }
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        while ($row_result = mysqli_fetch_array($result)) {
            echo '
                <tr class="rows">
                    <td>' . $row_result[0] . '</td>
                    <td>' . $row_result[1] . '</td>
                    <td>' . $row_result[7] . '</td>
                    <td>' . $row_result[2] . '</td>
                    <td>' . $row_result[3] . '</td>
                    <td>' . $row_result[4] . '</td>
                    <td>' . (int) ((int) $row_result[3] * (int) $row_result[4]) . '</td>
                    <td>' . (int) (((int) $row_result[3] * (int) $row_result[4]) * ((float) $row_result[5] / 100)) . '</td>
                    <td>' . $row_result[6] . '</td>
                </tr>
            ';
        }
        break;
    default:
        echo 'unknow';
        break;
}