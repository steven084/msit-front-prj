<?php
set_time_limit(864000); //240hr
$functionName = preg_replace("/[\'\"]+/", '', $_POST['functionName']);
$CommunityID  = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
switch ($functionName) {
    case 'tbody':
        $sql = "SELECT A.*,C.HouseNum,C.Name,C.Phone FROM `sh_order` A
                    INNER JOIN es_account AS B
                    ON A.es_accountID = B.ID
                    INNER JOIN es_household AS C
                    ON B.householdID = C.ID
                    INNER JOIN es_building AS D
                    ON C.buildingID = D.ID
                    WHERE D.communityID = " . $CommunityID . " AND A.orderStatus = '訂單到貨'";
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        while ($row_result = mysqli_fetch_array($result)) {
            echo '
                <tr class="rows">
                    <td>
                        <a data-toggle="modal" href="#finishModal' . $row_result[0] . '">
                            <i class="fas fa-check fa-stack fa-1x text-primary text-center"></i>
                        </a>
                        <!-- Finish Modal-->
                        <div class="modal fade" id="finishModal' . $row_result[0] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" onsubmit="return finishModalSubmit(' . $row_result[0] . ')">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">訂單確定完成?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            注意!! 此動作會更新訂單狀態。<br />
                                            如果您已經確定，請選擇"完成"。
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal">取消</button>
                                            <input class="btn btn-primary " type="submit" value="完成">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>' . $row_result[0] . '</td>
                    <td>' . $row_result[4] . '</td>
                    <td>' . $row_result[5] . '</td>
                    <td>' . $row_result[6] . '</td>
                    <td>' . $row_result[2] . '</td>
                    <td>' . $row_result[3] . '</td>
                    <td>
                        <a data-toggle="modal" href="#editModal' . $row_result[0] . '">
                            <i class="fas fa-edit fa-stack fa-1x text-info text-center"></i>
                        </a>
                        <!-- editModal-->
                        <div class="modal fade" id="editModal' . $row_result[0] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">修改資料</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="md-form row">';
            // --------------------------------------------------------------
            $sql2    = "SELECT * FROM `sh_orderdetails` where sh_orderID = " . $row_result[0];
            $result2 = mysqli_query($conn, $sql2) or die('MySQL 語法錯誤' . $sql2);
            echo '
                                                <div class="col-md-2">
                                                    <label for="">商品編號</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">商品名稱</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">數量</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">單價</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">總價</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">備註</label>
                                                </div>
                                                ';

            while ($row_result2 = mysqli_fetch_array($result2)) {
                echo '
                                                <div class="col-md-2">
                                                    <label for="">' . $row_result2[1] . '</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">' . $row_result2[2] . '</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">' . $row_result2[3] . '</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">' . $row_result2[4] . '</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">' . ((int) $row_result2[3] * (int) $row_result2[4]) . '</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">' . $row_result2[6] . '</label>
                                                </div>
                                                ';
            }

            // --------------------------------------------------------------
            echo '   </div>
                                    </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal">取消</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            ';
        }
        break;
    default:
        echo 'unknow';
        break;
}