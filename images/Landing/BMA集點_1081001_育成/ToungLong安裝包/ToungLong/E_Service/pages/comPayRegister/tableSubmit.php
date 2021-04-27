<?php
set_time_limit(864000); //240hr
$checkedRowsValue = preg_replace("/[\'\"]+/", '', $_POST['checkedRowsValue']);

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
    for ($i = 0; $i < Count($checkedRowsValue); $i++) {
        $sql        = "SELECT * FROM `es_houpaystatus` WHERE `ID` = " . $checkedRowsValue[$i];
        $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result = mysqli_fetch_array($result);
        // -----------------------------------------------
        $sql2    = "INSERT INTO `es_compaystatus` (`ID`, `EnterMoney`, `EnterTime`, `Remark`, `Maintainer`, `ChangeDay`, `houpaystatusID`) VALUES (Null, '" . $row_result[3] . "', '" . $DateTime . "', '', '" . $Maintainer . "','" . $DateTime . "', " . $row_result[0] . ");";
        $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
    }
// -----------------------------------------------
    echo "0";
}