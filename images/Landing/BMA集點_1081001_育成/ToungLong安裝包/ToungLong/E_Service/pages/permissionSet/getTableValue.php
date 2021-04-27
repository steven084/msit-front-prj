<?php
set_time_limit(864000); //240hr
$functionName = preg_replace("/[\'\"]+/", '', $_POST['functionName']);
$Value        = preg_replace("/[\'\"]+/", '', $_POST['Value']);
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
switch ($functionName) {
    case 'tbody':
        $sql          = "SELECT * FROM `es_account` where ID = " . $Value;
        $result       = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result   = mysqli_fetch_array($result);
        $result_value = preg_split("/(,)/", $row_result[4]);
        echo $row_result[4] . '|';
        // --------------------------------------------------------------
        $sql2    = "SELECT * FROM `es_function`";
        $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
        while ($row_result2 = mysqli_fetch_array($result2)) {
            $chkIsUse = false;
            for ($i = 0; $i < count($result_value) - 1; $i++) {
                if ($result_value[$i] == $row_result2[0]) {
                    $chkIsUse = true;
                }
            }
            if ($chkIsUse == true) {
                echo '
                <tr class="rows table-tr">
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" onclick="checkedChange(this);" value="' . $row_result2[0] . '" checked>
                            <label class="custom-control-label" >' . $row_result2[0] . '</label>
                        </div>
                    </td>
                    <td>' . $row_result2[1] . '</td>
                </tr>
                ';
            } else {
                echo '
                <tr class="rows">
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" onclick="checkedChange(this);" value="' . $row_result2[0] . '" >
                            <label class="custom-control-label" >' . $row_result2[0] . '</label>
                        </div>
                    </td>
                    <td>' . $row_result2[1] . '</td>
                </tr>
                ';
            }
        }
        break;
    case 'tbody2':
        $sql          = "SELECT * FROM `es_accountclass` where ID = " . $Value;
        $result       = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result   = mysqli_fetch_array($result);
        $result_value = preg_split("/(,)/", $row_result[2]);
        echo $row_result[2] . '|';
        // --------------------------------------------------------------
        $sql2    = "SELECT * FROM `es_function`";
        $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
        while ($row_result2 = mysqli_fetch_array($result2)) {
            $chkIsUse = false;
            for ($i = 0; $i < count($result_value) - 1; $i++) {
                if ($result_value[$i] == $row_result2[0]) {
                    $chkIsUse = true;
                }
            }
            if ($chkIsUse == true) {
                echo '
                <tr class="rows table-tr">
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" onclick="checkedChange2(this);" value="' . $row_result2[0] . '" checked>
                            <label class="custom-control-label" >' . $row_result2[0] . '</label>
                        </div>
                    </td>
                    <td>' . $row_result2[1] . '</td>
                </tr>
                ';
            } else {
                echo '
                <tr class="rows">
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" onclick="checkedChange2(this);" value="' . $row_result2[0] . '" >
                            <label class="custom-control-label" >' . $row_result2[0] . '</label>
                        </div>
                    </td>
                    <td>' . $row_result2[1] . '</td>
                </tr>
                ';
            }
        }
        break;
    default:
        echo 'unknow';
        break;
}