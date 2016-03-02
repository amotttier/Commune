<?php
session_start();
///////////////////////////////////////////////////////////////////////////////////////////////////////
//Connection à la base de données
///////////////////////////////////////////////////////////////////////////////////////////////////////
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

///////////////////////////////////////////////////////////////////////////////////////////////////////
//variable de redirection si un des champs est faux
///////////////////////////////////////////////////////////////////////////////////////////////////////
$redirect = false;
if($redirect){
  header('Location: user_edit_account.php');
}
else{
///////////////////////////////////////////////////////////////////////////////////////////////////////
//insertion en base
///////////////////////////////////////////////////////////////////////////////////////////////////////
$id = $_SESSION['user_id'];
$req = $bdd->prepare('UPDATE users SET name = :name, surname = :surname, email = :email, phone = :phone, adresse = :adresse WHERE id_user = :id');

$req->execute(array(
  'name' => htmlspecialchars($_POST['name']),
  'surname' => htmlspecialchars($_POST['surname']),
  'email' => htmlspecialchars($_POST['email']),
  'phone' => htmlspecialchars($_POST['phone']),
  'adresse' => htmlspecialchars($_POST['adresse']),
  'id' => $id));
}
$query=$bdd->prepare('SELECT *
FROM users WHERE id_user = :id_user');
$query->bindValue(':id_user',$_SESSION['user_id'], PDO::PARAM_STR);
$query->execute();
$data=$query->fetch();
$_SESSION['user_surname'] = $data['surname'];
$_SESSION['user_name'] = $data['name'];
$_SESSION['user_username'] = $data['username'];
$_SESSION['user_id'] = $data['id_user'];
header('Location: user_managment_account.php');
?>
