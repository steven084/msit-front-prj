<?php
set_time_limit(864000); //240hr
$ID              = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$CommunityID     = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
$DefaultMoney    = preg_replace("/[\'\"]+/", '', $_POST['DefaultMoney']);
$DefaultDisMoney = preg_replace("/[\'\"]+/", '', $_POST['DefaultDisMoney']);
$es_compayitemID = preg_replace("/[\'\"]+/", '', $_POST['es_compayitemID']);
$es_householdID  = preg_replace("/[\'\"]+/", '', $_POST['es_householdID']);
$Remark          = preg_replace("/[\'\"]+/", '', $_POST['Remark']);
@session_start();
$Maintainer = $_SESSION['account'];
if ($Maintainer == "" || $Maintainer == null) {

} else {
    date_default_timezone_set('Asia/Taipei');
    $DateTime = date("Y-m-d H:i:s");
// -----------------------------------------------
    require_once './../connections/Account.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
    mysqli_query($conn, "SET CHARACTER SET UTF8");
    mysqli_select_db($conn, $dbname);
// -----------------------------------------------
    $sql      = "SELECT * FROM `es_compayitem` WHERE ID = " . $es_compayitemID . " AND communityID = " . $CommunityID . " ;";
    $result   = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $sql2 = "SELECT A.* FROM `es_household` AS A
                    INNER JOIN `es_building` AS B
                    ON A.buildingID = B.ID
                    WHERE A.ID = " . $es_householdID . " AND B.communityID = " . $CommunityID . " ;";
        $result2   = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
        $rowCount2 = mysqli_num_rows($result2);
        if ($rowCount2 > 0) {
            $sql3    = "UPDATE `es_houpayitemdefault` SET `DefaultMoney` = " . $DefaultMoney . ",`DefaultDisMoney` = " . $DefaultDisMoney . ",`Remark` = '" . $Remark . "',`Maintainer` = '" . $Maintainer . "',`ChangeDay` = '" . $DateTime . "',`es_compayitemID` = " . $es_compayitemID . ",`householdID` = " . $es_householdID . " WHERE ID = " . $ID . " ;";
            $result3 = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
            echo '0';
        } else {
            echo '社區住戶ID不存在。';
        }
    } else {
        echo '社區繳費項目ID不存在。';
    }
}