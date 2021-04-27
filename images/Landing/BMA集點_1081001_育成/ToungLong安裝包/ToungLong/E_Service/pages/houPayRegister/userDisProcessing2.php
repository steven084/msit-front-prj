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
        if ($checkedRowsValue[$i] != "") {

            $sql = "SELECT A.Money,A.DiscountMoney,C.Point,C.ID,A.PayPeriodTime,D.ItemName
                FROM es_houpayitem AS A
                INNER JOIN es_household AS B
                ON A.householdID = B.ID
                INNER JOIN es_account AS C
                ON B.ID = C.householdID
                INNER JOIN es_compayitem AS D
                ON A.compayitemID = D.ID
                WHERE A.ID = " . $checkedRowsValue[$i];
            $result   = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
                $row_result = mysqli_fetch_array($result);
                $TotalMoney = (int) $row_result[0] - (int) $row_result[1];
                if ($TotalMoney > 0) {
                    $sql2        = "";
                    $Point       = $row_result[2];
                    $DeductPoint = 0;
                    if (((int) $Point - (int) $TotalMoney) > 0) {
                        $DeductPoint = $TotalMoney;
                    } else {
                        $DeductPoint = $Point;
                    }
                    $sql2 .= "UPDATE `es_account` AS A
                      INNER JOIN `es_account` AS B
                      ON A.`ID` = B.`ID`
                      SET A.`Point` = (B.`Point`-" . $DeductPoint . ")
                      WHERE A.ID = " . $row_result[3] . ";";
                    $sql2 .= "UPDATE `es_houpayitem` AS A
                      INNER JOIN `es_houpayitem` AS B
                      ON A.`ID` = B.`ID`
                      SET A.`DiscountMoney` = (B.`DiscountMoney`+" . $DeductPoint . ")
                      WHERE A.ID = " . $checkedRowsValue[$i] . ";";
                    $sql2 .= "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '您的社區繳款編號ID：" . $checkedRowsValue[$i] . "，繳款時間：" . $row_result[4] . "，繳款項目：" . $row_result[5] . "，已新增折扣金額：" . $DeductPoint . "。', '系統' , '" . $DateTime . "'," . $row_result[3] . ");";
                    $sql2 .= "INSERT INTO `account_news` (`ID`, `News`, `Maintainer`, `ChangeDay`, `es_accountID`) VALUES (NULL, '您的點數(Point)已從系統中扣除：" . $DeductPoint . "。', '系統' ,'" . $DateTime . "'," . $row_result[3] . ");";
                    $result2 = mysqli_multi_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                    // 釋放mysqli_multi_query所包含的所有處理記憶體
                    while (mysqli_next_result($conn)) {
                        if ($result3 = mysqli_store_result($conn)) {
                            mysqli_free_result($result3);
                        }
                    }
                    echo '編號ID:' . $checkedRowsValue[$i] . '，已進行處理。';
                } else {
                    echo '編號ID:' . $checkedRowsValue[$i] . '，折扣金額已滿。';
                }
            } else {
                echo '編號ID:' . $checkedRowsValue[$i] . '，沒有建立使用者帳號。';
            }

        }
    }

}