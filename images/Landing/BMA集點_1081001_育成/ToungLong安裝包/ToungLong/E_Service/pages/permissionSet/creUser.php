<?php
set_time_limit(864000); //240hr
$ID          = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$Name        = preg_replace("/[\'\"]+/", '', $_POST['Name']);
$Password    = preg_replace("/[\'\"]+/", '', $_POST['Password']);
$householdID = preg_replace("/[\'\"]+/", '', $_POST['householdID']);
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
$sql3      = "SELECT * FROM `es_account` Where Account = '" . $Name . "';";
$result3   = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
$rowCount3 = mysqli_num_rows($result3);
if ($rowCount3 > 0) {
    echo '此使用者名稱已經被使用。';
} else {
    $sql4      = "SELECT * FROM `es_household` Where ID = " . $householdID . ";";
    $result4   = mysqli_query($conn, $sql4) or die('MySQL 語法錯誤' . $sql4);
    $rowCount4 = mysqli_num_rows($result4);
    if ($rowCount4 > 0) {
        $sql        = "SELECT * FROM `es_accountclass` Where ID = " . $ID . ";";
        $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result = mysqli_fetch_array($result);
        $functionID = $row_result[2];
        $SystemID   = $row_result[3];
        // -----------------------------------------------
        $sql2    = "INSERT INTO `es_account` (`ID`, `Account`, `Password`, `ClassID`, `functionID` , `SystemID` , `householdID`,`Point`) VALUES (Null, '" . $Name . "','" . $Password . "'," . $ID . ", '" . $functionID . "', " . $SystemID . ", " . $householdID . ",0);";
        $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
        echo "0";
    } else {
        echo '查無此住戶ID';
    }
}