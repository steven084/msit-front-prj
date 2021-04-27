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
    case 'tbody2':
        $sql    = "SELECT * FROM `es_building` where communityID = " . $Value;
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        while ($row_result = mysqli_fetch_array($result)) {
            echo '
                <tr class="rows">
                    <td>
                        <a data-toggle="modal" href="#delModal_2_' . $row_result[0] . '">
                            <i class="fas fa-times fa-stack fa-1x text-danger text-center"></i>
                        </a>
                        <!-- Delete Modal-->
                        <div class="modal fade" id="delModal_2_' . $row_result[0] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" onsubmit="return delModalSubmit_2(' . $row_result[0] . ')">
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
                        <a data-toggle="modal" href="#editModal_2_' . $row_result[0] . '">
                            <i class="far fa-edit fa-stack fa-1x text-info text-center"></i>
                        </a>
                        <!-- editModal-->
                        <div class="modal fade" id="editModal_2_' . $row_result[0] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" onsubmit="return editBuildingSubmit(\'' . $row_result[0] . '\',\'edit_2_' . $row_result[0] . '\')">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">修改棟別資料</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="md-form row">
                                                <div class="col-md-12">
                                                    <label for="">棟別名稱：</label>
                                                    <input type="text" name="edit_2_' . $row_result[0] . '" class="form-control" value="' . $row_result[1] . '">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">棟別地址：</label>
                                                    <input type="text" name="edit_2_' . $row_result[0] . '" class="form-control" value="' . $row_result[2] . '">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">備註：</label>
                                                    <input type="text" name="edit_2_' . $row_result[0] . '" class="form-control" value="' . $row_result[3] . '">
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
                    <td>' . $row_result[2] . '</td>
                    <td>' . $row_result[3] . '</td>
                    <td>' . $row_result[4] . '</td>
                    <td>' . $row_result[5] . '</td>
                </tr>
                ';
        }
        break;
    default:
        echo 'unknow';
        break;
}