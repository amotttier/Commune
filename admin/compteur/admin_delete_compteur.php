<?php
session_start();

include('../../configuration/connect_db.php');
$id = $_GET['id'];

$query=$bdd->query("DELETE FROM compteurs WHERE id_compteur = ".$id);
header('Location: admin_managment_compteur.php');
?>
