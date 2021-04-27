<?php
set_time_limit(864000); //240hr
$CommunityID = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
$StratTime   = preg_replace("/[\'\"]+/", '', $_POST['StratTime']);
$EndTime     = preg_replace("/[\'\"]+/", '', $_POST['EndTime']);
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
$result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
echo 'ID,訂單編號,狀態,總金額,總手續費,備註,維護者,異動日|';
while ($row_result = mysqli_fetch_array($result)) {
    echo $row_result[0] . ',';
    echo $row_result[7] . ',';
    echo $row_result[1] . ',';
    echo $row_result[2] . ',';
    echo $row_result[3] . ',';
    echo $row_result[4] . ',';
    echo $row_result[5] . ',';
    echo $row_result[6] . '|';
}