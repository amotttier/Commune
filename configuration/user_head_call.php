<?php
  $name = $_SESSION['user_name'];
  $surname = $_SESSION['user_surname'];
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Compteur d'eau pour communes">
  <title>Utilisateur | Commune</title>

  <!-- Enable media queries for old IE -->
  <!--[if lt IE 9]>
  <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
  <![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="/resources/css/styles.css">
    <link rel="stylesheet" href="/resources/css/main.css">
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
</head>
<body>
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
  <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
    <div class="mdl-layout__header-row">
    </div>
  </header>
  <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
    <header class="demo-drawer-header">
      <div class="demo-avatar-dropdown">
        <?php
          echo "<div>" . $surname . "</div>";
          echo "<div>&nbsp;" . $name . "</div>";
        ?>
        <div class="mdl-layout-spacer"></div>
      </div>
    </header>
    <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
      <a class="mdl-navigation__link" href="/user/user.php"><i class="mdl-color-text--blue-grey-400 material-icons">home</i>Accueil</a>
      <a class="mdl-navigation__link" href="/user/user/user_managment_account.php"><i class="mdl-color-text--blue-grey-400 material-icons">person</i>Gestion du compte</a>
      <a class="mdl-navigation__link" href="/user/compteur/user_managment_compteur.php"><i class="mdl-color-text--blue-grey-400 material-icons">memory</i>Gestion du/des compteur(s)</a>
      <a class="mdl-navigation__link" href="../../deconnect.php"><i class="mdl-color-text--blue-grey-400 material-icons">cancel</i>Deconnexion</a>
      <div class="mdl-layout-spacer"></div>
      <a class="mdl-navigation__link" href="" target="_blank"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
    </nav>
  </div>
