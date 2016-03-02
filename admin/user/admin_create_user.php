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
  <?php include('../../configuration/admin_head_call.php'); ?>
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
      <form action="admin_create_user_post.php" method="post" role="form">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="username">
          <input type="text" name="username" class="mdl-textfield__input" id="input_username">
          <label class="mdl-textfield__label" for="input_username">Nom du compte</label>
        </div>
        <br />
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="name">
          <input type="text" name="name" class="mdl-textfield__input" id="input_name">
          <label class="mdl-textfield__label" for="input_name">Prénom</label>
        </div>
        <br />
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="surname">
          <input type="text" name="surname" class="mdl-textfield__input" id="input_surname">
          <label class="mdl-textfield__label" for="input_surname">Nom de famille</label>
        </div>
        <br />
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="password">
          <input type="password" name="password" class="mdl-textfield__input" id="input_password">
          <label class="mdl-textfield__label" for="input_name">Mot de passe</label>
        </div>
        <br />
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="email">
          <input type="text" name="email" class="mdl-textfield__input" id="input_email">
          <label class="mdl-textfield__label" for="input_email">Email</label>
        </div>
        <br />
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="adresse">
          <input type="text" name="adresse" class="mdl-textfield__input" id="input_adresse">
          <label class="mdl-textfield__label" for="input_adresse">Adresse</label>
        </div>
        <br />
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="phone">
          <input type="text" name="phone" class="mdl-textfield__input" id="input_phone">
          <label class="mdl-textfield__label" for="input_phone">Téléphone</label>
        </div>
        <br />
        <ul class="demo-list-control mdl-list">
          <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
              Administrateur
            </span>
            <span class="mdl-list__item-secondary-action">
              <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="admin">
                <input type="checkbox" name="admin" id="admin" class="mdl-checkbox__input"  />
              </label>
            </span>
          </li>
        </ul>
        <br />
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Envoyer</button>
      </form>
    </main>
    <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
  </body>
</html>
