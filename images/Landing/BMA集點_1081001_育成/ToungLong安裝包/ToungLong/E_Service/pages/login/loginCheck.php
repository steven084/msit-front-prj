<?php
set_time_limit(864000); //240hr
session_start();
if (empty($_SESSION['account']) || empty($_SESSION['password'])) {
    //如果cookie也是空的
    echo '<script type="text/javascript">';
    echo 'window.location.href = "login.html";';
    echo '</script>';
} else {
    $account  = $_SESSION['account']; //取得cookie username資料
    $password = $_SESSION['password']; //取得cookie password資料
    echo '<script type="text/javascript">';
    echo '$.ajax({
              type: "POST",
              url: "pages/login/loginSubmit.php",
              data: { inputAccount: "' . $account . '" ,inputPassword: "' . $password . '" }
            }).done(function(msg) {
              if(msg == "0"){
                // alert("登入成功!!");
                // $("#indexContent").load("pages/start/dashboard.php");
                // LoadNavItemPage();
              }else if(msg == "1"){
                // alert("帳號密碼錯誤!!");
                window.location.href = "login.html";
              }else{
                alert("error：" + msg);
              }
            });   ';
    echo '</script>';
}