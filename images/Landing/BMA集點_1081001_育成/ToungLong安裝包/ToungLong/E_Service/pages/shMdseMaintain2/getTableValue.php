<?php
set_time_limit(864000); //240hr
$CommunityID = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
$sql = "SELECT A.*,B.Name FROM `sh_mdse` A
INNER JOIN `sh_mdseclass` B
ON A.mdseclassID = B.ID
WHERE A.VerifyStatus = '通過' AND B.CommunityID = " . $CommunityID . ";";
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
                <div class="modal fade" id="editModal'.$row_result[0].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form method="post" enctype="multipart/form-data" id="editFormData'.$row_result[0].'" onsubmit="return editModalSubmit('.$row_result[0].');">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">修改商品</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="md-form row">
                                        <div class="col-md-6">
                                            <label for=""><span style="color:red">*</span>商品名稱：</label>
                                            <input type="text" name="editShMdse[]" class="form-control" value="'.$row_result[1].'" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for=""><span style="color:red">*</span>商品描述：</label>
                                            <input type="text" name="editShMdse[]" class="form-control" value="'.$row_result[2].'" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for=""><span style="color:red">*</span>商品價格：</label>
                                            <input type="number" min="0" name="editShMdse[]" class="form-control" value="'.$row_result[3].'" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for=""><span style="color:red">*</span>商品數量：</label>
                                            <input type="number" min="0" name="editShMdse[]" class="form-control" value="'.$row_result[4].'" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for=""><span style="color:red">(檔案大小限制1MB)</span>商品圖片：</label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" name="editShMdseFile" id="inputFile" class="custom-file-input" onchange="$(this).next(\'.custom-file-label\').html($(this).val())" value="'.$row_result[5].'">
                                                    <label class="custom-file-label" for="inputFile">'.$row_result[5].'</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for=""><span style="color:red">(檔案大小限制1MB)</span>商品圖片2：</label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" name="editShMdseFile2" id="inputFile2" class="custom-file-input" onchange="$(this).next(\'.custom-file-label\').html($(this).val())" value="'.$row_result[6].'" >
                                                    <label class="custom-file-label" for="inputFile2">'.$row_result[6].'</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for=""><span style="color:red">(檔案大小限制1MB)</span>商品圖片3：</label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" name="editShMdseFile3" id="inputFile3" class="custom-file-input" onchange="$(this).next(\'.custom-file-label\').html($(this).val())" value="'.$row_result[7].'" >
                                                    <label class="custom-file-label" for="inputFile3">'.$row_result[7].'</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for=""><span style="color:red">(檔案大小限制1MB)</span>商品圖片4：</label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" name="editShMdseFile4" id="inputFile4" class="custom-file-input" onchange="$(this).next(\'.custom-file-label\').html($(this).val())" value="'.$row_result[8].'" >
                                                    <label class="custom-file-label" for="inputFile4">'.$row_result[8].'</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for=""><span style="color:red">(檔案大小限制1MB)</span>商品圖片5：</label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" name="editShMdseFile5" id="inputFile5" class="custom-file-input" onchange="$(this).next(\'.custom-file-label\').html($(this).val())" value="'.$row_result[9].'" >
                                                    <label class="custom-file-label" for="inputFile5">'.$row_result[9].'</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for=""><span style="color:red">*</span>商品手續費百分比(%)</label>
                                            <input type="number" min="0" name="editShMdse[]" class="form-control" value="'.$row_result[10].'" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">備註：</label>
                                            <input type="text" name="editShMdse[]" class="form-control" value="'.$row_result[13].'">
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
            <td>' . $row_result[18] . '</td>
            <td>' . $row_result[1] . '</td>
            <td>' . $row_result[2] . '</td>
            <td>' . $row_result[3] . '</td>
            <td>' . $row_result[4] . '</td>
            <td>
                <img src="' . $row_result[5] . '" width="100" height="100">
            </td>
            <td>
                <img src="' . $row_result[6] . '" width="100" height="100">
            </td>
            <td>
                <img src="' . $row_result[7] . '" width="100" height="100">
            </td>
            <td>
                <img src="' . $row_result[8] . '" width="100" height="100">
            </td>
            <td>
                <img src="' . $row_result[9] . '" width="100" height="100">
            </td>
            <td>' . $row_result[10] . '</td>
            <td>' . $row_result[11] . '</td>
            <td>' . $row_result[12] . '</td>
            <td>' . $row_result[13] . '</td>
            <td>' . $row_result[14] . '</td>
            <td>' . $row_result[15] . '</td>
        </tr>';
}