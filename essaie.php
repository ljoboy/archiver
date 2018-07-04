<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
include_once "_app/func.php";
$q = $db->query("SELECT * FROM categorie WHERE id_cat = 4");
$msg = $q->fetch();?>

