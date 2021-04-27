<?php
session_start();
$inputAccount  = $_SESSION['accountTemp'];
$inputPassword = $_SESSION['passwordTemp'];
// -----------------------------------------------
require_once '../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
if ($inputAccount == $inputPassword && !empty($_SESSION['accountTemp'])) {
    $sql = "
SELECT B.Phone,B.EMAIL FROM `es_account` AS A
INNER JOIN `es_household` AS B
ON A.`householdID` = B.`ID`
WHERE A.Account = '" . $inputAccount . "' AND A.`Password` = '" . $inputPassword . "';";
    $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
    $row_result = mysqli_fetch_array($result);
    echo '<div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">
            系統首次登入資料填寫
        </h1>
    </div>
    <form method="post" onsubmit="firstLoginDataSubmit(); return false;">
        <div class="form-group">
            <input autofocus="autofocus" class="form-control form-control-user" name="input" placeholder="請輸入新密碼" required="required" minlength="8" maxlength="50" type="password">
            </input>
        </div>
        <div class="form-group">
            <input autofocus="autofocus" class="form-control form-control-user" name="input" placeholder="請輸入確認新密碼" required="required" minlength="8" maxlength="50" type="password">
            </input>
        </div>
        <div class="form-group">
            <input autofocus="autofocus" class="form-control form-control-user" name="input" placeholder="請輸入連絡電話" required="required" minlength="9" maxlength="10" type="text" pattern="[0-9]+" value="' . $row_result[0] . '">
            </input>
        </div>
        <div class="form-group">
            <input autofocus="autofocus" class="form-control form-control-user" name="input" placeholder="請輸入信箱" required="required" type="text" value="' . $row_result[1] . '">
            </input>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox small" id="alertMessage">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <input class="btn btn-primary btn-user btn-block" name="submit" type="submit" value="確認送出">
                </input>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <a href="./login.html" class="btn btn-primary btn-user btn-block">重新登入</a>
            </div>
        </div>
    </form>
    <br />';
} else {
    echo '<script type="text/javascript">';
    echo 'window.location.href = "login.html";';
    echo '</script>';
}