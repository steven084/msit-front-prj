<?php
set_time_limit(864000); //240hr
$ID      = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$Name    = preg_replace("/[\'\"]+/", '', $_POST['Name']);
$Address = preg_replace("/[\'\"]+/", '', $_POST['Address']);
$Remark  = preg_replace("/[\'\"]+/", '', $_POST['Remark']);
@session_start();
$Maintainer = $_SESSION['account'];
if ($Maintainer == "" || $Maintainer == null) {

}
{
    date_default_timezone_set('Asia/Taipei');
    $DateTime = date("Y-m-d H:i:s");
// -----------------------------------------------
    require_once './../connections/Account.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
    mysqli_query($conn, "SET CHARACTER SET UTF8");
    mysqli_select_db($conn, $dbname);
// -----------------------------------------------
    $sql    = "UPDATE `es_building` SET `Name` = '" . $Name . "',`Address` = '" . $Address . "',`Remark` = '" . $Remark . "', `Maintainer` = '" . $Maintainer . "', `ChangeDay` = '" . $DateTime . "' WHERE ID = " . $ID . ";";
    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    echo "0";
}