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
        $sql = "SELECT A.*,C.ItemName FROM `es_houpayitemnum` AS A
        INNER JOIN es_houpayitem AS B
        ON A.es_houpayitemID = B.ID
        INNER JOIN es_compayitem AS C
        ON B.compayitemID = C.ID
        WHERE A.es_communityID = " . $CommunityID . ";";
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        while ($row_result = mysqli_fetch_array($result)) {
            echo '
                <tr class="rows">
                    <td>
                        <a data-toggle="modal" href="#editModal' . $row_result[0] . '">
                            <i class="fas fa-times fa-stack fa-1x text-danger text-center"></i>
                        </a>
                        <!-- editModal-->
                        <div class="modal fade" id="editModal' . $row_result[0] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="post" onsubmit="return editModalSubmit(\'' . $row_result[0] . '\',\'' . $row_result[1] . '\',\'edit' . $row_result[0] . '\',\'' . $row_result[3] . '\')">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">修改資料</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="md-form row">
                                                <div class="col-md-12">
                                                注意!!，註銷後會連同相關流水號一併註銷，並通知使用者。
                                                </div>
                                                <div class="col-md-12">

                                                </div>
                                                <div class="col-md-12">
                                                    <select class="custom-select" name="editSelect' . $row_result[0] . '" onchange="onchangeSelect(\'edit' . $row_result[0] . '\',\'editSelect' . $row_result[0] . '\')" required>
                                                        <option value="選錯繳費項目。" selected>選錯繳費項目。</option>
                                                        <option value="收據列印失敗。" >收據列印失敗。</option>
                                                        <option value="其他:" >其他:</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for=""><span style="color:red">*</span>註銷原因：</label>
                                                    <input type="text" name="edit' . $row_result[0] . '" class="form-control" value="選錯繳費項目。" required>
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
                    <td>' . $row_result[1] . '</td>
                    <td>' . $row_result[8] . '</td>
                    <td>' . $row_result[9] . '</td>
                    <td>' . $row_result[2] . '</td>
                    <td>' . $row_result[3] . '</td>
                    <td>' . $row_result[4] . '</td>
                    <td>' . $row_result[5] . '</td>
                    <td>' . $row_result[6] . '</td>
                </tr>
            ';
        }
        break;
    default:
        echo 'unknow';
        break;
}