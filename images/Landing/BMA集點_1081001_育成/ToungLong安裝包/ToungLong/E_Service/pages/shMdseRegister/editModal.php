<?php
set_time_limit(864000); //240hr
$ID          = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$Description = preg_replace("/[\'\"]+/", '', $_POST['Description']);
$Num         = preg_replace("/[\'\"]+/", '', $_POST['Num']);
$IsShelf     = preg_replace("/[\'\"]+/", '', $_POST['IsShelf']);
$Remark      = preg_replace("/[\'\"]+/", '', $_POST['Remark']);
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
    $sql    = "UPDATE `sh_mdse` SET `Number` = " . $Num . ", `Description` = '" . $Description . "' , `IsShelf` = '" . $IsShelf . "', `Remark` = '" . $Remark . "', `Maintainer` = '" . $Maintainer . "', `ChangeDay` = '" . $DateTime . "' WHERE ID = " . $ID . " AND VerifyStatus = '通過';";
    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    echo "0";
}