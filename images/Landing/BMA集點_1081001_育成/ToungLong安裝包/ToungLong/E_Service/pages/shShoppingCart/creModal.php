<?php
set_time_limit(864000); //240hr

$Array      = unserialize($_COOKIE["ShoppingCart"]);
$IDArray    = $Array['ID'];
$NameArray  = $Array['Name'];
$NumArray   = $Array['Number'];
$PriceArray = $Array['Price'];
$RemarkArray = $Array['Remark'];
$Phone  = preg_replace("/[\'\"]+/", '', $_POST['Phone']);

@session_start();
$Maintainer = $_SESSION['account'];
$UserID     = $_SESSION['ID'];
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
    $stockCheck = true;
	$sql4 = "SELECT C.communityID FROM `es_account` AS A 
			INNER JOIN `es_household` AS B 
			ON A.householdID = B.ID 
			INNER JOIN `es_building` AS C 
			ON B.buildingID = C.ID 
			WHERE A.ID = ".$UserID;
	$result4     = mysqli_query($conn, $sql4) or die('MySQL 語法錯誤' . $sql4);
	$row_result4 = mysqli_fetch_array($result4);
	$userCurCommunityID = $row_result4[0];
    for ($i = 0; $i < count($IDArray); $i++) {

        $sql4        = "SELECT A.Number,B.communityID 
        				FROM `sh_mdse` AS A 
        				INNER JOIN sh_mdseclass AS B 
        				ON A.mdseclassID = B.ID 
        				WHERE A.ID = " . $IDArray[$i];
        $result4     = mysqli_query($conn, $sql4) or die('MySQL 語法錯誤' . $sql4);
        $row_result4 = mysqli_fetch_array($result4);
        if($row_result4[1] != $userCurCommunityID){
        	echo '商品ID:' . $IDArray[$i] . '，不屬於您社區的商品。';
        	$stockCheck = false;
        }else{
	        if ($NumArray[$i] > (int) $row_result4[0]) {
	            echo '商品ID:' . $IDArray[$i] . '庫存不足，目前商品剩餘存貨為:' . (int) $row_result4[0];
	            $stockCheck = false;
	        }
        }
    }
    if ($stockCheck == true) {
// -----------------------------------------------
        $sql    = "INSERT INTO `sh_order` (`ID`, `es_accountID`, `orderStatus`, `ChangeDay`) VALUES (NULL, " . $UserID . ", '訂購中' , '" . $DateTime . "');";
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
// -----------------------------------------------
        $shOrderID = mysqli_insert_id($conn);
        $sql2      = "";

        for ($i = 0; $i < count($IDArray); $i++) {
            $sql2 .= "INSERT INTO `sh_orderdetails` (`ID`, `sh_mdseID`, `Name`, `Number`, `Price`, `sh_orderID` , `Remark`) VALUES (NULL, " . $IDArray[$i] . ", '" . $NameArray[$i] . "', " . $NumArray[$i] . ", " . $PriceArray[$i] . ", " . $shOrderID . ", '連絡電話：".$Phone."。" . $RemarkArray[$i] . "');";
            $sql5        = "SELECT `sh_mdse`.Number,`sh_mdse`.accountID FROM `sh_mdse` WHERE ID = " . $IDArray[$i];
            $result5     = mysqli_query($conn, $sql5) or die('MySQL 語法錯誤' . $sql5);
            $row_result5 = mysqli_fetch_array($result5);

            if (((int) $row_result5[0] - $NumArray[$i]) == 0) {
                $sql2 .= "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '您的商品編號：" . $IDArray[$i] . "，庫存數量已達0，商品將自動下架。', '系統' , '" . $DateTime . "',(SELECT `accountID` FROM `sh_mdse` WHERE ID = " . $IDArray[$i] . "));";

                $sql2 .= "UPDATE `sh_mdse` SET `Number` = " . ((int) $row_result5[0] - $NumArray[$i]) . " , `IsShelf` = '否' WHERE `ID` = " . $IDArray[$i] . ";";
            } else {
                $sql2 .= "UPDATE `sh_mdse` SET `Number` = " . ((int) $row_result5[0] - $NumArray[$i]) . " WHERE `ID` = " . $IDArray[$i] . ";";
            }
            $sql2 .= "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '您的商品編號：" . $IDArray[$i] . "，已經被訂購，數量：" . $NumArray[$i] . "，訂單編號：" . $shOrderID . "', '系統' , '" . $DateTime . "'," . $row_result5[1] . ");";
        }
        $sql2 .= "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '您已在購物車訂購商品，訂單編號：" . $shOrderID . "。', '系統' , '" . $DateTime . "'," . $UserID . ");";

        $result2 = mysqli_multi_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
        setcookie("ShoppingCart", "", time() - 60 * 60 * 24 * 365, '/');
// -----------------------------------------------
        echo "0";
    }
}