<?php
set_time_limit(864000); //240hr
$mdseID      = $_POST['mdseID'];
$Name        = preg_replace("/[\'\"]+/", '', $_POST['editShMdse'][0]);
$Description = preg_replace("/[\'\"]+/", '', $_POST['editShMdse'][1]);
$Price       = preg_replace("/[\'\"]+/", '', $_POST['editShMdse'][2]);
$Num         = preg_replace("/[\'\"]+/", '', $_POST['editShMdse'][3]);
$HandlingFee = preg_replace("/[\'\"]+/", '', $_POST['editShMdse'][4]);
$Remark      = preg_replace("/[\'\"]+/", '', $_POST['editShMdse'][5]);
$File        = $_FILES['editShMdseFile'];
$File2       = $_FILES['editShMdseFile2'];
$File3       = $_FILES['editShMdseFile3'];
$File4       = $_FILES['editShMdseFile4'];
$File5       = $_FILES['editShMdseFile5'];

date_default_timezone_set('Asia/Taipei');
$DateTime  = date("Y-m-d H:i:s");
$DateTime2 = date("YmdHis");
@session_start();
$Maintainer = $_SESSION['account'];

if ($Maintainer == "" || $Maintainer == null) {

} else {
// -----------------------------------------------
    require_once './../connections/Account.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
    mysqli_query($conn, "SET CHARACTER SET UTF8");
    mysqli_select_db($conn, $dbname);
// -----------------------------------------------
    $sql        = "SELECT * FROM `sh_mdse` WHERE ID = " . $mdseID . ";";
    $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    $row_result = mysqli_fetch_array($result);
    $ID = $row_result[17];
// --------------------------------------------------------------------------------------
    # 上傳檔案參數設定
    $FilePath    = "../../img/sh_mdse/" . $ID . "/";
    $FileMaxSize = 1024; //KB
    $FileType    = "image/jpeg";
    if (!file_exists($FilePath)) {
        mkdir($FilePath);
    }
// check
    $checkFile = true;
// ---------------------------------------------------------------------------------
    $ImgPath       = "";
    $FileWritePath = "";
    $FileTempPath  = "";
    if ($File['tmp_name'] != "") {
        if ($row_result[5] != "") {
            unlink("../../" . $row_result[5]);
        }
        if (checkFile($File, $FileMaxSize, $FileType) == 0) {
            $ImgPath       = "img/sh_mdse/" . $ID . "/" . $ID . $DateTime2 . ".jpg";
            $FileWritePath = $FilePath . $ID . $DateTime2 . ".jpg";
            $FileTempPath  = $File['tmp_name'];
        } else {
            $checkFile = false;
        }
    } else {
        $ImgPath = $row_result[5];
    }
// ---------------------------------------------------------------------------------
    $ImgPath2       = "";
    $FileWritePath2 = "";
    $FileTempPath2  = "";
    if ($File2['tmp_name'] != "") {
        if ($row_result[6] != "") {
            unlink("../../" . $row_result[6]);
        }
        if (checkFile($File2, $FileMaxSize, $FileType) == 0) {
            $ImgPath2       = "img/sh_mdse/" . $ID . "/" . $ID . $DateTime2 . "2.jpg";
            $FileWritePath2 = $FilePath . $ID . $DateTime2 . "2.jpg";
            $FileTempPath2  = $File2['tmp_name'];
        } else {
            $checkFile = false;
        }
    } else {
        $ImgPath2 = $row_result[6];
    }
// ---------------------------------------------------------------------------------
    $ImgPath3       = "";
    $FileWritePath3 = "";
    $FileTempPath3  = "";
    if ($File3['tmp_name'] != "") {
        if ($row_result[7] != "") {
            unlink("../../" . $row_result[7]);
        }
        if (checkFile($File3, $FileMaxSize, $FileType) == 0) {
            $ImgPath3       = "img/sh_mdse/" . $ID . "/" . $ID . $DateTime2 . "3.jpg";
            $FileWritePath3 = $FilePath . $ID . $DateTime2 . "3.jpg";
            $FileTempPath3  = $File3['tmp_name'];
        } else {
            $checkFile = false;
        }
    } else {
        $ImgPath3 = $row_result[7];
    }
// ---------------------------------------------------------------------------------
    $ImgPath4       = "";
    $FileWritePath4 = "";
    $FileTempPath4  = "";
    if ($File4['tmp_name'] != "") {
        if ($row_result[8] != "") {
            unlink("../../" . $row_result[8]);
        }
        if (checkFile($File4, $FileMaxSize, $FileType) == 0) {
            $ImgPath4       = "img/sh_mdse/" . $ID . "/" . $ID . $DateTime2 . "4.jpg";
            $FileWritePath4 = $FilePath . $ID . $DateTime2 . "4.jpg";
            $FileTempPath4  = $File4['tmp_name'];
        } else {
            $checkFile = false;
        }
    } else {
        $ImgPath4 = $row_result[8];
    }
// ---------------------------------------------------------------------------------
    $ImgPath5       = "";
    $FileWritePath5 = "";
    $FileTempPath5  = "";
    if ($File5['tmp_name'] != "") {
        if ($row_result[9] != "") {
            unlink("../../" . $row_result[9]);
        }
        if (checkFile($File5, $FileMaxSize, $FileType) == 0) {
            $ImgPath5       = "img/sh_mdse/" . $ID . "/" . $ID . $DateTime2 . "5.jpg";
            $FileWritePath5 = $FilePath . $ID . $DateTime2 . "5.jpg";
            $FileTempPath5  = $File5['tmp_name'];
        } else {
            $checkFile = false;
        }
    } else {
        $ImgPath5 = $row_result[9];
    }
// ---------------------------------------------------------------------------------
    if ($checkFile) {
        # 將檔案移至指定位置
        if ($FileWritePath != "" && $FileTempPath != "") {
            move_uploaded_file($FileTempPath, $FileWritePath);
        }
        if ($FileWritePath2 != "" && $FileTempPath2 != "") {
            move_uploaded_file($FileTempPath2, $FileWritePath2);
        }
        if ($FileWritePath3 != "" && $FileTempPath3 != "") {
            move_uploaded_file($FileTempPath3, $FileWritePath3);
        }
        if ($FileWritePath4 != "" && $FileTempPath4 != "") {
            move_uploaded_file($FileTempPath4, $FileWritePath4);
        }
        if ($FileWritePath5 != "" && $FileTempPath5 != "") {
            move_uploaded_file($FileTempPath5, $FileWritePath5);
        }
// --------------------------------------------------------------------------------------
        $sql2 = "UPDATE `sh_mdse` SET Name = '" . $Name . "',Description = '" . $Description . "',Price = " . $Price . ",`Number` = " . $Num . ",
                    ImgPath = '" . $ImgPath . "',ImgPath2 = '" . $ImgPath2 . "',ImgPath3 = '" . $ImgPath3 . "',ImgPath4 = '" . $ImgPath4 . "',ImgPath5 = '" . $ImgPath5 . "',
                    HandlingFee = " . $HandlingFee . ", Remark = '" . $Remark . "' ,  Maintainer = '" . $Maintainer . "' ,ChangeDay = '" . $DateTime . "'
                    WHERE ID = " . $mdseID . ";";
        $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
        echo "0";
// --------------------------------------------------------------------------------------
    }
}

function checkFile($File, $FileMaxSize, $FileType)
{
    #檢查檔案種類
    if ($File['type'] == $FileType) {
        #檢查檔案大小是否超過
        if (($File['size'] / 1024) <= $FileMaxSize) {
            # 檢查檔案是否上傳成功
            if ($File['error'] === UPLOAD_ERR_OK) {
                return 0;
            } else {
                echo '錯誤代碼：' . $File['error'];
                return 1;
            }
        } else {
            echo '檔案大小超過!!';
            return 1;
        }
    } else {
        echo '不符合上傳檔案!!' . $File['type'];
        return 1;
    }
}
