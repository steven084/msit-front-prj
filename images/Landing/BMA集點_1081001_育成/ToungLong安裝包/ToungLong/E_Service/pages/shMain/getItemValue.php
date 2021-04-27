<?php
set_time_limit(864000); //240hr
$functionName = preg_replace("/[\'\"]+/", '', $_POST['functionName']);
$Value        = preg_replace("/[\'\"]+/", '', $_POST['Value']);
$Limit        = preg_replace("/[\'\"]+/", '', $_POST['Limit']);
// -----------------------------------------------
require_once './../connections/Account.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('無法開啟Mysql資料庫連結');
mysqli_query($conn, "SET CHARACTER SET UTF8");
mysqli_select_db($conn, $dbname);
// -----------------------------------------------
switch ($functionName) {
    case 'shCarousel':
        $sql      = "SELECT * FROM `sh_carousel` WHERE communityID = " . $Value;
        $result   = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $rowCount = mysqli_num_rows($result);

        echo '
<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
    <ol class="carousel-indicators">
    ';
        for ($i = 0; $i < $rowCount; $i++) {
            if ($i == 0) {
                echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '" class="active"></li>';
            } else {
                echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"></li>';
            }
        }

        echo '
        </ol>
        <div class="carousel-inner" role="listbox">';
        $isFirst = true;
        while ($row_result = mysqli_fetch_array($result)) {
            if ($isFirst == true) {
                $isFirst = false;
                echo '
            <div class="carousel-item active">
                <img class="rounded mx-auto img-fluid img-thumbnail d-none d-sm-block" src="' . $row_result[1] . '" alt="Third slide" style="max-width:100%;height:25vw;">
                <img class="rounded mx-auto img-fluid img-thumbnail d-block d-sm-none" src="' . $row_result[1] . '" alt="Third slide" style="max-width:100%;height:40vw;">
            </div>
            ';
            } else {
                echo '
            <div class="carousel-item ">
                <img class="rounded mx-auto img-fluid img-thumbnail d-none d-sm-block" src="' . $row_result[1] . '" alt="Third slide" style="max-width:100%;height:25vw;">
                <img class="rounded mx-auto img-fluid img-thumbnail d-block d-sm-none" src="' . $row_result[1] . '" alt="Third slide" style="max-width:100%;height:40vw;">
            </div>
            ';
            }
        }
        echo '</div>
    </div>';
        break;
    case 'shMainNav':
        $sql    = "SELECT * FROM `sh_mdseclass` WHERE communityID = " . $Value;
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        while ($row_result = mysqli_fetch_array($result)) {
            $Tag = preg_split("/(,)/", $row_result[1]);
            if(Count($Tag) > 1){
                echo '<li class="nav-item col-md-4 col-sm-4 col-4">
                            <input type="hidden" value="' . $row_result[0] . '"></input>
                            <a class="nav-link" href="#" onclick="getItemValue3(\'shMainBodyTag\',\'CommunitySelect\' ,\'' . $row_result[0] . '\',0)">
                                <!-- <i class="fas fa-tag"></i> -->
                                <img src="img/mdseclass_img/'.$Tag[1].'">
                                <span> ' . $Tag[0] . '</span>
                            </a>
                        </li>';
            }else{
                echo '<li class="nav-item col-md-4 col-sm-4 col-4">
                        <input type="hidden" value="' . $row_result[0] . '"></input>
                        <a class="nav-link" href="#" onclick="getItemValue3(\'shMainBodyTag\',\'CommunitySelect\' ,\'' . $row_result[0] . '\',0)">
                            <i class="fas fa-tag"></i>
                            <span> ' . $row_result[1] . '</span>
                        </a>
                    </li>';
            }
        }
        break;
    case 'shMainBody':
        $pointProfitRate = 0;
        $sql             = "SELECT profitRate FROM `sh_salesprofit` WHERE es_communityID = " . $Value . " AND es_accountID = 0;";
        $result          = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $rowCount        = mysqli_num_rows($result);
        if ($rowCount > 0) {
            $row_result      = mysqli_fetch_array($result);
            $pointProfitRate = $row_result[0];
        }
        $sql = "SELECT A.* FROM `sh_mdse` A
                    INNER JOIN `sh_mdseclass` B
                    ON A.`mdseclassID` = B.ID
                    WHERE B.communityID = " . $Value . " AND A.IsShelf = '是' ORDER BY A.HandlingFee DESC Limit " . $Limit . ",9;";
        $result = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        while ($row_result = mysqli_fetch_array($result)) {
            echo '<div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-4">
                    <div class="card h-100">
                        <a href="#" data-toggle="modal" data-target="#viewModal' . $row_result[0] . '">
                            <!-- <img class="card-img-top rounded mx-auto d-block" style="height:400px ;" src="' . $row_result[5] . '" alt="">-->

                            <img class="rounded mx-auto mx-auto d-none d-sm-block" src="' . $row_result[5] . '" alt="Third slide" style="max-width:100%;height:25vw;">
                            <img class="rounded mx-auto mx-auto d-block d-sm-none" src="' . $row_result[5] . '" alt="Third slide" style="max-width:100%;height:40vw;">
                        </a>
                        <div class="d-none d-sm-block">
                            <div class="card-body row">
                                <h4 class="card-title text-primary col-md-12">
                                    ' . $row_result[1] . '
                                </h4>
                                <h6 class="col-md-6">NT$.' . $row_result[3] . '</h6>
                                <h6 class="col-md-6 text-danger">回饋點數：<b>' . (int) ((float) $row_result[3] * (float) ((float) $row_result[10] / 100) * (float) ($pointProfitRate / 100)) . '</b></h6>
                                <h6 class="col-md-12">當前庫存：' . $row_result[4] . '</h6>
                                <h6 class="card-text col-md-12">' . substr($row_result[2], 0, 100) . '</h6>
                            </div>
                        </div>
                        <div class="d-block d-sm-none">
                            <div class="card-body row" style="padding-top:0.5rem;padding-bottom:0.5rem;">
                                <h5 class="card-title text-primary col-12">
                                    ' . $row_result[1] . '
                                </h5>
                                <h6 class="col-md-6">NT$.' . $row_result[3] . '</h6>
                                <h6 class="col-md-6 text-danger">回饋點數：<b>' . (int) ((float) $row_result[3] * (float) ((float) $row_result[10] / 100) * (float) ($pointProfitRate / 100)) . '</b></h6>
                                <!-- <h6 class="col-md-12">當前庫存：' . $row_result[4] . '</h6>-->
                                <!-- <h6 class="card-text col-md-12">' . substr($row_result[2], 0, 100) . '</h6>-->
                            </div>
                        </div>
                        <div class="d-none d-sm-block">
                            <div class="card-footer bg-white">
                                <!-- <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small> -->
                                <div class="row">
                                    <input class="btn btn-primary btn-block col-md-12" type="button" value="加入購物車" onclick="shoppingCart(' . $row_result[0] . ',\'' . $row_result[1] . '\',' . $row_result[3] . ')" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="d-block d-sm-none">
                            <div class="card-footer bg-white">
                                <!-- <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small> -->
                                <div class="row">
                                    <input class="btn btn-primary btn-block col-md-12" style="font-size:10px;" type="button" value="加入購物車" onclick="shoppingCart(' . $row_result[0] . ',\'' . $row_result[1] . '\',' . $row_result[3] . ')" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- viewModal-->
                <div class="modal fade" id="viewModal' . $row_result[0] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form method="post" onsubmit="return shoppingCart(' . $row_result[0] . ',\'' . $row_result[1] . '\',' . $row_result[3] . ')">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">商品資訊</h3>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="md-form row">
                                        <div class="col-md-12">
                                            <h4 for="">' . $row_result[1] . '</h4>
                                        </div>
                                        <div class="col-md-12">
                                            <h5 for="">' . $row_result[2] . '</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 for="">價格：NT$.' . $row_result[3] . '</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 for="" class="text-danger">回饋點數：<b>' . (int) ((float) $row_result[3] * (float) ((float) $row_result[10] / 100) * (float) ($pointProfitRate / 100)) . '</b></h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 for="">當前庫存：' . $row_result[4] . '</h6>
                                        </div>';
            if ($row_result[5] != "") {
                echo '
                                            <div class="col-md-12 d-flex justify-content-center d-none d-sm-block">
                                                <img class="mx-auto d-none d-sm-block" src="' . $row_result[5] . '" style="max-width:100%;height:30vw;">
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-center d-block d-sm-none">
                                                <img class="mx-auto d-block d-sm-none" src="' . $row_result[5] . '" style="max-width:100%;height:60vw;">
                                            </div>';
            }
            if ($row_result[6] != "") {
                echo '
                                            <div class="col-md-12 d-flex justify-content-center d-none d-sm-block">
                                                <img class="mx-auto d-none d-sm-block" src="' . $row_result[6] . '" style="max-width:100%;height:30vw;">
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-center d-block d-sm-none">
                                                <img class="mx-auto d-block d-sm-none" src="' . $row_result[6] . '" style="max-width:100%;height:60vw;">
                                            </div>';
            }
            if ($row_result[7] != "") {
                echo '
                                            <div class="col-md-12 d-flex justify-content-center d-none d-sm-block">
                                                <img class="mx-auto d-none d-sm-block" src="' . $row_result[7] . '" style="max-width:100%;height:30vw;">
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-center d-block d-sm-none">
                                                <img class="mx-auto d-block d-sm-none" src="' . $row_result[7] . '" style="max-width:100%;height:60vw;">
                                            </div>';
            }
            if ($row_result[8] != "") {
                echo '
                                            <div class="col-md-12 d-flex justify-content-center d-none d-sm-block">
                                                <img class="mx-auto d-none d-sm-block" src="' . $row_result[8] . '" style="max-width:100%;height:30vw;">
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-center d-block d-sm-none">
                                                <img class="mx-auto d-block d-sm-none" src="' . $row_result[8] . '" style="max-width:100%;height:60vw;">
                                            </div>';
            }
            if ($row_result[9] != "") {
                echo '
                                            <div class="col-md-12 d-flex justify-content-center d-none d-sm-block">
                                                <img class="mx-auto d-none d-sm-block" src="' . $row_result[9] . '" style="max-width:100%;height:30vw;">
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-center d-block d-sm-none">
                                                <img class="mx-auto d-block d-sm-none" src="' . $row_result[9] . '" style="max-width:100%;height:60vw;">
                                            </div>';
            }
            echo '   </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-dismiss="modal">取消</button>
                                    <input class="btn btn-primary " type="submit" value="加入購物車">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>';
        }
        break;
    case 'shMainFoot':
        $sql = "SELECT A.* FROM `sh_mdse` A
                    INNER JOIN `sh_mdseclass` B
                    ON A.`mdseclassID` = B.ID
                    WHERE B.communityID = " . $Value . " AND A.IsShelf = '是';";
        $result     = mysqli_query($conn, $sql) or die('MySQL 語法錯誤' . $sql);
        $rowCount   = mysqli_num_rows($result);
        $totalCount = ceil($rowCount / 9);
        echo $totalCount;
        break;
    default:
        echo 'unknow';
        break;
}
