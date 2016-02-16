<?php
session_start();

if(!isset($_SESSION['isConnected'])){
header('Location: index.html');
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
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Projet | Commune</title>
    <link href="resources/css/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="resources/css/admin.css">
    <script src="http://code.jquery.com/jquery.js"></script>
      <!-- Enable media queries for old IE -->
      <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
      <![endif]-->
  </head>
  <body>
    <div class="row">
      <div class="col-md-12">
        <div class="body_container">
          <a href="admin_user.php"><button type="button" class="btn btn-primary pull-left">Create User</button></a>
          <p>
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
        </p>
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
          <a href="deconnect.php"><button type="button" class="btn btn-primary pull-right">Deconnexion</button></a>
        </div>
        </div>
      </div>
    </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
