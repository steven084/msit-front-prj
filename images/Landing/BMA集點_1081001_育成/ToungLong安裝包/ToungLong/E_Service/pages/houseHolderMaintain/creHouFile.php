<?php
set_time_limit(864000); //240hr
$buildingID = preg_replace("/[\'\"]+/", '', $_POST['buildingID']);
$File       = $_FILES['creHouFile'];
$FileType   = "application/vnd.ms-excel";

// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------

@session_start();
$Maintainer = $_SESSION['account'];
if ($Maintainer == "" || $Maintainer == null) {

} else {
    date_default_timezone_set('Asia/Taipei');
    $DateTime = date("Y-m-d H:i:s");
// -----------------------------------------------
    #檢查檔案種類
    if ($File['type'] == $FileType) {
        # 檢查檔案是否上傳成功
        if ($File['error'] === UPLOAD_ERR_OK) {

            $readFile = fopen($File['tmp_name'], "r");
            $AllText  = "";
            while (!feof($readFile)) {
                $Text = fgets($readFile);
                $Text = iconv($encoding, 'UTF-8', $Text);
                $AllText .= $Text;
            }
            fclose($readFile);
            $splText = preg_split("/(\r\n)/", $AllText);
            for ($i = 1; $i < count($splText); $i++) {
                $splText2 = preg_split("/(\"|,)/", $splText[$i]);
                if ($splText2[0] != "" && $splText2[1] != "" && $splText2[2] != "" && $splText2[7] != "") {
                    echo '第' . ($i) . '筆資料SQL執行。';
                    // -----------------------------------------------
                    $sql    = "INSERT INTO `es_household` (`ID`, `HouseNum`, `Name`, `Gender`, `Birthday`, `IdentityID`, `Phone`, `EMAIL`, `Address`, `ERName`, `ERPhone`, `Remark`, `Maintainer`, `ChangeDay`, `buildingID`) VALUES (NULL , '" . $splText2[0] . "','" . $splText2[1] . "','" . $splText2[2] . "','" . $splText2[3] . "','" . $splText2[4] . "', '" . $splText2[5] . "','" . $splText2[6] . "','" . $splText2[7] . "','" . $splText2[8] . "','" . $splText2[9] . "','" . $splText2[10] . "','" . $Maintainer . "', '" . $DateTime . "', " . $buildingID . ");";
                    $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
                    // -----------------------------------------------
                } else if ($splText2[10] == "END" || $splText2[10] == "end") {
                    break;
                } else {
                    echo '第' . ($i) . '筆必要資料空值或有誤。';
                }
            }

        } else {
            echo '錯誤代碼：' . $File['error'];
        }
    } else {
        echo '不符合上傳檔案!!' . $File['type'];
    }
}