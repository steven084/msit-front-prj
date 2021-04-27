<?php
set_time_limit(864000); //240hr
$CommunityID      = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
$BuildingID       = preg_replace("/[\'\"]+/", '', $_POST['BuildingID']);
$StratTime        = preg_replace("/[\'\"]+/", '', $_POST['StratTime']);
$EndTime          = preg_replace("/[\'\"]+/", '', $_POST['EndTime']);
$totalPayPeriod   = (int) preg_replace("/[\'\"]+/", '', $_POST['totalPayPeriod']);
$PayPeriod        = (int) preg_replace("/[\'\"]+/", '', $_POST['PayPeriod']);
$StartTimeSpl     = preg_split("/(-)/", $StratTime);
$EndTimeSpl       = preg_split("/(-)/", $EndTime);
$PayTimeYearTemp  = (int) $StartTimeSpl[0];
$PayTimeMonthTemp = (int) $StartTimeSpl[1];

$tfootTotalNum  = 0;
$tfootTotalNum2 = 0;
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
$strPayTimeTemp = "";
// for-> 計算總共有幾回合
for ($i = 0; $i < $totalPayPeriod; $i++) {
    // for-> 計算每回合有幾個期間
    for ($j = 0; $j < $PayPeriod; $j++) {
        if ($i == $totalPayPeriod - 1 && $j == $PayPeriod - 1) {
            $strPayTimeTemp .= "A.`PayPeriodTime` = '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "'";
        } else {
            $strPayTimeTemp .= "A.`PayPeriodTime` = '" . $PayTimeYearTemp . "-" . $PayTimeMonthTemp . "' OR ";
        }
        if ($PayTimeMonthTemp == 12) {
            $PayTimeMonthTemp = 1;
            $PayTimeYearTemp += 1;
        } else {
            $PayTimeMonthTemp += 1;
        }
    }
}

// $sql    = "SELECT A.*,B.ItemName,B.ItemCode,C.HouseNum,C.Name FROM `es_houpayitem` A, es_compayitem B,es_household C WHERE (" . $strPayTimeTemp . ") AND A.`buildingID` = " . $BuildingID . " AND B.communityID = " . $CommunityID . " AND C.buildingID = " . $BuildingID . "; ";
$sql = "SELECT A.*, B.ItemName,B.ItemCode,C.HouseNum,C.Name
FROM es_houpayitem A
INNER JOIN es_compayitem B
ON A.`compayitemID`=B.ID
INNER JOIN es_household C
ON A.householdID = C.ID AND A.buildingID = C.buildingID
WHERE (" . $strPayTimeTemp . ") AND A.buildingID = " . $BuildingID . ";";

$result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
while ($row_result = mysqli_fetch_array($result)) {
    echo '<tr class="rows">
            <td>
                <a data-toggle="modal" href="#delModal' . $row_result[0] . '">
                    <i class="fas fa-times fa-stack fa-1x text-danger text-center"></i>
                </a>
                <!-- Delete Modal-->
                <div class="modal fade" id="delModal' . $row_result[0] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="post" onsubmit="return delModalSubmit(' . $row_result[0] . ')">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">確定要刪除?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    注意!! 此動作會刪除與此資料相關的所有資料。<br />
                                    如果您已經確定，請選擇"刪除"。
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-dismiss="modal">取消</button>
                                    <input class="btn btn-danger " type="submit" value="刪除">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <a data-toggle="modal" href="#editModal' . $row_result[0] . '">
                    <i class="fas fa-edit fa-stack fa-1x text-info text-center"></i>
                </a>
                <!-- editModal-->
                <div class="modal fade" id="editModal' . $row_result[0] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form method="post" onsubmit="return editModalSubmit(\'' . $row_result[0] . '\',\'edit' . $row_result[0] . '\')">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">修改資料</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="md-form row">
                                        <div class="col-md-6">
                                            <label for=""><span style="color:red">*</span>金額：</label>
                                            <input type="number" min="0" name="edit' . $row_result[0] . '" class="form-control" value="' . $row_result[2] . '" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for=""><span style="color:red">*</span>折扣金額：</label>
                                            <input type="number" min="0" name="edit' . $row_result[0] . '" class="form-control" value="' . $row_result[3] . '" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">備註：</label>
                                            <input type="text" name="edit' . $row_result[0] . '" class="form-control" value="' . $row_result[4] . '">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-dismiss="modal">取消</button>
                                    <input class="btn btn-primary " type="submit" value="修改">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
            <td>' . $row_result[0] . '</td>
            <td>' . $row_result[12] . '</td>
            <td>' . $row_result[13] . '</td>
            <td>' . $row_result[1] . '</td>
            <td>' . $row_result[2] . '</td>
            <td>' . $row_result[3] . '</td>
            <td>' . $row_result[10] . '</td>
            <td>' . $row_result[11] . '</td>
            <td>' . $row_result[4] . '</td>
            <td>' . $row_result[5] . '</td>
            <td>' . $row_result[6] . '</td>
        </tr>';
    $tfootTotalNum  = $tfootTotalNum + (int) $row_result[2];
    $tfootTotalNum2 = $tfootTotalNum2 + (int) $row_result[3];
}
echo '$' . $tfootTotalNum . ',' . $tfootTotalNum2;