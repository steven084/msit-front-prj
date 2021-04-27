<?php
set_time_limit(864000); //240hr
$ID       = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$File     = $_FILES['crePerFile'];
$FileType = "application/vnd.ms-excel";

// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
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
            if ($splText2[0] != "" && $splText2[1] != "" && $splText2[2] != "") {
                // -----------------------------------------------
                $sql3      = "SELECT * FROM `es_account` Where Account = '" . $splText2[0] . "';";
                $result3   = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);
                $rowCount3 = mysqli_num_rows($result3);
                if ($rowCount3 > 0) {
                    echo '第' . ($i) . '筆資料，' . '此使用者名稱已經被使用。';
                } else {
                    $sql4      = "SELECT * FROM `es_household` Where ID = " . $splText2[2] . ";";
                    $result4   = mysqli_query($conn, $sql4) or die('MySQL 語法錯誤' . $sql4);
                    $rowCount4 = mysqli_num_rows($result4);
                    if ($rowCount4 > 0) {
                        $sql        = "SELECT * FROM `es_accountclass` Where ID = " . $ID . ";";
                        $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
                        $row_result = mysqli_fetch_array($result);
                        $functionID = $row_result[2];
                        $SystemID   = $row_result[3];
                        // -----------------------------------------------
                        $sql2    = "INSERT INTO `es_account` (`ID`, `Account`, `Password`, `ClassID`, `functionID` , `SystemID` , `householdID`,`Point`) VALUES (Null, '" . $splText2[0] . "','" . $splText2[1] . "'," . $ID . ", '" . $functionID . "', " . $SystemID . ", " . $splText2[2] . ",0);";
                        $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                        echo '第' . ($i) . '筆資料，' . "建立成功。";
                    } else {
                        echo '第' . ($i) . '筆資料，' . '查無此住戶ID。';
                    }
                }
            } else if ($splText2[7] == "END" || $splText2[7] == "end") {
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