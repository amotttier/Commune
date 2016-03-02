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
  $query=$bdd->query('SELECT count(*) as nbCompteurs FROM compteurs');
  $data = $query->fetch();
  $nbMess = $data['nbCompteurs'];
  $perPage = 10;
  $nbPage = ceil($nbMess/$perPage);

  if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPage){
    $cPage = $_GET['p'];
  }
  else{
    $cPage = 1;
  }

  $query=$bdd->query('SELECT * FROM compteurs LIMIT '.(($cPage-1)*$perPage).','.$perPage);

?>

<html lang="en-US">
  <?php include('../../configuration/admin_head_call.php'); ?>
  <main class="mdl-layout__content mdl-color--grey-100">
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
          <th>Numéro du compteur</th>
          <th>Personne assignée</th>
          <th>Dernière transaction</th>
          <th>Modifier</th>
          <th>Supprimer</th>
        </thead>
        <tbody>
          <?php
          while($data = $query->fetch())
          {
            if($data['last_transaction'] == '0000-00-00')
            {
              $data['last_transaction'] = '/';
            }

            echo "<tr>";
            echo "<td>" . $data['compteur_number'] . "</td><td>" . $data['id_user_assign'] . "</td>";
            echo "<td>" . $data['last_transaction'] . "</td>";
            echo "<td><a href=\"admin_edit_compteur.php?id=" . $data['id_compteur'] . "\"><i class=\"mdl-color-text--blue-grey-400 material-icons\">create</i></a></td>";
            echo "<td><a href=\"admin_delete_compteur.php?id=" . $data['id_compteur'] . "\"><i class=\"mdl-color-text--blue-grey-400 material-icons\">delete</i></a></td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
      <a href="admin_create_compteur.php">
        <button id="bt-create-compteur" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">add</i></button>
      </a>
      <div class="mdl-tooltip" for="bt-create-compteur">
        Créer un compteur d'eau
      </div>
    </main>
      <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
</html>
