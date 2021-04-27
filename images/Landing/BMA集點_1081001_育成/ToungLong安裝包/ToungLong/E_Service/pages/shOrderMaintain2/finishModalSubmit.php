<?php
set_time_limit(864000); //240hr
$ID          = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$CommunityID = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
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
    $sql    = "UPDATE `sh_order` SET `orderStatus` = '訂單完成' WHERE ID = " . $ID . ";";
    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
// -----------------------------------------------
    $sql2        = "SELECT es_accountID FROM `sh_order` WHERE ID = " . $ID . ";";
    $result2     = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
    $row_result2 = mysqli_fetch_array($result2);
// -----------------------------------------------
    $sql3    = "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '已完成訂單，訂單編號：" . $ID . "。', '系統' , '" . $DateTime . "'," . $row_result2[0] . ");";
    $result3 = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
// -----------------------------------------------
    $sql5 = "";
    $sql4 = "SELECT A.ID,
                B.sh_mdseID,B.Name,B.Number,B.Price,
                C.HandlingFee,C.accountID
                FROM `sh_order` AS A
                INNER JOIN `sh_orderdetails` AS B
                ON A.ID = B.sh_orderID
                INNER JOIN `sh_mdse` AS C
                ON B.sh_mdseID = C.ID
                WHERE A.ID = " . $ID . ";";
    $result4 = mysqli_query($conn, $sql4) or die('MySQL 語法錯誤' . $sql4);
    while ($row_result4 = mysqli_fetch_array($result4)) {
        $totalPrice  = round((int) $row_result4[3] * (int) $row_result4[4]);
        $HandlingFee = round($totalPrice * (int) $row_result4[5] / 100);
        $totalPoint  = round($totalPrice - $HandlingFee);
        $sql5 .= "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '商品編號：" . $row_result4[1] . "，商品名稱：" . $row_result4[2] . "，已經賣出數量：" . $row_result4[3] . "，單價：" . $row_result4[4] . "，總價：" . $totalPrice . "，手續費：" . $HandlingFee . "，總共獲得收益(Point)：" . $totalPoint . "。訂單編號：" . $row_result4[0] . "', '系統' , '" . $DateTime . "'," . $row_result4[6] . ");";
        $sql5 .= "UPDATE `es_account` AS A
                  INNER JOIN `es_account` AS B
                  ON A.`ID` = B.`ID`
                  SET A.`Point` = (B.`Point`+" . $totalPoint . ")
                  WHERE A.ID = " . $row_result4[6] . ";";
        $sql6    = "SELECT * FROM `sh_salesprofit` WHERE `es_communityID` = " . $CommunityID . ";";
        $result6 = mysqli_query($conn, $sql6) or die('MySQL 語法錯誤' . $sql6);
        while ($row_result6 = mysqli_fetch_array($result6)) {
            $HandlingFeePoint = round($HandlingFee * (int) $row_result6[1] / 100);
            if ($row_result6[2] == '0') {
                $sql5 .= "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '您獲得來自訂單編號：" . $row_result4[0] . "，商品編號：" . $row_result4[1] . "，購物回饋點數(Point)：" . $HandlingFeePoint . "', '系統' , '" . $DateTime . "'," . $row_result2[0] . ");";
                $sql5 .= "UPDATE `es_account` AS A
                          INNER JOIN `es_account` AS B
                          ON A.`ID` = B.`ID`
                          SET A.`Point` = (B.`Point`+" . $HandlingFeePoint . ")
                          WHERE A.ID = " . $row_result2[0] . ";";
            } else {
                $sql5 .= "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '您獲得來自訂單編號：" . $row_result4[0] . "，商品編號：" . $row_result4[1] . "，手續費的利潤收益(Point)：" . $HandlingFeePoint . "', '系統' , '" . $DateTime . "'," . $row_result6[2] . ");";
                $sql5 .= "UPDATE `es_account` AS A
                          INNER JOIN `es_account` AS B
                          ON A.`ID` = B.`ID`
                          SET A.`Point` = (B.`Point`+" . $HandlingFeePoint . ")
                          WHERE A.ID = " . $row_result6[2] . ";";
            }
        }

        // -----------------------------------------------
        $sql5 .= "INSERT INTO `sh_orderstatus` (`ID`, `Status`, `Money`,`HandlingFee`, `Remark` , `Maintainer`, `ChangeDay`, `sh_orderID`) VALUES (NULL, '未入帳', " . $totalPrice . ", " . $HandlingFee . ", '', '" . $Maintainer . "' , '" . $DateTime . "'," . $row_result4[0] . ");";
    }
    $result5 = mysqli_multi_query($conn, $sql5) or die('MySQL 語法錯誤' . $sql5);

    echo "0";
}