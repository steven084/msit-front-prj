<?php
set_time_limit(864000); //240hr
$functionName  = preg_replace("/[\'\"]+/", '', $_POST['functionName']);
// -----------------------------------------------
switch ($functionName) {
    case 'tbody':
        $Array      = unserialize($_COOKIE["ShoppingCart"]);
        $IDArray    = $Array['ID'];
        $NameArray  = $Array['Name'];
        $NumArray   = $Array['Number'];
        $PriceArray = $Array['Price'];
        $RemarkArray = $Array['Remark'];
        for ($i = 0; $i < count($IDArray); $i++) {
            echo '
                <tr class="rows">
                    <td>
                        <a data-toggle="modal" href="#delModal' . $IDArray[$i] . '">
                            <i class="fas fa-times fa-stack fa-1x text-danger text-center"></i>
                        </a>
                        <!-- Delete Modal-->
                        <div class="modal fade" id="delModal' . $IDArray[$i] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" onsubmit="return delModalSubmit(' . $IDArray[$i] . ')">
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
                    <td name="tbody' . $IDArray[$i] . '">' . $IDArray[$i] . '</td>
                    <td name="tbody' . $IDArray[$i] . '">' . $NameArray[$i] . '</td>
                    <td>
                        <input type="number" min="0"  name="tbody' . $IDArray[$i] . '" onchange="changeMdseNum(\'tbody' . $IDArray[$i] . '\')" class="form-control" value="' . $NumArray[$i] . '" required>
                    </td>
                    <td name="tbody' . $IDArray[$i] . '">' . $PriceArray[$i] . '</td>
                    <td name="tbody' . $IDArray[$i] . '"><div name="tbodyTotal">' . ((int) $NumArray[$i] * (int) $PriceArray[$i]) . '</div></td>
                    <td>
                        <input type="text" maxlength="1024" name="tbody' . $IDArray[$i] . '"  onchange="changeMdseRemark(\'tbody' . $IDArray[$i] . '\')"  class="form-control" value="' . $RemarkArray[$i] . '" required>
                    </td>
                </tr>
            ';
        }
        break;
    default:
        echo 'unknow';
        break;
}