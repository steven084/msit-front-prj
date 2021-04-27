<?php
set_time_limit(864000); //240hr
$CommunityID = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
$File        = $_FILES['creFile'];
$ID          = $CommunityID;
date_default_timezone_set('Asia/Taipei');
$DateTime  = date("Y-m-d H:i:s");
$DateTime2 = date("YmdHis");
// --------------------------------------------------------------------------------------
# 上傳檔案參數設定
$FilePath    = "../../img/sh_maincarousel/" . $ID . "/";
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
        $ImgPath       = "img/sh_maincarousel/" . $ID . "/" . $ID . $DateTime2 . ".jpg";
        $FileWritePath = $FilePath . $ID . $DateTime2 . ".jpg";
        $FileTempPath  = $File['tmp_name'];
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
// --------------------------------------------------------------------------------------
    require_once './../connections/Account.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
    mysqli_query($conn, "SET CHARACTER SET UTF8");
    mysqli_select_db($conn, $dbname);
    // -----------------------------------------------
    $sql    = "INSERT INTO `sh_carousel` (`ID`, `ImgPath`, `CommunityID`) VALUES (NULL, '" . $ImgPath . "', " . $CommunityID . ");";
    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);

    echo "0";
// --------------------------------------------------------------------------------------
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