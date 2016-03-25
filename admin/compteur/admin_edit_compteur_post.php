<?php
session_start();
///////////////////////////////////////////////////////////////////////////////////////////////////////
//Connection à la base de données
///////////////////////////////////////////////////////////////////////////////////////////////////////
include('../../configuration/connect_db.php');

///////////////////////////////////////////////////////////////////////////////////////////////////////
//variable de redirection si un des champs est faux
///////////////////////////////////////////////////////////////////////////////////////////////////////
$redirect = false;
if($redirect){
  header('Location: admin_edit_compteur.php?id='.$id);
}
else{
///////////////////////////////////////////////////////////////////////////////////////////////////////
//insertion en base
///////////////////////////////////////////////////////////////////////////////////////////////////////

$id = $_SESSION['edit_id_compteur'];

$req = $bdd->prepare('UPDATE compteurs SET compteur_number = :compteur_number, id_user_assign = :id_user_assign WHERE id_compteur = :id');

$req->execute(array(
  'compteur_number' => htmlspecialchars($_POST['compteur_number']),
  'id_user_assign' => htmlspecialchars($_POST['name']),
  'id' => $id));
}
header('Location: admin_managment_compteur.php');
?>
