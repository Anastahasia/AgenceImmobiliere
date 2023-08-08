<?php 
require_once "connexion.php";
$bienSelectionne = isset($_GET['id_bien']) ? $_GET['id_bien'] : 0;

$bienAffiche = $connexion->select("bien", "*", "id_bien = $bienSelectionne");
?>