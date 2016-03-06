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
$query1=$bdd->prepare('SELECT * FROM users WHERE username = :username');
$query1->bindValue(':username',$data['id_user_assign'], PDO::PARAM_STR);
$query1->execute();
$data1=$query1->fetch();
$query2=$bdd->query('SELECT * FROM users');

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
      <form action="admin_edit_compteur_post.php" method="post" role="form">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input type="text" name="compteur_number" class="mdl-textfield__input" id="input_num" value="<?php echo $data['compteur_number']; ?>">
          <label class="mdl-textfield__label" for="input_num">Numéro du compteur</label>
        </div>
        <br />
        <select name="name" class="cs-select cs-skin-border">
          <option disabled selected><?php echo $data1['surname'] . ' ' . $data1['name']; ?></option>
          <?php while($data2 = $query2->fetch()){
            echo '<option value="' . $data2['username'] . '">' . $data2['surname'] . ' ' . $data2['name'] . '</option>';
          }
          ?>
        </select>
        <script src="/resources/js/classie.js"></script>
        <script src="/resources/js/selectFx.js"></script>
        <script>
          (function() {
            [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
              new SelectFx(el);
            } );
          })();
        </script>
        <br />
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Modifier</button>
      </form>
    </main>
    <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
  </body>
</html>
