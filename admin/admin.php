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
    <main class="mdl-layout__content mdl-color--grey-100">
    
    </main>
  <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
</html>
