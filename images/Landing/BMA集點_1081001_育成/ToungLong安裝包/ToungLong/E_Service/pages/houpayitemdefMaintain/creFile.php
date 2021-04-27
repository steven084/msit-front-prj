<?php
set_time_limit(864000); //240hr
$File     = $_FILES['creFile'];
$FileType = "application/vnd.ms-excel";

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
                if ($splText2[0] != "" && $splText2[1] != "" && $splText2[2] != "" && $splText2[3] != "") {
                    echo '第' . ($i) . '筆資料SQL執行。';
                    // -----------------------------------------------
                    $CommunityID     = $_POST['CommunityID'];
                    $DefaultMoney    = $splText2[0];
                    $DefaultDisMoney = $splText2[1];
                    $es_compayitemID = $splText2[2];
                    $es_householdID  = $splText2[3];
                    $Remark          = $splText2[4];

                    $sql      = "SELECT * FROM `es_compayitem` WHERE ID = " . $es_compayitemID . " AND communityID = " . $CommunityID . " ;";
                    $result   = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
                    $rowCount = mysqli_num_rows($result);
                    if ($rowCount > 0) {
                        $sql2 = "SELECT A.* FROM `es_household` AS A
                                    INNER JOIN `es_building` AS B
                                    ON A.buildingID = B.ID
                                    WHERE A.ID = " . $es_householdID . " AND B.communityID = " . $CommunityID . " ;";
                        $result2   = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
                        $rowCount2 = mysqli_num_rows($result2);
                        if ($rowCount2 > 0) {
                            $sql3    = "INSERT INTO `es_houpayitemdefault` (`ID`,`DefaultMoney`,`DefaultDisMoney`,`Remark`,`Maintainer`,`ChangeDay`,`es_compayitemID`,`householdID`) VALUES (NULL,'" . $DefaultMoney . "', '" . $DefaultDisMoney . "', '" . $Remark . "', '" . $Maintainer . "', '" . $DateTime . "'," . $es_compayitemID . "," . $es_householdID . ");";
                            $result3 = mysqli_query($conn, $sql3) or die('MySQL 語法錯誤' . $sql3);

                        } else {
                            echo '第' . ($i) . '筆' . '社區住戶ID不存在。';
                        }
                    } else {
                        echo '第' . ($i) . '筆' . '社區繳費項目ID不存在。';
                    }
                    // -----------------------------------------------
                } else if ($splText2[4] == "END" || $splText2[4] == "end") {
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