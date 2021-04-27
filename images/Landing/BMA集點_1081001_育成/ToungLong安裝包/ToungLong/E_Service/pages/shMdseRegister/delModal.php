<?php
set_time_limit(864000); //240hr
$ID = preg_replace("/[\'\"]+/", '', $_POST['ID']);

// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------

$sql3 = "SELECT * FROM `sh_order` AS A
        INNER JOIN `sh_orderdetails` AS B
        ON A.ID = B.sh_orderID
        WHERE A.orderStatus != '訂單完成' AND B.sh_mdseID = " . $ID;
$result3   = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
$rowCount3 = mysqli_num_rows($result3);

if ($rowCount3 > 0) {
    echo "您的商品還有訂單處於未完成狀態，因此無法刪除此商品。";
} else {
    // delete image
    $sql        = "SELECT `ImgPath` FROM `sh_mdse` WHERE ID =" . $ID;
    $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    $row_result = mysqli_fetch_array($result);
    unlink("../../" . $row_result[0]);

    $sql2    = "DELETE FROM `sh_mdse` WHERE ID =" . $ID;
    $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
    echo "0";
}