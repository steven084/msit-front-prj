<?php
set_time_limit(864000); //240hr
$checkedRowsValue = preg_replace("/[\'\"]+/", '', $_POST['checkedRowsValue']);
$MdseClassID      = preg_replace("/[\'\"]+/", '', $_POST['MdseClassID']);

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
        $DateTime2  = date("YmdHis");
        $sql        = "SELECT * FROM `sh_mdse` WHERE `ID` = " . $checkedRowsValue[$i];
        $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result = mysqli_fetch_array($result);
        $ImgPath    = "";
        $ImgPath2   = "";
        $ImgPath3   = "";
        $ImgPath4   = "";
        $ImgPath5   = "";
        if ($row_result[5] != "") {
            $ImgPath = 'img/sh_mdse/' . $row_result[17] . '/' . $DateTime2 . '.jpg';
            copy('../../' . $row_result[5], '../../' . $ImgPath);
        }
        if ($row_result[6] != "") {
            $ImgPath2 = 'img/sh_mdse/' . $row_result[17] . '/' . $DateTime2 . '2.jpg';
            copy('../../' . $row_result[6], '../../' . $ImgPath2);
        }
        if ($row_result[7] != "") {
            $ImgPath3 = 'img/sh_mdse/' . $row_result[17] . '/' . $DateTime2 . '3.jpg';
            copy('../../' . $row_result[7], '../../' . $ImgPath3);
        }
        if ($row_result[8] != "") {
            $ImgPath4 = 'img/sh_mdse/' . $row_result[17] . '/' . $DateTime2 . '4.jpg';
            copy('../../' . $row_result[8], '../../' . $ImgPath4);
        }
        if ($row_result[9] != "") {
            $ImgPath5 = 'img/sh_mdse/' . $row_result[17] . '/' . $DateTime2 . '5.jpg';
            copy('../../' . $row_result[9], '../../' . $ImgPath5);
        }

        $sql2    = "INSERT INTO `sh_mdse` (`ID`,`Name`,`Description`,`Price`,`Number`,`ImgPath`,`ImgPath2`,`ImgPath3`,`ImgPath4`,`ImgPath5`,`HandlingFee`,`IsShelf`,`VerifyStatus`,`Remark`,`Maintainer`,`ChangeDay`,`mdseclassID`,`accountID`)  VALUES (NULL,'" . $row_result[1] . "','" . $row_result[2] . "'," . $row_result[3] . "," . $row_result[4] . ",'" . $ImgPath . "','" . $ImgPath2 . "','" . $ImgPath3 . "','" . $ImgPath4 . "','" . $ImgPath5 . "'," . $row_result[10] . ",'否','審核中','" . $row_result[13] . "','" . $Maintainer . "','" . $DateTime . "'," . $MdseClassID . "," . $row_result[17] . ")";
        $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
        sleep(1);
    }
// -----------------------------------------------
    echo "0";
}