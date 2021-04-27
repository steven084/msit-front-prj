<?php
set_time_limit(864000); //240hr
$CommunityID = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
$sql = "SELECT A.*,B.Name FROM `sh_mdse` A
INNER JOIN `sh_mdseclass` B
ON A.mdseclassID = B.ID
WHERE A.VerifyStatus = '審核中' AND B.CommunityID = " . $CommunityID . ";";
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
            <td>' . $row_result[18] . '</td>
            <td>' . $row_result[1] . '</td>
            <td>' . $row_result[2] . '</td>
            <td>' . $row_result[3] . '</td>
            <td>' . $row_result[4] . '</td>
            <td>
                <img src="' . $row_result[5] . '" width="100" height="100">
            </td>
            <td>
                <img src="' . $row_result[6] . '" width="100" height="100">
            </td>
            <td>
                <img src="' . $row_result[7] . '" width="100" height="100">
            </td>
            <td>
                <img src="' . $row_result[8] . '" width="100" height="100">
            </td>
            <td>
                <img src="' . $row_result[9] . '" width="100" height="100">
            </td>
            <td>' . $row_result[10] . '</td>
            <td>' . $row_result[11] . '</td>
            <td>' . $row_result[12] . '</td>
            <td>' . $row_result[13] . '</td>
            <td>' . $row_result[14] . '</td>
            <td>' . $row_result[15] . '</td>
        </tr>';
}
echo '|' . $SelectValue;