<?php
session_start();
///////////////////////////////////////////////////////////////////////////////////////////////////////
//Connection à la base de données
///////////////////////////////////////////////////////////////////////////////////////////////////////
include('/configuration/connect_db.php');
///////////////////////////////////////////////////////////////////////////////////////////////////////
//variable de redirection si un des champs est faux
///////////////////////////////////////////////////////////////////////////////////////////////////////
$redirect = false;
///////////////////////////////////////////////////////////////////////////////////////////////////////
//check si le username existe ou est rempli
///////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['username'])){
  if(empty($_POST['username'])){
    $_SESSION['username'] = true;
    $redirect = true;
  }
  else{
    $_SESSION['username'] = false;
  }
}
else{
  $_SESSION['username'] = true;
  $redirect = true;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////
//check si le password existe ou est rempli
///////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['password'])){
  if(empty($_POST['password'])){
    $_SESSION['password'] = true;
    $redirect = true;
  }
  else{
    $_SESSION['password'] = false;
  }
}
else{
  $_SESSION['password'] = true;
  $redirect = true;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
//Redirection sur la page login si il y a des erreurs
///////////////////////////////////////////////////////////////////////////////////////////////////////
if($redirect){
  header('Location: index.php');
}
///////////////////////////////////////////////////////////////////////////////////////////////////////
//Sinon on test s'il a les bons acces
///////////////////////////////////////////////////////////////////////////////////////////////////////
else{
  $query=$bdd->prepare('SELECT *
  FROM users WHERE username = :username');
  $query->bindValue(':username',$_POST['username'], PDO::PARAM_STR);
  $query->execute();
  $data=$query->fetch();
  if($data['password'] == sha1($_POST['password'])){ //Acces ok
    if($data['type'] == 'admin'){
      $_SESSION['isConnected'] = true;
      $_SESSION['surname'] = $data['surname'];
      $_SESSION['name'] = $data['name'];
      header('Location: admin/admin.php');
    }
    else{
      $_SESSION['isConnected'] = true;
      $_SESSION['user_surname'] = $data['surname'];
      $_SESSION['user_name'] = $data['name'];
      $_SESSION['user_username'] = $data['username'];
      $_SESSION['user_id'] = $data['id_user'];
      header('Location: user/user.php');
    }
  }
  else{ // Acces non ok
    $_SESSION['isConnected'] = false;
    header('Location: index.php');
  }
  $query->CloseCursor();
}

?>
