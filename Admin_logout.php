<?php
// session_start();
include ('controller/c_user.php');
$c_user = new C_user();
$c_user->dangxuatAdmin();
?>