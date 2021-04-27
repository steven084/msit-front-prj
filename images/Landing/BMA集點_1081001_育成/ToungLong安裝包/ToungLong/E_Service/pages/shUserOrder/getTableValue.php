<?php
set_time_limit(864000); //240hr
$functionName = preg_replace("/[\'\"]+/", '', $_POST['functionName']);
$CommunityID  = preg_replace("/[\'\"]+/", '', $_POST['CommunityID']);
@session_start();
$ID = $_SESSION['ID'];
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
switch ($functionName) {
    case 'tbody':
        $UserPointRate = 0;
        $sql           = "SELECT * FROM `sh_salesprofit` WHERE es_accountID = 0 AND es_communityID = " . $CommunityID;
        $result        = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $row_result    = mysqli_fetch_array($result);
        if ($row_result[1] != "") {
            $UserPointRate = (int) $row_result[1] / 100;
        }
        $sql = "SELECT C.*,E.HouseNum,E.Name,F.Name,G.Name,B.sh_mdseID,B.Name,B.Number,B.Price,A.HandlingFee,B.Remark
                    FROM `sh_mdse` AS A
                    INNER JOIN `sh_orderdetails` AS B
                    ON A.ID = B.sh_mdseID
                    INNER JOIN `sh_order` AS C
                    ON B.sh_orderID = C.ID
                    INNER JOIN `es_account` AS D
                    ON C.es_accountID = D.ID
                    INNER JOIN es_household AS E
                    ON D.householdID = E.ID
                    INNER JOIN es_building AS F
                    ON E.buildingID = F.ID
                    INNER JOIN es_community AS G
                    ON F.communityID = G.ID
                    WHERE G.ID = " . $CommunityID . " AND C.es_accountID =" . $ID;
        $result    = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $First     = true;
        $OrderTemp = "";
        $strTemp1  = "";
        $strTemp2  = "";
        $strTemp3  = "";
        $strTemp4  = "";
        $strTemp5  = "";
        $strTemp6  = "";
        $arrTemp1  = [];
        $arrTemp2  = [];
        $arrTemp3  = [];
        $arrTemp4  = [];
        $arrTemp5  = [];
        $arrTemp6  = [];
        $arrTemp7  = [];
        $arrTemp8  = [];
        while ($row_result = mysqli_fetch_array($result)) {
            if ($First == true) {
                $OrderTemp = $row_result[0];
                $strTemp1  = $row_result[2];
                $strTemp2  = $row_result[3];
                $strTemp3  = $row_result[4];
                $strTemp4  = $row_result[5];
                $strTemp5  = $row_result[6];
                $strTemp6  = $row_result[7];
                array_push($arrTemp1, '商品編號');
                array_push($arrTemp2, '商品名稱');
                array_push($arrTemp3, '數量');
                array_push($arrTemp4, '單價');
                array_push($arrTemp5, '總價');
                array_push($arrTemp7, '點數');
                array_push($arrTemp8, '備註');
                $First = false;
            } else {
                if ($OrderTemp != $row_result[0]) {
                    echo '
                        <tr class="rows">
                    <td>' . $OrderTemp . '</td>
                    <td>' . $strTemp1 . '</td>
                    <td>' . $strTemp2 . '</td>
                    <td>' . $strTemp3 . '</td>
                    <td>' . $strTemp4 . '</td>
                    <td>' . $strTemp5 . '</td>
                    <td>' . $strTemp6 . '</td>
                    <td>
                        <a data-toggle="modal" href="#editModal' . $OrderTemp . '">
                            <i class="fas fa-edit fa-stack fa-1x text-info text-center"></i>
                        </a>
                        <!-- editModal-->
                        <div class="modal fade" id="editModal' . $OrderTemp . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">查看資料</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="md-form row">';
                    // --------------------------------------------------------------
                    for ($i = 0; $i < Count($arrTemp1); $i++) {
                        echo '
                                                <div class="col-md-2">
                                                    <label for="">' . $arrTemp1[$i] . '</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">' . $arrTemp2[$i] . '</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">' . $arrTemp3[$i] . '</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">' . $arrTemp4[$i] . '</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">' . $arrTemp5[$i] . '</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">' . $arrTemp7[$i] . '</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">' . $arrTemp8[$i] . '</label>
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
                    // --------------------------------------------

                    $OrderTemp = $row_result[0];
                    $strTemp1  = $row_result[2];
                    $strTemp2  = $row_result[3];
                    $strTemp3  = $row_result[4];
                    $strTemp4  = $row_result[5];
                    $strTemp5  = $row_result[6];
                    $strTemp6  = $row_result[7];

                    $arrTemp1 = [];
                    $arrTemp2 = [];
                    $arrTemp3 = [];
                    $arrTemp4 = [];
                    $arrTemp5 = [];
                    $arrTemp7 = [];
                    $arrTemp8 = [];
                    array_push($arrTemp1, '商品編號');
                    array_push($arrTemp2, '商品名稱');
                    array_push($arrTemp3, '數量');
                    array_push($arrTemp4, '單價');
                    array_push($arrTemp5, '總價');
                    array_push($arrTemp7, '點數');
                    array_push($arrTemp8, '備註');
                }
            }
            array_push($arrTemp1, $row_result[8]);
            array_push($arrTemp2, $row_result[9]);
            array_push($arrTemp3, $row_result[10]);
            array_push($arrTemp4, $row_result[11]);
            array_push($arrTemp5, (int)(((int) $row_result[10] * (int) $row_result[11])));
            array_push($arrTemp7, (int)(((int) $row_result[10] * (int) $row_result[11]) * (int) $row_result[12] / 100 * $UserPointRate));
            array_push($arrTemp8, $row_result[13]);
        }
        echo '
                        <tr class="rows">
                    <td>' . $OrderTemp . '</td>
                    <td>' . $strTemp1 . '</td>
                    <td>' . $strTemp2 . '</td>
                    <td>' . $strTemp3 . '</td>
                    <td>' . $strTemp4 . '</td>
                    <td>' . $strTemp5 . '</td>
                    <td>' . $strTemp6 . '</td>
                    <td>
                        <a data-toggle="modal" href="#editModal' . $OrderTemp . '">
                            <i class="fas fa-edit fa-stack fa-1x text-info text-center"></i>
                        </a>
                        <!-- editModal-->
                        <div class="modal fade" id="editModal' . $OrderTemp . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">查看資料</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="md-form row">';
        // --------------------------------------------------------------
        for ($i = 0; $i < Count($arrTemp1); $i++) {
            echo '
                                                <div class="col-md-2">
                                                    <label for="">' . $arrTemp1[$i] . '</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">' . $arrTemp2[$i] . '</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">' . $arrTemp3[$i] . '</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">' . $arrTemp4[$i] . '</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">' . $arrTemp5[$i] . '</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">' . $arrTemp7[$i] . '</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">' . $arrTemp8[$i] . '</label>
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
        // --------------------------------------------

        break;
    default:
        echo 'unknow';
        break;
}