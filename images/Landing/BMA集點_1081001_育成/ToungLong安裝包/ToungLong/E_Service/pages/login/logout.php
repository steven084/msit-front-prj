<?php
set_time_limit(864000); //240hr
session_start();
session_unset();
echo '<script type="text/javascript">';
echo 'window.location.href = "login.html";';
echo '</script>';