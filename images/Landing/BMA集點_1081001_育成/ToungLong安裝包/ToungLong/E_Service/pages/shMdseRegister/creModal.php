<?php
set_time_limit(864000); //240hr
$Name        = preg_replace("/[\'\"]+/", '', $_POST['creShMdse'][0]);
$Description = preg_replace("/[\'\"]+/", '', $_POST['creShMdse'][1]);
$Price       = preg_replace("/[\'\"]+/", '', $_POST['creShMdse'][2]);
$Num         = preg_replace("/[\'\"]+/", '', $_POST['creShMdse'][3]);
$HandlingFee = preg_replace("/[\'\"]+/", '', $_POST['creShMdse'][4]);
$Remark      = preg_replace("/[\'\"]+/", '', $_POST['creShMdse'][5]);
$mdseclassID = preg_replace("/[\'\"]+/", '', $_POST['creShMdseSelect']);
$File        = $_FILES['creShMdseFile'];
$File2       = $_FILES['creShMdseFile2'];
$File3       = $_FILES['creShMdseFile3'];
$File4       = $_FILES['creShMdseFile4'];
$File5       = $_FILES['creShMdseFile5'];

date_default_timezone_set('Asia/Taipei');
$DateTime  = date("Y-m-d H:i:s");
$DateTime2 = date("YmdHis");
@session_start();
$Maintainer = $_SESSION['account'];
$ID         = $_SESSION['ID'];

if ($Maintainer == "" || $Maintainer == null) {

} else {
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
        if (checkFile($File, $FileMaxSize, $FileType) == 0) {
            $ImgPath       = "img/sh_mdse/" . $ID . "/" . $ID . $DateTime2 . ".jpg";
            $FileWritePath = $FilePath . $ID . $DateTime2 . ".jpg";
            $FileTempPath  = $File['tmp_name'];
        } else {
            $checkFile = false;
        }
    }
// ---------------------------------------------------------------------------------
    $ImgPath2       = "";
    $FileWritePath2 = "";
    $FileTempPath2  = "";
    if ($File2['tmp_name'] != "") {
        if (checkFile($File2, $FileMaxSize, $FileType) == 0) {
            $ImgPath2       = "img/sh_mdse/" . $ID . "/" . $ID . $DateTime2 . "2.jpg";
            $FileWritePath2 = $FilePath . $ID . $DateTime2 . "2.jpg";
            $FileTempPath2  = $File2['tmp_name'];
        } else {
            $checkFile = false;
        }
    }
// ---------------------------------------------------------------------------------
    $ImgPath3       = "";
    $FileWritePath3 = "";
    $FileTempPath3  = "";
    if ($File3['tmp_name'] != "") {
        if (checkFile($File3, $FileMaxSize, $FileType) == 0) {
            $ImgPath3       = "img/sh_mdse/" . $ID . "/" . $ID . $DateTime2 . "3.jpg";
            $FileWritePath3 = $FilePath . $ID . $DateTime2 . "3.jpg";
            $FileTempPath3  = $File3['tmp_name'];
        } else {
            $checkFile = false;
        }
    }
// ---------------------------------------------------------------------------------
    $ImgPath4       = "";
    $FileWritePath4 = "";
    $FileTempPath4  = "";
    if ($File4['tmp_name'] != "") {
        if (checkFile($File4, $FileMaxSize, $FileType) == 0) {
            $ImgPath4       = "img/sh_mdse/" . $ID . "/" . $ID . $DateTime2 . "4.jpg";
            $FileWritePath4 = $FilePath . $ID . $DateTime2 . "4.jpg";
            $FileTempPath4  = $File4['tmp_name'];
        } else {
            $checkFile = false;
        }
    }
// ---------------------------------------------------------------------------------
    $ImgPath5       = "";
    $FileWritePath5 = "";
    $FileTempPath5  = "";
    if ($File5['tmp_name'] != "") {
        if (checkFile($File5, $FileMaxSize, $FileType) == 0) {
            $ImgPath5       = "img/sh_mdse/" . $ID . "/" . $ID . $DateTime2 . "5.jpg";
            $FileWritePath5 = $FilePath . $ID . $DateTime2 . "5.jpg";
            $FileTempPath5  = $File5['tmp_name'];
        } else {
            $checkFile = false;
        }
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
        require_once './../connections/Account.php';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
        mysqli_query($conn, "SET CHARACTER SET UTF8");
        mysqli_select_db($conn, $dbname);
        // -----------------------------------------------
        $sql    = "INSERT INTO `sh_mdse` (`ID`, `Name`, `Description`, `Price`, `Number`, `ImgPath`, `ImgPath2`, `ImgPath3`, `ImgPath4`, `ImgPath5`, `HandlingFee`, `IsShelf`, `VerifyStatus`, `Remark`, `Maintainer`, `ChangeDay`, `mdseclassID`, `accountID`) VALUES (NULL, '" . $Name . "', '" . $Description . "', " . $Price . ", " . $Num . ", '" . $ImgPath . "', '" . $ImgPath2 . "', '" . $ImgPath3 . "', '" . $ImgPath4 . "', '" . $ImgPath5 . "', '" . $HandlingFee . "','否','審核中', '" . $Remark . "', '" . $Maintainer . "', '" . $DateTime . "'," . $mdseclassID . ", '" . $ID . "');";
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);

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