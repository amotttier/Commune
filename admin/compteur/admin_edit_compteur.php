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
$_SESSION['edit_id_compteur'] = $id;
}
else{
  header('location: admin_managment_compteur.php');
}
$query=$bdd->query('SELECT * FROM compteurs WHERE id_compteur ='.$id);
$data=$query->fetch();
?>
<html lang="en-US">
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
      <form action="admin_edit_compteur_post.php" method="post" role="form">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input type="text" name="compteur_number" class="mdl-textfield__input" id="input_num" value="<?php echo $data['compteur_number']; ?>">
          <label class="mdl-textfield__label" for="input_num">Numéro du compteur</label>
        </div>
        <br />
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input type="text" name="id_user_assign" class="mdl-textfield__input" id="input_name" value="<?php echo $data['id_user_assign']; ?>">
          <label class="mdl-textfield__label" for="input_name">Nom du compte du propriétaire</label>
        </div>
        <br />
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Modifier</button>
      </form>
    </main>
    <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
  </body>
</html>
