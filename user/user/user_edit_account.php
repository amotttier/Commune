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
    <form action="user_edit_account_post.php" method="post" role="form">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="username">
        <input type="text" name="username" class="mdl-textfield__input" value="<?php echo $data['username']; ?>" disabled>
        <label class="mdl-textfield__label" for="input_username">Nom du compte</label>
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="name">
        <label class="mdl-textfield__label" for="input_username">Prénom</label>
        <input type="text" name="name" class="mdl-textfield__input" value="<?php echo $data['name']; ?>">
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="surname">
        <label class="mdl-textfield__label" for="input_username">Nom de famille</label>
        <input type="text" name="surname" class="mdl-textfield__input"value="<?php echo $data['surname']; ?>">
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="email">
        <label class="mdl-textfield__label" for="input_email">Email</label>
        <input type="text" name="email" class="mdl-textfield__input" value="<?php echo $data['email']; ?>">
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="adresse">
        <label class="mdl-textfield__label" for="input_adresse">Adresse</label>
        <input type="text" name="adresse" class="mdl-textfield__input" value="<?php echo $data['adresse']; ?>">
      </div>
      <br />
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="phone">
        <label class="mdl-textfield__label" for="input_email">Numéro de téléphone</label>
        <input type="text" name="phone" class="mdl-textfield__input" value="<?php echo $data['phone']; ?>">
      </div>
      <br />
      <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Modifier</button>
    </form>
  </main>
  <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
  </body>
  </html>
