<?php
set_time_limit(864000); //240hr
$CommunityID  = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
$functionName = preg_replace("/[\'\"]+/", '', $_POST['functionName']);
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
switch ($functionName) {
    case 'cardBody':
        $sql        = "SELECT * FROM `es_communityparm` WHERE es_communityID = " . $CommunityID;
        $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result = mysqli_fetch_array($result);
        echo '
        <div class="form-group">
            <div class="form-label-group row">
                <div class="col-md-12">
                    <label for="">列印繳費單抬頭：</label>
                    <input type="text" name="comParmSet" class="form-control" value="' . $row_result[1] . '">
                </div>
                <div class="col-md-12">
                    <hr />
                </div>
                <div class="col-md-12">
                    <input type="button" class="btn btn-primary btn-block" value="修改送出" onclick="cardBodySubmit(\'comParmSet\')">
                </div>
            </div>
        </div>
        ';
        break;
    default:
        echo 'unknow';
        break;
}