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
  header('Location: admin_edit_user.php?id='.$id);
}
else{
///////////////////////////////////////////////////////////////////////////////////////////////////////
//insertion en base
///////////////////////////////////////////////////////////////////////////////////////////////////////
$admin = '';
if(isset($_POST['admin'])){
  $admin = 'admin';
}
$id = $_SESSION['edit_id'];
$today = date("Y-m-d");
$req = $bdd->prepare('UPDATE users SET username = :username, name = :name, surname = :surname, type = :type, email = :email, phone = :phone, adresse = :adresse WHERE id_user = :id');

$req->execute(array(
  'username' => htmlspecialchars($_POST['username']),
  'name' => htmlspecialchars($_POST['name']),
  'surname' => htmlspecialchars($_POST['surname']),
	'type' => htmlspecialchars($admin),
  'email' => htmlspecialchars($_POST['email']),
  'phone' => htmlspecialchars($_POST['phone']),
  'adresse' => htmlspecialchars($_POST['adresse']),
  'id' => $id));
}
header('Location: admin_managment_user.php');
?>
