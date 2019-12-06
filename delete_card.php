<?php
session_start();
include ('controller/c_card.php');
$c_card = new C_card();
$delete = $c_card->delete_themuon();




?>