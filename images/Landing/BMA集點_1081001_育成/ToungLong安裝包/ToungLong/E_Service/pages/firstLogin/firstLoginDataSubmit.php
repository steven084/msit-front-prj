<?php
set_time_limit(864000); //240hr
$input1 = $_POST['input1'];
$input3 = $_POST['input3'];
$input4 = $_POST['input4'];
session_start();
$inputAccount  = $_SESSION['accountTemp'];
$inputPassword = $_SESSION['passwordTemp'];
unset($_SESSION['accountTemp']);
unset($_SESSION['passwordTemp']);
// 過瀘 SQL Injection
$input1 = preg_replace("/[\'\"]+/", '', $input1);
$input3 = preg_replace("/[\'\"]+/", '', $input3);
$input4 = preg_replace("/[\'\"]+/", '', $input4);
// -----------------------------------------------
require_once '../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
$sql = "UPDATE es_household AS A 
		INNER JOIN es_account AS B 
		ON B.householdID = A.ID 
		SET B.Password = '".$input1."',A.Phone = '".$input3."',A.EMAIL = '".$input4."' 
		WHERE B.Account = '".$inputAccount."' AND B.Password = '".$inputPassword."';";
$result   = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
echo '0';