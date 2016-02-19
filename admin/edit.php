<?php
session_start();
///////////////////////////////////////////////////////////////////////////////////////////////////////
//Retour à la page admin s'il la personne n'est pas connectée
///////////////////////////////////////////////////////////////////////////////////////////////////////
if(!isset($_SESSION['isConnected'])){
  header('Location: login.html');
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
<?php include('../configuration/head_call.php'); ?>
  <body>
    <div class="container">
      <form action="edit_post.php" method="post" class="form-horizontal" role="form">
        <div class="text-contact form-group" id="username">
          <label class="col-sm-2 control-label" for="input_username">Username *</label>
          <div class="col-sm-10">
            <input type="text" name="username" class="form-control" id="input_username" value="<?php echo $data['username']; ?>">
          </div>
        </div>
        <div class="text-contact form-group" id="name">
          <label class="col-sm-2 control-label" for="input_username">Name *</label>
          <div class="col-sm-10">
            <input type="text" name="username" class="form-control" id="input_username" value="<?php echo $data['name']; ?>">
          </div>
        </div>
        <div class="text-contact form-group" id="surname">
          <label class="col-sm-2 control-label" for="input_username">Surname *</label>
          <div class="col-sm-10">
            <input type="text" name="username" class="form-control" id="input_username" value="<?php echo $data['surname']; ?>">
          </div>
        </div>
        <div class="text-contact form-group" id="email">
          <label class="col-sm-2 control-label" for="input_email">Email *</label>
          <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="input_email" value="<?php echo $data['email']; ?>">
          </div>
        </div>
        <div class="text-contact form-group" id="phone">
          <label class="col-sm-2 control-label" for="input_email">Phone Number *</label>
          <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="input_email" value="<?php echo $data['phone']; ?>">
          </div>
        </div>
        <div class="text-contact form-group" id="adress">
          <label class="col-sm-2 control-label" for="input_adress">Adress *</label>
          <div class="col-sm-10">
            <input type="text" name="adress" class="form-control" id="input_adress" value="<?php echo $data['adress']; ?>">
          </div>
        </div>
        <div class="text-contact form-group" id="admin">
          <label class="col-sm-2 control-label" for="input_admin">Adminstrator</label>
          <div class="col-sm-10">
            <input id="input_admin" type="checkbox" class="form-control" name="admin" <?php if($data['type'] == 'admin') {echo 'checked';}  ?>>
          </div>
        </div>
        <div class="clear"></div>
        <div class="col-sm-2"></div>
        <div class="text-contact form-group col-sm-10">
          <span class="help-block">* are mendatory fields</span>
        </div>
        <div class="col-sm-2"></div>
        <div id="submit  col-sm-10">
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
        </div>
      </form>
      <a href="admin_managment_user.php"><button class="btn btn-primary pull-left">Return</button></a>
    </div>
  </body>
</html>
