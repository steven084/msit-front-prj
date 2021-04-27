<?php
set_time_limit(864000); //240hr
$CommunityID = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
$StratTime   = preg_replace("/[\'\"]+/", '', $_POST['StratTime']);
$EndTime     = preg_replace("/[\'\"]+/", '', $_POST['EndTime']);

$tfootTotalNum  = 0;
$tfootTotalNum2 = 0;
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
$sql = "SELECT A.*
        FROM `sh_orderstatus` AS A
        INNER JOIN `sh_order` AS B
        ON A.sh_orderID = B.ID
        INNER JOIN `es_account` AS C
        ON B.es_accountID = C.ID
        INNER JOIN `es_household` AS D
        ON C.householdID = D.ID
        INNER JOIN `es_building` AS E
        ON D.buildingID = E.ID
        WHERE E.communityID = " . $CommunityID . " AND A.Status = '未入帳' AND
        A.ChangeDay BETWEEN '" . $StratTime . "' AND '" . $EndTime . "' ;";
$result      = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
$SelectValue = "";
while ($row_result = mysqli_fetch_array($result)) {
    $SelectValue .= $row_result[0] . ",";
    echo '<tr class="rows table-tr">
            <td>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" onclick="checkedChange(this);" value="' . $row_result[0] . '" checked>
                    <label class="custom-control-label" >' . $row_result[0] . '</label>
                </div>
            </td>
            <td>' . $row_result[7] . '</td>
            <td>' . $row_result[1] . '</td>
            <td>' . $row_result[2] . '</td>
            <td>' . $row_result[3] . '</td>
            <td>' . $row_result[4] . '</td>
            <td>' . $row_result[5] . '</td>
            <td>' . $row_result[6] . '</td>
        </tr>';
    $tfootTotalNum  = $tfootTotalNum + (int) $row_result[2];
    $tfootTotalNum2 = $tfootTotalNum2 + (int) $row_result[3];
}
echo '|' . $SelectValue;
echo '$' . $tfootTotalNum . ',' . $tfootTotalNum2;