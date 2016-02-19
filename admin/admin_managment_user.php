<?php
session_start();

if(!isset($_SESSION['isConnected'])){
header('Location: ../index.php');
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
  <?php include('../configuration/head_call.php'); ?>
  <body>
    <div class="container">
      <a href="admin_user.php"><button type="button" class="btn btn-primary pull-left">Create User</button></a>
      <table class="table table-hover">
        <thead>
          <td>Username</td>
          <td>Type</td>
          <td>Edit</td>
          <td>Envoyé un email</td>
          <td>Delete</td>
        </thead>
        <tbody>
          <?php
            while($data = $query->fetch())
            {
              echo "<tr>";
              echo "<td>" . $data['username'] . "</td><td>" . $data['type'] . "</td>";
              echo "<td><a href=\"edit.php?id=" . $data['id_user'] . "\">Edit</a></td>";
              echo "<td><a href=\"mailto:" . $data['email'] . "?subject=Compteur d'eau&body=Bonjour,\">" . $data['email'] . "</a></td>";
              echo "<td><a href=\"delete.php?id=" . $data['id_user'] . "\">Delete</a></td>";
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
      <ul class="pagination">
        <?php
           for ($i=1;$i<=$nbPage;$i++){
             if($i==$cPage){
               echo '<li><a href="admin_managment_user.php?p='.$i.'"> '.$i.'</a></li>';
             }
             else{
                echo '<li><a href="admin_managment_user.php?p='.$i.'"> '.$i.'</a></li>';
             }
           }
        ?>
      </ul>
      <a href="admin.php"><button class="btn btn-primary pull-left">Return</button></a>
      <a href="../deconnect.php"><button type="button" class="btn btn-primary pull-right">Deconnexion</button></a>
    </div>
  </body>
</html>
