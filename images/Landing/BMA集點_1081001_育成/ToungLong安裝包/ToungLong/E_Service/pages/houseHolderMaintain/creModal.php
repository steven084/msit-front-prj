<?php
set_time_limit(864000); //240hr
$buildingID = preg_replace("/[\'\"]+/", '', $_POST['buildingID']);
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
    $sql    = "INSERT INTO `es_household` (`ID`, `HouseNum`, `Name`, `Gender`, `Birthday`, `IdentityID`, `Phone`, `EMAIL`, `Address`, `ERName`, `ERPhone`, `Remark`, `Maintainer`, `ChangeDay`, `buildingID`) VALUES (NULL , '" . $HouseNum . "','" . $Name . "','" . $Gender . "','" . $Birthday . "','" . $IdentityID . "', '" . $Phone . "','" . $EMAIL . "','" . $Address . "','" . $ERName . "','" . $ERPhone . "','" . $Remark . "','" . $Maintainer . "', '" . $DateTime . "', " . $buildingID . ");";
    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);

    echo "0";
}