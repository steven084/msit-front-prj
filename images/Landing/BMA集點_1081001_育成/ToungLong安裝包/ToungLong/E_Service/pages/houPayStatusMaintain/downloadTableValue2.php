<?php
set_time_limit(864000); //240hr
$CommunityID    = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
$BuildingID     = preg_replace("/[\'\"]+/", '', $_POST['BuildingID']);
$HouseSelect    = preg_replace("/[\'\"]+/", '', $_POST['HouseSelect']);
$StratTime      = preg_replace("/[\'\"]+/", '', $_POST['StratTime']);
$EndTime        = preg_replace("/[\'\"]+/", '', $_POST['EndTime']);
$tfootTotalNum  = 0;
$tfootTotalNum2 = 0;
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
if ($HouseSelect == "All") {
    $sql = "SELECT A.*,C.ItemName,C.ItemCode,D.HouseNum,D.Name FROM `es_houpaystatus` A
            INNER JOIN `es_houpayitem` B
            ON A.houpayitemID = B.ID
            INNER JOIN `es_compayitem` C
            ON B.compayitemID = C.ID
            INNER JOIN `es_household` D
            ON B.householdID = D.ID
            WHERE (A.ChangeDay BETWEEN '" . $StratTime . "' AND '" . $EndTime . "') AND B.buildingID = " . $BuildingID . " ;";
} else {
    $sql = "SELECT A.*,C.ItemName,C.ItemCode,D.HouseNum,D.Name FROM `es_houpaystatus` A
            INNER JOIN `es_houpayitem` B
            ON A.houpayitemID = B.ID
            INNER JOIN `es_compayitem` C
            ON B.compayitemID = C.ID
            INNER JOIN `es_household` D
            ON B.householdID = D.ID
            WHERE (A.ChangeDay BETWEEN '" . $StratTime . "' AND '" . $EndTime . "') AND B.buildingID = " . $BuildingID . " AND B.householdID = " . $HouseSelect . " ;";
}
$result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
echo 'ID,戶號,所有權人,繳費期間(年/月),繳費時間,繳費金額,繳費折扣金額,項目名稱,項目代碼,備註,維護者,異動日|';
while ($row_result = mysqli_fetch_array($result)) {
    echo $row_result[0] . ',';
    echo $row_result[11] . ',';
    echo $row_result[12] . ',';
    echo $row_result[1] . ',';
    echo $row_result[2] . ',';
    echo $row_result[3] . ',';
    echo $row_result[4] . ',';
    echo $row_result[9] . ',';
    echo $row_result[10] . ',';
    echo $row_result[5] . ',';
    echo $row_result[6] . ',';
    echo $row_result[7] . '|';
}