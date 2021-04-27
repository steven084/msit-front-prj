<?php
set_time_limit(864000); //240hr
$CommunityID = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
$BuildingID  = preg_replace("/[\'\"]+/", '', $_POST['BuildingID']);
$HouseSelect = preg_replace("/[\'\"]+/", '', $_POST['HouseSelect']);

$tfootTotalNum  = 0;
$tfootTotalNum2 = 0;

// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
if ($HouseSelect == "All") {
    $sql = "SELECT A.*, B.ItemName,B.ItemCode,C.HouseNum,C.Name
            FROM es_houpayitem A
            INNER JOIN es_compayitem B
            ON A.`compayitemID`=B.ID
            INNER JOIN es_household C
            ON A.householdID = C.ID AND A.buildingID = C.buildingID
            WHERE A.buildingID = " . $BuildingID . "
            AND A.ID NOT IN (SELECT houpayitemID FROM es_houpaystatus);";
} else {
    $sql = "SELECT A.*, B.ItemName,B.ItemCode,C.HouseNum,C.Name
            FROM es_houpayitem A
            INNER JOIN es_compayitem B
            ON A.`compayitemID`=B.ID
            INNER JOIN es_household C
            ON A.householdID = C.ID AND A.buildingID = C.buildingID
            WHERE A.buildingID = " . $BuildingID . " AND A.householdID = " . $HouseSelect . "
            AND A.ID NOT IN (SELECT houpayitemID FROM es_houpaystatus);";
}
$result      = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
$SelectValue = "";
while ($row_result = mysqli_fetch_array($result)) {
    // $SelectValue .= $row_result[0] . ",";
    echo '<tr class="rows">
            <td>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" onclick="checkedChange(this);" value="' . $row_result[0] . '">
                    <label class="custom-control-label" >' . $row_result[0] . '</label>
                </div>
            </td>
            <td>' . $row_result[12] . '</td>
            <td>' . $row_result[13] . '</td>
            <td>' . $row_result[1] . '</td>
            <td>' . $row_result[2] . '</td>
            <td>' . $row_result[3] . '</td>
            <td>' . $row_result[10] . '</td>
            <td>' . $row_result[11] . '</td>
            <td>' . $row_result[4] . '</td>
            <td>' . $row_result[5] . '</td>
            <td>' . $row_result[6] . '</td>
        </tr>';
    $tfootTotalNum  = $tfootTotalNum + (int) $row_result[2];
    $tfootTotalNum2 = $tfootTotalNum2 + (int) $row_result[3];
}
echo '|,';
echo '$' . $tfootTotalNum . ',' . $tfootTotalNum2;