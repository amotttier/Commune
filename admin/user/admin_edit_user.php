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
if(is_numeric($id = $_GET['id'])){
$id = $_GET['id'];
$_SESSION['edit_id'] = $id;
}
else{
  header('location: admin_managment_user.php');
}
$query=$bdd->query('SELECT * FROM users WHERE id_user ='.$id);
$data=$query->fetch();
?>
<html lang="en-US">
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
      <form action="admin_edit_user_post.php" method="post" role="form">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="username">
          <input type="text" name="username" class="mdl-textfield__input" value="<?php echo $data['username']; ?>">
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
        <ul class="demo-list-control mdl-list">
          <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
              Administrateur
            </span>
            <span class="mdl-list__item-secondary-action">
              <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="admin">
                <input type="checkbox" name="admin" id="admin" class="mdl-checkbox__input" <?php if($data['type'] == 'admin') {echo 'checked';}  ?> />
              </label>
            </span>
          </li>
        </ul>
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Modifier</button>
      </form>
    </main>
    <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
  </body>
</html>
