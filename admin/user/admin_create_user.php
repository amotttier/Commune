<?php
session_start();
///////////////////////////////////////////////////////////////////////////////////////////////////////
//Retour à la page admin s'il la personne n'est pas connectée
///////////////////////////////////////////////////////////////////////////////////////////////////////
if(!isset($_SESSION['isConnected'])){
  header('Location: /login.php');
}

?>
<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <?php include('/../../configuration/head_call.php'); ?>
  <body>
    <div class="container">
      <form action="admin_user_post.php" method="post" class="form-horizontal" role="form">
        <div class="text-contact form-group" id="username">
          <label class="col-sm-2 control-label" for="input_username">Nom de l'utilisateur *</label>
          <div class="col-sm-10">
            <input type="text" name="username" class="form-control" id="input_username">
          </div>
        </div>
        <div class="text-contact form-group" id="password">
          <label class="col-sm-2 control-label" for="input_name">Mot de passe *</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="input_password">
          </div>
        </div>
        <div class="text-contact form-group" id="email">
          <label class="col-sm-2 control-label" for="input_email">Email *</label>
          <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="input_email">
          </div>
        </div>
        <div class="text-contact form-group" id="adresse">
          <label class="col-sm-2 control-label" for="input_adresse">Adresse *</label>
          <div class="col-sm-10">
            <input type="text" name="adresse" class="form-control" id="input_adresse">
          </div>
        </div>
        <div class="text-contact form-group" id="type">
          <label class="col-sm-2 control-label" for="input_name">Administrateur</label>
          <div class="col-sm-1 ">
            <input type="checkbox" name="admin" class="form-control" id="input_password">
          </div>
        </div>
        <div id="submit  col-sm-10">
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
        </div>
      </form>
      <a href="admin_managment_user.php"><button class="btn btn-primary pull-left">Return</button></a>
    </div>
  </body>
</html>
