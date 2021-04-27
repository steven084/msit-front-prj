<?php
set_time_limit(864000); //240hr
$ID  = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$Remark = preg_replace("/[\'\"]+/", '', $_POST['Remark']);

// -----------------------------------------------
$Array      = unserialize($_COOKIE["ShoppingCart"]);
$IDArray    = $Array['ID'];
$NameArray  = $Array['Name'];
$NumArray   = $Array['Number'];
$PriceArray = $Array['Price'];
$RemarkArray = $Array['Remark'];

for ($i = 0; $i < count($IDArray); $i++) {
    if ($IDArray[$i] == $ID) {
        $RemarkArray[$i] = $Remark;
    }
}
$Array = array('ID' => $IDArray, 'Name' => $NameArray, 'Number' => $NumArray, 'Price' => $PriceArray, 'Remark' => $RemarkArray);
setcookie("ShoppingCart", serialize($Array), time() + 60 * 60 * 24 * 365, '/');
echo "0";