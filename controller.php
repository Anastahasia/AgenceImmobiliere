<?php 
require_once "connexion.php";
$ville = $_POST['ville'];
$connexion->select("bien", "*", "ville = $ville")
?>