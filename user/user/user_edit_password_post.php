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
$redirect = false;
$id = $_SESSION['user_id'];
///////////////////////////////////////////////////////////////////////////////////////////////////////
//variable de redirection si un des champs est faux
///////////////////////////////////////////////////////////////////////////////////////////////////////
$query=$bdd->prepare('SELECT * FROM users WHERE id_user = :id_user');
$query->bindValue(':id_user',$_SESSION['user_id'], PDO::PARAM_STR);
$query->execute();
$data=$query->fetch();
if(sha1($_POST['old_pwd']) != $data['password']){
  $redirect = true;
}
if($redirect){
  header('Location: user_managment_account.php?new_pwd=error');
}
else{
///////////////////////////////////////////////////////////////////////////////////////////////////////
//insertion en base
///////////////////////////////////////////////////////////////////////////////////////////////////////

$req = $bdd->prepare('UPDATE users SET password = :password WHERE id_user = :id');

$req->execute(array(
  'password' => htmlspecialchars(sha1($_POST['con_new_pwd'])),
  'id' => $id));
  header('Location: user_managment_account.php?new_pwd=success');
}
?>
