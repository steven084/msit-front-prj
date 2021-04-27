<?php
set_time_limit(864000); //240hr
$ID    = preg_replace("/[\'\"]+/", '', $_POST['ID']);
$Name  = preg_replace("/[\'\"]+/", '', $_POST['Name']);
$Price = preg_replace("/[\'\"]+/", '', $_POST['Price']);
// -----------------------------------------------
if ($_COOKIE["ShoppingCart"] != null) {
    $Array      = unserialize($_COOKIE["ShoppingCart"]);
    $IDArray    = $Array['ID'];
    $NameArray  = $Array['Name'];
    $NumArray   = $Array['Number'];
    $PriceArray = $Array['Price'];
    $RemarkArray = $Array['Remark'];

    $isExist = false;
    for ($i = 0; $i < count($IDArray); $i++) {
        if ($IDArray[$i] == $ID) {
            $isExist = true;
        }
    }

    if ($isExist == true) {
        echo "1";
    } else {
        array_push($IDArray, $ID);
        array_push($NameArray, $Name);
        array_push($NumArray, 1);
        array_push($PriceArray, $Price);
        array_push($RemarkArray, '');
        $Array = array('ID' => $IDArray, 'Name' => $NameArray, 'Number' => $NumArray, 'Price' => $PriceArray, 'Remark' => $RemarkArray);
        setcookie("ShoppingCart", serialize($Array), time() + 60 * 60 * 24 * 365, '/');
        echo "0";
    }
} else {
    $IDArray    = array($ID);
    $NameArray  = array($Name);
    $NumArray   = array(1);
    $PriceArray = array($Price);
    $RemarkArray = array('');
    $Array      = array('ID' => $IDArray, 'Name' => $NameArray, 'Number' => $NumArray, 'Price' => $PriceArray, 'Remark' => $RemarkArray);
    setcookie("ShoppingCart", serialize($Array), time() + 60 * 60 * 24 * 365, '/');
    echo "0";
}