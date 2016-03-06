<?php
session_start();
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


$query=$bdd->prepare('SELECT *
FROM users WHERE username = :username');
$query->bindValue(':username',$_SESSION['user_username'], PDO::PARAM_STR);
$query->execute();
$data=$query->fetch();
?>
<html lang="en-US">
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
  <?php include('../../configuration/user_head_call.php'); ?>
  <main class="mdl-layout__content mdl-color--grey-100">
    <form action="user_edit_password_post.php" method="post" role="form">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="old_pwd">
        <input type="text" name="old_pwd" class="mdl-textfield__input">
        <label class="mdl-textfield__label" for="old_pwd">Votre ancien mot de passe</label>
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="new_pwd">
        <input type="text" name="new_pwd" class="mdl-textfield__input">
        <label class="mdl-textfield__label" for="new_pwd">Votre nouveau mot de passe</label>
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="con_new_pwd">
        <input type="text" name="con_new_pwd" class="mdl-textfield__input">
        <label class="mdl-textfield__label" for="con_new_pwd">Confirmation du nouveau mot de passe</label>
      </div>
      <br />
      <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Modifier</button>
    </form>
  </main>
  <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
</body>
</html>
