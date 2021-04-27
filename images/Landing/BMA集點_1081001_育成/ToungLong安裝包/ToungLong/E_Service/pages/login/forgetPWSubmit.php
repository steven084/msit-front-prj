<?php
set_time_limit(864000); //240hr
$input1 = $_POST['input1'];
$input2 = $_POST['input2'];
$input3 = $_POST['input3'];
// 過瀘 SQL Injection
$input1 = preg_replace("/[\'\"]+/", '', $input1);
$input2 = preg_replace("/[\'\"]+/", '', $input2);
$input3 = preg_replace("/[\'\"]+/", '', $input3);
// -----------------------------------------------
    require_once '../connections/Account.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
    mysqli_query($conn, "SET CHARACTER SET UTF8");
    mysqli_select_db($conn, $dbname);
// -----------------------------------------------
    $sql = "SELECT A.Password
			FROM es_account AS A
			INNER JOIN es_household AS B
			ON A.householdID = B.ID
			WHERE A.Account = '" . $input1 . "' AND B.Phone = '" . $input2 . "' AND B.EMAIL = '" . $input3 . "';";
    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $row_result = mysqli_fetch_array($result);
        echo '此帳號目前密碼：'.$row_result[0];
    } else {
        echo "1";
    }