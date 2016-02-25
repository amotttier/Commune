<?php
session_start();

try
{
  $bdd = new PDO(
    'mysql:host=localhost;dbname=db_site;charset=utf8',
    'root',
    '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}
$id = $_GET['id'];

$query=$bdd->query("DELETE FROM compteurs WHERE id_compteur = ".$id);
header('Location: admin_managment_compteur.php');
?>
