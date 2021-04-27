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
    case 'topbarTitle':
        $sql = "SELECT Name FROM es_community WHERE ID = ".$Value.";";
        $result       = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result   = mysqli_fetch_array($result);
        echo '<img class="d-none d-sm-block" src="img/index/Community/'.$row_result[0].'.jpg" style="max-height:3vw; margin-left:-25px;">';
        echo '<img class="d-block d-sm-none" src="img/index/Community/'.$row_result[0].'.jpg" style="max-height:15vw; margin-left:-25px;">';
        break;
    case 'userAccountName':
        @session_start();
        echo $_SESSION['account'];
        break;
    case 'navItem':
        @session_start();
        $strFunctionID = "where ";
        if ($_SESSION['functionID'] != "") {
            $functionID = preg_split("/(,)/", $_SESSION['functionID']);
            for ($i = 0; $i < count($functionID) - 1; $i++) {
                if ($i == (count($functionID) - 2)) {
                    $strFunctionID .= 'ID = ' . $functionID[$i] . ';';
                } else {
                    $strFunctionID .= 'ID = ' . $functionID[$i] . ' OR ';
                }
            }
        } else {
            $strFunctionID = "where ID = 0";
        }
        // ---------------------------------------------------------------
        $sql      = "SELECT * FROM `es_function` " . $strFunctionID;
        $result   = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $isShMain = false;
        while ($row_result = mysqli_fetch_array($result)) {
            echo '
            <!-- Nav Item  -->
            <li class="nav-item">
                <input type="hidden" value="' . $row_result[2] . '"></input>
                <a class="nav-link" href="#" onclick="pageLoad(\'' . $row_result[2] . '\')">
                    <i class="' . $row_result[3] . '"></i>
                    <span>' . $row_result[1] . '</span>
                </a>
            </li>
        ';
            if ($row_result[2] == 'shMain') {
                $isShMain = true;
            }
        }
        if ($isShMain == false) {
            echo '|dashboard';
        } else {
            echo '|shMain';
        }
        // ---------------------------------------------------------------

        break;
    case 'Title':case 'Title2':
        @session_start();
        $ID         = $_SESSION['ID'];
        $sql        = "SELECT SystemID FROM `es_account` Where ID = " . $ID;
        $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result = mysqli_fetch_array($result);
        // -------------------------------------------------------------------
        $sql2        = "SELECT * FROM `es_system` Where ID = " . $row_result[0];
        $result2     = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
        $row_result2 = mysqli_fetch_array($result2);
        echo $row_result2[1];
        break;
    default:
        echo 'unknow';
        break;
}