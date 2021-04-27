<?php
set_time_limit(864000); //240hr
$CommunitySelect = preg_replace("/[\'\"]+/", '', $_POST['CommunitySelect']);
$profitRate      = preg_replace("/[\'\"]+/", '', $_POST['profitRate']);
$es_accountID    = preg_replace("/[\'\"]+/", '', $_POST['es_accountID']);
@session_start();
$Maintainer = $_SESSION['account'];
if ($Maintainer == "" || $Maintainer == null) {

} else {
// -----------------------------------------------
    require_once './../connections/Account.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
    mysqli_query($conn, "SET CHARACTER SET UTF8");
    mysqli_select_db($conn, $dbname);
// -----------------------------------------------
    $sql2      = "SELECT * FROM `es_account` WHERE ID = " . $es_accountID . ";";
    $result2   = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
    $rowCount2 = mysqli_num_rows($result2);
    if ($rowCount2 > 0) {
        $sql    = "INSERT INTO `sh_salesprofit` (`ID`, `profitRate`, `es_accountID`, `es_communityID`) VALUES (NULL, " . $profitRate . ", " . $es_accountID . ", " . $CommunitySelect . ");";
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        echo "0";
    } else {
        echo "查無使用者ID!!";
    }
}