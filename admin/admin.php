<?php
  session_start();
  if($_SESSION['isConnected'] == false){
    header('Location: index.php');
  }
  $user = $_SESSION['username'];
 ?>
<!DOCTYPE HTML>
<html lang="en-US">
  <?php include('../configuration/head_call.php'); ?>
  <body>
    <div class="container">
      <div class="col-md-12">
        <div class="row">
          <p>Bienvenue, <?php echo $user;?></p>
        </div>
        <div class="row">
          <div class="col-md-4 ">
            <a href="user/admin_managment_user.php"><button class="btn btn-primary ">User Management</button></a>
          </div>
          <div class="submit col-md-4 ">
            <a href="compteur/admin_managment_compteur.php"><button class="btn btn-primary ">Compteur Management</button></a>
          </div>
          <div class="submit col-md-4 ">
            <a href="/deconnect.php"><button type="button" class="btn btn-primary ">Deconnexion</button></a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
