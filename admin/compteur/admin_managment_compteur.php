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
  <?php include('../../configuration/head_call.php'); ?>
  <main class="mdl-layout__content mdl-color--grey-100">
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
          <td>Numéro du compteur</td>
          <td>Personne assignée</td>
        </thead>
        <tbody>
          <?php
          while($data = $query->fetch())
          {
            echo "<tr>";
            echo "<td>" . $data['no_compteur'] . "</td><td>" . $data['user_assign'] . "</td>";
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
