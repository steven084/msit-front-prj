<?php
set_time_limit(864000); //240hr
$CommunityID = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
$HouPayTitle = preg_replace("/[\'\"]+/", '', $_POST['HouPayTitle']);
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
$sql      = "SELECT * FROM `es_communityparm` WHERE es_communityID =" . $CommunityID;
$result   = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
$rowCount = mysqli_num_rows($result);
if ($rowCount > 0) {
    $sql2 = "UPDATE `es_communityparm`
			SET `HouPayTitle` = '" . $HouPayTitle . "' WHERE `es_communityID` = " . $CommunityID . ";";
    $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
} else {
    $sql2 = "INSERT INTO `es_communityparm` (`ID`, `HouPayTitle`, `es_communityID`)
                VALUES (NULL,'" . $HouPayTitle . "', " . $CommunityID . ");";
    $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);

}
echo "0";