<?php
session_start();

if(!isset($_SESSION['isConnected'])){
header('Location: /index.php');
}
///////////////////////////////////////////////////////////////////////////////////////////////////////
//Connection à la base de données
///////////////////////////////////////////////////////////////////////////////////////////////////////
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
$messageDeleted ='';
$messageEdit = '';
///////////////////////////////////////////////////////////////////////////////////////////////////////
//Création de la pagination
///////////////////////////////////////////////////////////////////////////////////////////////////////
$query=$bdd->query('SELECT count(*) as nbUsers FROM users');
$data = $query->fetch();
$nbMess = $data['nbUsers'];
$perPage = 10;
$nbPage = ceil($nbMess/$perPage);

if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPage){
  $cPage = $_GET['p'];
}
else{
  $cPage = 1;
}

$query=$bdd->query('SELECT * FROM users LIMIT '.(($cPage-1)*$perPage).','.$perPage);

?>
<html lang="en-US">
  <?php include('../../configuration/admin_head_call.php'); ?>
  <main class="mdl-layout__content mdl-color--grey-100">
    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Nom d'utilisateur</th>
          <th>Type</th>
          <th>Modifier</th>
          <th>Envoyer un email</th>
          <th>Supprimer</th>
        </tr>
      </thead>
      <tbody style="text-align:center">
        <?php
          while($data = $query->fetch())
          {
            echo "<tr>";
            echo "<td>" . $data['surname'] . "</td><td>" . $data['name'] . "</td><td>" . $data['username'] . "</td><td>" . $data['type'] . "</td>";
            echo "<td><a href=\"admin_edit_user.php?id=" . $data['id_user'] . "\"><i class=\"mdl-color-text--blue-grey-400 material-icons\">create</i></a></td>";
            echo "<td><a href=\"mailto:" . $data['email'] . "?subject=Compteur d'eau&body=Bonjour,\"><i class=\"mdl-color-text--blue-grey-400 material-icons\">email</i></a></td>";
            echo "<td><a href=\"admin_delete_user.php?id=" . $data['id_user'] . "\"><i class=\"mdl-color-text--blue-grey-400 material-icons\">delete</i></a></td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
    <a href="admin_create_user.php">
      <button id="bt-create-user" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">add</i></button>
    </a>
    <div class="mdl-tooltip" for="bt-create-user">
      Créer un utilisateur
    </div>
  </main>
  <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
</html>
