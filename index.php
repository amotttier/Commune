<?php
  session_start();
  $_SESSION['isConnected'] = false;
?>
<!DOCTYPE HTML>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Compteur d'eau pour communes">
    <title>Projet | Commune</title>

    <!-- Enable media queries for old IE -->
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="resources/css/main.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
  </head>
  <body>
    <form action="login_post.php" role="form" method="post">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="username">
        <input class="mdl-textfield__input" type="text" name="username" id="input_username">
        <label class="mdl-textfield__label" for="input_username">Nom d'utilisateur</label>
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="password">
        <input class="mdl-textfield__input" type="password" name="password" id="input_password">
        <label class="mdl-textfield__label" for="input_password">Mot de passe</label>
      </div>
      <br />
      <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Se connecter</button>
    </form>
    <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
  </body>
</html>
