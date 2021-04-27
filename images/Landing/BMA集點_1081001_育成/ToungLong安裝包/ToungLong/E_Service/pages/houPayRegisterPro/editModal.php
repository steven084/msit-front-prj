<?php
set_time_limit(864000); //240hr
$Number = preg_replace("/[\'\"]+/", '', $_POST['Num']);
$Remark = preg_replace("/[\'\"]+/", '', $_POST['Remark']);
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
    $sql        = "UPDATE `es_houpayitemnum` SET `Cancellation` = '是',`Remark` = '" . $Remark . "' , `Maintainer` = '" . $Maintainer . "', `ChangeDay` = '" . $DateTime . "' WHERE Number = '" . $Number . "';";
    $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    $NumberTemp = (int) $Number + 1;
    while ($isNum == true) {
        $isNum    = false;
        $sql      = "SELECT * FROM es_houpayitemnum AS A WHERE A.Number = '" . $NumberTemp . "';";
        $result   = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount == 0) {
            $isNum = true;
        } else {
            $NumberTemp = (int) $NumberTemp + 1;
        }
    }

    // $sql      = "SELECT * FROM es_houpayitemnum AS A WHERE A.Number = '" . $Number . "';";
    // $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    // while ($row_result = mysqli_fetch_array($result)){
    //     $sql2 = "INSERT INTO `es_houpayitemnum` (`ID`, `Number`, `PayPeriodTime`, `Cancellation`, `Remark`, `Maintainer`, `ChangeDay`, `es_communityID`, `es_houpayitemID`) VALUES (NULL,'".$NumberTemp."','".$row_result[2]."','否','','".$Maintainer."','".$DateTime."',".$row_result[7].",".$row_result[8].");";
    //     $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
    // }

    $sql    = "SELECT A.es_houpayitemID FROM `es_houpayitemnum` AS A WHERE A.Number = '" . $Number . "';";
    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    while ($row_result = mysqli_fetch_array($result)) {
        $sql2    = "DELETE FROM `es_houpaystatus` WHERE houpayitemID =" . $row_result[0] . ";";
        $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
    }

    $sql = "SELECT A.PayPeriodTime,A.es_houpayitemID,C.ID
                FROM `es_houpayitemnum` AS A
                INNER JOIN `es_houpayitem` AS B
                ON A.es_houpayitemID = B.ID
                INNER JOIN `es_account` AS C
                ON B.householdID = C.householdID
                WHERE A.Number = '" . $Number . "';";
    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    while ($row_result = mysqli_fetch_array($result)) {
        $sql2    = "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '您的繳費編號：" . $row_result[1] . "，繳費期間：" . $row_result[0] . "月份,已經被註銷，原因：" . $Remark . "', '系統' , '" . $DateTime . "'," . $row_result[2] . ");";
        $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
    }

    echo "0";
}