<?php
set_time_limit(864000); //240hr
$es_accountID = preg_replace("/[\'\"]+/", '', $_POST['UserID']);
$Processing   = preg_replace("/[\'\"]+/", '', $_POST['Processing']);
$PointNum     = preg_replace("/[\'\"]+/", '', $_POST['PointNum']);
$Remark       = preg_replace("/[\'\"]+/", '', $_POST['Remark']);
$Processing2  = '';
if ($Processing == '+') {
    $Processing2 = "增加";
} else if ($Processing == '-') {
    $Processing2 = "減少";
}
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
    $sql2      = "SELECT * FROM `es_account` WHERE ID = " . $es_accountID . ";";
    $result2   = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
    $rowCount2 = mysqli_num_rows($result2);
    if ($rowCount2 > 0) {
        $sql = "INSERT INTO `accountpoint` (`ID`, `accountID`, `Processing`, `Point`, `Remark`, `Maintainer`, `ChangeDay`) VALUES (NULL, " . $es_accountID . ", '" . $Processing2 . "', " . $PointNum . ", '" . $Remark . "', '" . $Maintainer . "', '" . $DateTime . "');";
        $sql .= "UPDATE `es_account` AS A
                          INNER JOIN `es_account` AS B
                          ON A.`ID` = B.`ID`
                          SET A.`Point` = (B.`Point`" . $Processing . $PointNum . ")
                          WHERE A.ID = " . $es_accountID . ";";
        $result = mysqli_multi_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        echo "0";
    } else {
        echo "查無使用者ID!!";
    }
}