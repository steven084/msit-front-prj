<?php
set_time_limit(864000); //240hr
$functionName  = preg_replace("/[\'\"]+/", '', $_POST['functionName']);
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------

@session_start();
$Maintainer = $_SESSION['account'];
$UserID     = $_SESSION['ID'];
if ($Maintainer == "" || $Maintainer == null) {
} else {
    switch ($functionName) {
        case 'cardbody':
            $sql = "SELECT A.Account,A.Point,
                        B.HouseNum,B.Name,B.Phone,B.EMAIL,
                        C.Name,D.Name,D.NameCode FROM `es_account` AS A
                        INNER JOIN `es_household` AS B
                        ON A.`householdID` = B.ID
                        INNER JOIN `es_building` AS C
                        ON B.`buildingID` = C.ID
                        INNER JOIN `es_community` AS D
                        ON C.`communityID` = D.ID
                        WHERE A.ID = " . $UserID;
            $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
            while ($row_result = mysqli_fetch_array($result)) {
                echo '
                    <div class="form-group">
                        <div class="form-label-group row">
                            <div class="col-md-2">
                                <h5>
                                    <label class="font-weight-bold text-primary">
                                        使用者名稱：
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <h5>
                                    <label class="font-weight-bold text-dark">
                                        ' . $row_result[0] . '
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-2">
                                <h5>
                                    <label class="font-weight-bold text-primary">
                                        目前點數(Point)：
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <h5>
                                    <label class="font-weight-bold text-dark">
                                        ' . $row_result[1] . '
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-12">
                                <p></p>
                            </div>
                            <div class="col-md-2">
                                <h5>
                                    <label class="font-weight-bold text-primary">
                                        戶號：
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <h5>
                                    <label class="font-weight-bold text-dark">
                                        ' . $row_result[2] . '
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-2">
                                <h5>
                                    <label class="font-weight-bold text-primary">
                                        姓名：
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <h5>
                                    <label class="font-weight-bold text-dark">
                                        ' . $row_result[3] . '
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-12">
                                <p></p>
                            </div>
                            <div class="col-md-2">
                                <h5>
                                    <label class="font-weight-bold text-primary">
                                        聯絡電話：
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <h5>
                                    <label class="font-weight-bold text-dark">
                                        ' . $row_result[4] . '
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-2">
                                <h5>
                                    <label class="font-weight-bold text-primary">
                                        EMAIL：
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <h5>
                                    <label class="font-weight-bold text-dark">
                                        ' . $row_result[5] . '
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-12">
                                <p></p>
                            </div>
                            <div class="col-md-2">
                                <h5>
                                    <label class="font-weight-bold text-primary">
                                        社區名稱：
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <h5>
                                    <label class="font-weight-bold text-dark">
                                        ' . $row_result[7] . '
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-2">
                                <h5>
                                    <label class="font-weight-bold text-primary">
                                        社區代號：
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <h5>
                                    <label class="font-weight-bold text-dark">
                                        ' . $row_result[8] . '
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-12">
                                <p></p>
                            </div>
                            <div class="col-md-2">
                                <h5>
                                    <label class="font-weight-bold text-primary">
                                        棟別名稱：
                                    </label>
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <h5>
                                    <label class="font-weight-bold text-dark">
                                        ' . $row_result[6] . '
                                    </label>
                                </h5>
                            </div>
                        </div>
                    </div>
                ';
            }
            break;
        default:
            echo 'unknow';
            break;
    }
}