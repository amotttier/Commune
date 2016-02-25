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
  <?php include('../../configuration/head_call.php'); ?>
  <style>
    .demo-list-control {
      width: 300px;
      margin: auto;
    }

    .demo-list-radio {
      display: inline;
    }
    .mdl-list__item .mdl-list__item-primary-content {
      color: rgba(0, 0, 0, 0.26);
    }
  </style>
    <main class="mdl-layout__content mdl-color--grey-100">
      <form action="admin_create_compteur_post.php" method="post" role="form">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input type="text" name="num_compteur" class="mdl-textfield__input" id="input_num">
          <label class="mdl-textfield__label" for="input_num">Numéro du compteur</label>
        </div>
        <br />
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="name">
          <input type="text" name="name" class="mdl-textfield__input" id="input_name">
          <label class="mdl-textfield__label" for="input_name">Nom du compte du propriétaire</label>
        </div>
        <br />
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Envoyer</button>
      </form>
    </main>
    <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
  </body>
</html>
