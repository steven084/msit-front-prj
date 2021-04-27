<?php
set_time_limit(864000); //240hr
$ID         = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$HouseNum   = preg_replace("/[\'\"]+/", '', $_POST['HouseNum']);
$Name       = preg_replace("/[\'\"]+/", '', $_POST['Name']);
$Gender     = preg_replace("/[\'\"]+/", '', $_POST['Gender']);
$Birthday   = preg_replace("/[\'\"]+/", '', $_POST['Birthday']);
$IdentityID = preg_replace("/[\'\"]+/", '', $_POST['IdentityID']);
$Phone      = preg_replace("/[\'\"]+/", '', $_POST['Phone']);
$EMAIL      = preg_replace("/[\'\"]+/", '', $_POST['EMAIL']);
$Address    = preg_replace("/[\'\"]+/", '', $_POST['Address']);
$ERName     = preg_replace("/[\'\"]+/", '', $_POST['ERName']);
$ERPhone    = preg_replace("/[\'\"]+/", '', $_POST['ERPhone']);
$Remark     = preg_replace("/[\'\"]+/", '', $_POST['Remark']);

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
    $sql    = "UPDATE `es_household` SET `HouseNum` = '" . $HouseNum . "', `Name` = '" . $Name . "', `Gender` = '" . $Gender . "', `Birthday` = '" . $Birthday . "', `IdentityID` = '" . $IdentityID . "', `Phone` = '" . $Phone . "', `EMAIL` = '" . $EMAIL . "', `Address` = '" . $Address . "', `ERName` = '" . $ERName . "', `ERPhone` = '" . $ERPhone . "', `Remark` = '" . $Remark . "' , `Maintainer` = '" . $Maintainer . "', `ChangeDay` = '" . $DateTime . "' WHERE ID = " . $ID . ";";
    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    echo "0";
}