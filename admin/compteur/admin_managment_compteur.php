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
  <?php include('../configuration/head_call.php'); ?>
  <body class="">
    <div class="container">
      <a href="admin__create_compteur.php"><button type="button" class="btn btn-primary pull-left">Créer un compteur d'eau</button></a>
      <table class="table table-hover">
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
      <ul class="pagination">
        <?php
           for ($i=1;$i<=$nbPage;$i++){
             if($i==$cPage){
               echo '<li><a href="admin.php?p='.$i.'"> '.$i.'</a></li>';
             }
             else{
                echo '<li><a href="admin.php?p='.$i.'"> '.$i.'</a></li>';
             }
           }
        ?>
      </ul>
      <a href="admin.php"><button class="btn btn-primary pull-left">Return</button></a>
      <a href="deconnect.php"><button type="button" class="btn btn-primary pull-right">Deconnexion</button></a>
    </div>
  </body>
</html>
