<?php
set_time_limit(864000); //240hr
$ID   = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$News = preg_replace("/[\'\"]+/", '', $_POST['News']);
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
    $ID = preg_split("/(,)/", $ID);
    for ($i = 0; $i < count($ID); $i++) {
        $sql      = "SELECT * FROM `es_account` WHERE ID = " . $ID[$i] . ";";
        $result   = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
            $sql2    = "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '" . $News . "', '" . $Maintainer . "', '" . $DateTime . "'," . $ID[$i] . ");";
            $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
            echo "ID : " . $ID[$i] . ",訊息發送成功。";
        } else {
            echo "ID : " . $ID[$i] . ",此ID不存在。";
        }
    }
}
