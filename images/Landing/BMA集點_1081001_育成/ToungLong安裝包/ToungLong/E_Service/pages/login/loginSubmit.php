<?php
set_time_limit(864000); //240hr
$inputAccount  = $_POST['inputAccount'];
$inputPassword = $_POST['inputPassword'];
// 過瀘 SQL Injection
$inputAccount  = preg_replace("/[\'\"]+/", '', $inputAccount);
$inputPassword = preg_replace("/[\'\"]+/", '', $inputPassword);
// -----------------------------------------------
session_start();
$_SESSION['account']  = $inputAccount;
$_SESSION['password'] = $inputPassword;
// -----------------------------------------------
require_once '../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
$sql      = "select ID,functionID,SystemID from es_account where Account = '" . $_SESSION['account'] . "' and Password ='" . $_SESSION['password'] . "';";
$result   = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
$rowCount = mysqli_num_rows($result);
if ($rowCount > 0) {
    $row_result             = mysqli_fetch_array($result);

	if($inputAccount == $inputPassword){
		unset($_SESSION['account']);
		unset($_SESSION['password']);
		$_SESSION['accountTemp'] = $inputAccount;
		$_SESSION['passwordTemp'] = $inputPassword;
	}else{
	    $_SESSION['ID']         = $row_result[0];
	    $_SESSION['functionID'] = $row_result[1];
	    $_SESSION['SystemID']   = $row_result[2];
	}
    echo "0";
} else {
    echo "1";
}