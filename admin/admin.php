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
$query=$bdd->query('SELECT * FROM transactions ORDER BY date_transaction DESC LIMIT 10');
?>
<!DOCTYPE HTML>
<html lang="en-US">
  <?php include('../configuration/admin_head_call.php'); ?>
    <main class="mdl-layout__content mdl-color--grey-100">
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
          <tr>
            <th>Numéro du compteur</th>
            <th>Personne assigné au compteur</th>
            <th>Dernière transaction</th>
            <th>Montant</th>
          </tr>
        </thead>
        <tbody style="text-align:center">
          <?php
            while($data = $query->fetch())
            {
              echo "<tr>";
              echo "<td>" . $data['id_compteur'] . "</td><td>" . $data['id_user'] . "</td><td>" . $data['date_transaction'] . "</td><td>" . $data['montant'] . "</td>";
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
    </main>
  <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
</html>
